<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Advertisement;
use App\Position;
use App\Sale;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JournalsController extends Controller
{

    public function index()
    {
        $journals = Journal::where('status', '=', "PUBLISHED")->paginate(9);

        return view('welcome', compact('journals'));
    }

    public function show(Journal $journal)
    {
        return view('journal', compact('journal'));
    }

    public function magazines()
    {
        $journals = Journal::where('status', '=', "PUBLISHED")->paginate(9);

        return view('magazines', compact('journals'));
    }

    public function advertisement(Request $request, $id)
    {
        $advertisement = Advertisement::where('journal_id', $id)->with(['positions' => function ($query) {
            $query->where('status', '=', 'INSTOCK');}, 'journal'])->first();

//        $sum = $advertisement->positions->sum('price');

        if (!$advertisement) {
            $journal = Journal::where('id', $id)->where('status', '=', "PUBLISHED")->first();
        }

        return view('advertisement', compact('advertisement', 'journal'));
    }

    public function coupon(Request $request)
    {

        $advertisement = Advertisement::where([
                ["id", "=", $request->id],
                ["coupon", "=", $request->coupon]
            ]
        )->with('positions', 'journal')->first();

        if ($advertisement) {
            foreach ($advertisement->positions as $key => $position) {
                $position->price = $position->price - $position->price * $advertisement->percent * 0.01;
            }

            $sum = $advertisement->positions->sum('price');

        } else {
            return response()->json('Advertisement don\'t have a coupon');
        }

        return response()->json([$advertisement, $sum]);

    }

    public function positionCheck(Request $request)
    {

        $positionIds = array_filter( $request->positions );

        if( count($positionIds) === 0 ){
            return response()->json( 'No positions selected' );

        }
        $prices = [];

        $validator = Validator::make($request->customer, 
            [ 
                "name" => "required", 
                "phone" => "required|min:11|numeric",
                "email" => "required|email",
            ]
        );

        if ($validator->fails()) {
            return response()->json( 'No Shipping Data Provided' );
            //return back()->with('error', 'No Shipping Data Provided');
        }

        if( $request->couponStatus === 'true' ){
            $percent = Advertisement::find( $request->advertisement )->pluck( 'percent' )->first();
        }

        $i = 0;

        foreach ($positionIds as $posId) {

            $prices[$i] = Position::where([['id', '=', $posId], ['status', '=', 'INSTOCK']])->pluck('price')->first();
            
            if (isset($percent)) {
                $prices[$i] = $prices[$i] - $prices[$i] * $percent * 0.01;
            }

            $toPay = array_sum($prices);

            $i++;
        }

        return response()->json( ['toPay' => $toPay] );//, 'ids' => $ids
        // return view('paypal', compact('toPay', 'redirectTo'));
    }

    public function paymentCompleted( Request $request )
    {

        $positionIds = array_filter( $request->positions );

        foreach ($positionIds as $posId) {
            $soldPosition = Position::where([['id', '=', $posId], ['status', '=', 'INSTOCK']])->first();
            $soldPosition->status = 'SOLD';
            $soldPosition->save();
        }

        $sale = new Sale();
        $sale->journal_id = $request->journal_id;
        $sale->name = $request->customer['name'];
        $sale->email = $request->customer['email'];
        $sale->phone = $request->customer['phone'];
        $sale->total_price = $request->toPay;
        $sale->purchase_time = date('m/d/Y h:i:s a');
        $sale->save();

        return response()->json( $positionIds );
    }

}
