<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StampController extends Controller
{

    public function index()
    {
        $user = Auth::user()->name;
        return view('stamp', ['user' => $user]);
    }

}
