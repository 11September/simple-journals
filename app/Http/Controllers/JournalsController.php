<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Advertisement;
use Illuminate\Http\Request;

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
        $advertisement = Advertisement::where('journal_id', $id)->with('positions', 'journal')->first();
        $sum = $advertisement->positions->sum('price');

        if (!$advertisement){
            $journal = Journal::where('id', $id)->where('status', '=', "PUBLISHED")->first();
        }



        return view('advertisement', compact('advertisement', 'journal', 'sum'));
    }
    
    public function coupon(Request $request)
    {   

        $advertisement = Advertisement::where( [ 
                                                 ["id", "=", $request->id], 
                                                 ["coupon", "=", $request->coupon] 
                                               ]
                                                    )->with('positions', 'journal')->first();

        if( $advertisement ){
            foreach ($advertisement->positions as $key => $position) {
                $position->price = $position->price - $position->price * $advertisement->percent * 0.01;
            }

            $sum = $advertisement->positions->sum('price');

        }else{
            return response()->json('Advertisement don\'t have a coupon');
        }

        return response()->json( [ $advertisement, $sum] );
        
    }
}
