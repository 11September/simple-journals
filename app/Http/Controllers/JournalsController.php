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

//        dd($advertisement);

        if (!$advertisement){
            $journal = Journal::where('id', $id)->where('status', '=', "PUBLISHED")->first();
        }

        return view('advertisement', compact('advertisement', 'journal'));
    }
}
