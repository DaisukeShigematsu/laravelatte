<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function create(Request $request)
    {
        $param = [
            'name'       => $request->name,
            'id'         => $request->id,
            'password'   => $request->password,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];

    }


}