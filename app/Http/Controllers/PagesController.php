<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class PagesController extends Controller
{
    public function page($page)
    {
        $page = Page::where('slug', $page)->first();

        return view('page', compact('page'));
    }
}
