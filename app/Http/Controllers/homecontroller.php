<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Userregister;

class ApiController extends Controller
{
    function home()
    {
        return view('home');
    }
}