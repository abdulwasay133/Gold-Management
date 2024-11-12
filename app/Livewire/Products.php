<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Asset;

class Products extends Component
{
    public $product,$quantity,$flag;

    public function delete($id){
        $product = Asset::find($id);
        $product->delete();
    }
    public function edit($id){
        $product = Asset::find($id);
        $this->product = $product->product;
        $this->quantity = $product->quantity;
        $this->flag = $product->id;
        $this->dispatch('openmodal');
    }
    public function addproduct(){
        $validated = $this->validate([
            'product'=>'required|min:3',
            'quantity'=>'required',
        ]);
        if($this->flag){
            $product = Asset::find($this->flag);
            $product->update($validated);
        }else{
        Asset::create($validated);
    }
        $this->dispatch('closemodal');
        $this->reset();
    }
    public function render()
    {
        $products = Asset::orderBy('id','desc')->get();
        return view('livewire.products',compact('products'))->extends('layouts.app');
    }
}
