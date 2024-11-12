<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Asset;
use App\Models\Stock;
use App\Models\Payment;

class Purchase extends Component
{
    public $amount,$quantity,$product,$name="null",$start,$end,$payment;

    public function findrecord(){
        $validated = $this->validate([
            'start'=>'required',
            'end'=>'required'
        ]);
        $data = Stock::whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)->get();
        $this->payment = $data->all();
        
    }
    public function addpurchase(){
        
        $this->validate([
            'amount'=>'required|numeric',
            'quantity'=>'required|numeric',
            'product'=>'required',
        ]);
        // dd('ok');
        $product = Asset::find($this->product);
        $quantity = $product->quantity + $this->quantity;
        $product->update(['quantity'=>$quantity]);
        
        $stock = Stock::create([
            'amount'=>$this->amount,
            'quantity'=>$this->quantity,
            'name'=>$this->name,
        ]);
        $stock->asset()->attach($product->id);
         Payment::create([
            'amount'=>$this->amount,
            'flag'=>1,
            'discription'=>'Purchase '.$product->product,
        ]);
        $this->dispatch('closemodal');

    }
    public function render()
    {
        if($this->start){
            $payment = $this->payment;
        }elseif($this->end){
            $payment = $this->payment;
        }else{
            
            $payment = Stock::orderBy('id','desc')->take(10)->get();
        }
        $purchases = $payment;
        
        $products = Asset::all();
        return view('livewire.purchase',compact('products','purchases'))->extends('layouts.app');
    }
}
