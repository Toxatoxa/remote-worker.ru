<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.home');
    }

    public function advertise()
    {
        return view('page.advertise');
    }

    public function terms()
    {
        return view('page.terms');
    }

    public function contact()
    {
        return view('page.contact');
    }


}
