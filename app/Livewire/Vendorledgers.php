<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Clientpayments;

class Vendorledgers extends Component
{
    public $mode,$client,$amount,$gold,$flag ;



    
    public function addpayment(){
        $validated = $this->validate([
            'client'=>'required',
            'mode'=>'required',
        ]);
        $vendor = Client::find($this->client);
        
        if($this->flag){
            $amount=$this->amount;
            $gold=$this->gold;
            $payment = Clientpayments::find($this->flag);
            $payment->update([
                'client_id'=>$this->client,
                'flag'=>$this->mode,
                'amount'=>$this->amount,
                'gold'=>$this->gold,
            ]);
        }else{

            if($this->mode=="1"){
                $amount=$vendor->amount - $this->amount;
                $gold=$vendor->gold - $this->gold;
                
            }elseif($this->mode=="2"){
                $amount=$vendor->amount + $this->amount;
                $gold=$vendor->gold + $this->gold;
            }

        $payment = Clientpayments::create([
            'client_id'=>$this->client,
            'flag'=>$this->mode,
            'amount'=>$this->amount,
            'gold'=>$this->gold,
        ]);
    }
    $vendor->update(['amount'=>$amount,'gold'=>$gold]);

        $this->dispatch('closemodal');
        $this->reset();
    }

    public function render()
    {
        
        
        $vendors = Client::all();

        $clients = Client::orderBy('id','desc')->get();

        $amountrec = $clients->where('amount','>',0)->sum('amount');
        $amountpay = $clients->where('amount','<',0)->sum('amount');
        // dd($amountpay);
        $goldrec = $clients->where('gold','>',0)->sum('gold');
        $goldpay = $clients->where('gold','<',0)->sum('gold');
        // dd($amountpay);
    
    
        return view('livewire.vendorledgers',compact('vendors','clients','amountrec','amountpay','goldrec','goldpay'))->extends('layouts.app');

    }
}
