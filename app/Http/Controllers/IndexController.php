<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    public function showIndex()
    {
        return view('auth.index');
    }
}
