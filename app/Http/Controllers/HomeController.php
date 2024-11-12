<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Client;
use App\Models\Payment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $sales = Sale::whereDay('created_at',now()->day)->get();
        $totalsale = $sales->sum('amount');

        $purchase = Stock::whereDay('created_at',now()->day)->get();
        $totalpurchase = $purchase->sum('amount');

        $vendors = Client::where('amount','<','0')->get();
        $totalpayable = $vendors->sum('amount');

        $vendors = Client::where('amount','>','0')->get();
        $totalreceive = $vendors->sum('amount');

        $labels = '[';
        $paymentamount = "[";
        $date = Carbon::now()->subDays(30);
        $payments = Payment::where('created_at','>=', $date)->get();
        $data = $payments->groupBy('flag');

        // dd($data);
        // foreach($data as $lab){
        //     $labels.=$lab->flag.',';
        //     foreach($lab as $amount){
        //         $paymentamount.=$payment->amount.',';
        //     }
        // }
        // $paiamount=rtrim($paymentamount,',').']';
        // $pailabel=rtrim($labels,',').']';
        // dd($paiamount);





        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
    
        $payments = Payment::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
    
        $debits = $payments->where('flag', 0)->count();
        $credits = $payments->where('flag', 1)->count();
        $expenses = $payments->where('flag', 3)->count();
    
        $chartData = [
            'debits' => $debits,
            'credits' => $credits,
            'expenses' => $expenses,
        ];





        $sales = Sale::where('created_at','>=',$date)->get();
        $slabel='[';
        $svalue='[';
        foreach($sales as $sale){
            $slabel.=$sale->created_at->format('d') .',';
            $svalue.=$sale->amount.',';
        }
        $salelabel =rtrim($slabel,',').']';
        $salevalue =rtrim($svalue,',').']';
        
        // dd($salevalue);


        $pay = Client::where('amount','<','0')->get();
        $recive = Client::where('amount','>','0')->get();

        // dd($recive);
   

        return view('home',compact('totalsale','totalpurchase','totalpayable','totalreceive','salelabel','salevalue','chartData'));
    }
}
