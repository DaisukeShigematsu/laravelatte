<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUserController extends Controller
{
    public function index()
    {
    $items = DB::table('users')->get();
        return view('index', ['items' => $items]);
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $param = [
            'name'       => $request->name,
            'id'         => $request->id,
            'password'   => $request->password,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('users')->insert($param);
        return redirect('/data');
    }

    public function relate(Request $request) 
    {
        $items = data::all();
        return view('data', ['items' => $items]);
    }







}