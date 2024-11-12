<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('client');
    }
    
    public function insertclient(Request $request){
        $validated = validate([
            'name'=>'required|min:3',
            'address'=>'required',
            'mobile'=>'required',
        ]);
    }
}
