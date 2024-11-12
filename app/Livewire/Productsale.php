<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Asset;
use App\Models\Sale;
use App\Models\Payment;

class Productsale extends Component
{
    public $amount,$quantity,$product,$start,$end,$payment;
    
    public function findrecord(){
        $validated = $this->validate([
            'start'=>'required',
            'end'=>'required'
        ]);
        $data = Sale::whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)->get();
        $this->payment = $data->all();
        
    }
    public function delete($id){
        $sale = Sale::find($id);
        $sale->asset()->detach();
        $sale->delete();
    }
    public function addsale(){

        $this->validate([
            'amount'=>'required|numeric',
            'quantity'=>'required|numeric',
            'product'=>'required',
        ]);
        $product = Asset::find($this->product);
        $quantity = $product->quantity - $this->quantity;
        $product->update(['quantity'=>$quantity]);
        
        $sale = Sale::create([
            'amount'=>$this->amount,
            'quantity'=>$this->quantity,
        ]);
        $sale->asset()->attach($product->id);
        $payment = Payment::create([
            'amount'=>$this->amount,
            'flag'=>0,
            'discription'=>'Sale '.$product->product,
        ]);
        $this->dispatch('closemodal');
        $this->reset();

    }
    public function render()
    {
        if($this->start){
            $payment = $this->payment;
        }elseif($this->end){
            $payment = $this->payment;
        }else{
            
            $payment = Sale::orderBy('id','desc')->take(10)->get();
        }
        $sales = $payment;
       
        $products = Asset::all();
        return view('livewire.productsale',compact('products','sales'))->extends('layouts.app');
    }
}
