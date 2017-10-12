<?php

namespace App\Http\Controllers;

use App\Journal;
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

        return view('welcome', compact('journals'));
    }
}
