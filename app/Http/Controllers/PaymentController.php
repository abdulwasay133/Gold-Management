<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Client;

class PaymentController extends Controller
{
    public function findrecord(Request $request){
        dd('ok');
    }
    public function vendor($id){
        
        $vendors = Payment::where('client_id',$id)->get();
        return view('vendordetail',compact('vendors'));
    }
    public function index(){
        return view('payment');
    }
}
