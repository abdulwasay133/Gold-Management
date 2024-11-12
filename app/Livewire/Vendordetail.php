<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Clientpayments;
use Carbon\Carbon;

class Vendordetail extends Component
{
    public $id,$start,$end,$payment;
    public $mode,$client,$amount,$gold,$flag ;




    
    public function delete($id){
        $payment = Clientpayments::find($id);
        $client = Client::find($this->id);
        if($payment->flag == 1){
            $newgold = $client->gold - $payment->gold;
            $newcash = $client->amount - $payment->amount;
       }else{
            $newgold = $client->gold + $payment->gold;
            $newcash = $client->amount + $payment->amount;
       }
       $client->update(['amount'=>$newcash,'gold'=>$newgold]);
       $payment->delete();
    }






    
    public function addpayment(){
        $validated = $this->validate([
            
            'mode'=>'required',
        ]);
        $vendor = Client::find($this->id);
        
        if($this->flag){

            if($this->mode=="1"){
                $amount=$vendor->amount + $this->amount;
                $gold=$vendor->gold + $this->gold;
                
            }elseif($this->mode=="2"){
                $amount=$vendor->amount - $this->amount;
                $gold=$vendor->gold - $this->gold;
            }

            $payment = Clientpayments::find($this->flag);
            $payment->update([
                'client_id'=>$this->id,
                'flag'=>$this->mode,
                'amount'=>$this->amount,
                'gold'=>$this->gold,
            ]);
        }else{

            if($this->mode=="1"){
                $amount=$vendor->amount + $this->amount;
                $gold=$vendor->gold + $this->gold;
                
            }elseif($this->mode=="2"){
                $amount=$vendor->amount - $this->amount;
                $gold=$vendor->gold - $this->gold;
            }

        $payment = Clientpayments::create([
            'client_id'=>$this->id,
            'flag'=>$this->mode,
            'amount'=>$this->amount,
            'gold'=>$this->gold,
        ]);
    }
    $vendor->update(['amount'=>$amount,'gold'=>$gold]);

        // $this->dispatch('closemodal');
        // $this->reset();
        $this->redirect('/vendordetail'.'/'.$this->id);
    }


    public function findrecord(){
        $data = Clientpayments::whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)->get();
        $this->payment = $data->where('client_id',$this->id);
        
    }

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        if($this->start){
            $payment = $this->payment;
        }elseif($this->end){
            $payment = $this->payment;
        }else{
            
            $payment = Clientpayments::orderBy('id','desc')->where('client_id',$this->id)->take(10)->get();
        }
        $vendors = $payment;

        return view('livewire.vendordetail',compact('vendors'))->extends('layouts.app');
    }
}
