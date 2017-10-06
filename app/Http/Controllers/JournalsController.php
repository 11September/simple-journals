<?php

namespace App\Http\Controllers;

use App\Journal;
use Illuminate\Http\Request;

class JournalsController extends Controller
{
    public function index()
    {
        $journals = Journal::where('status', '=', "PUBLISHED")->paginate(1);

//        dd($journals);

        return view('welcome', compact('journals'));
    }
}
