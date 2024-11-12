<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Client;

class Vendor extends Component
{
    public $name,$mobile,$address,$flag;
    

    public function edit($id){
        $vendor = Client::find($id);
        $this->name=$vendor->name;
        $this->mobile=$vendor->mobile;
        $this->address=$vendor->address;
        $this->flag=$vendor->id;
        $this->dispatch('openmodal');
    }
    public function addvendor(){
        $validated = $this->validate([
            'name'=>'required|min:3',
            'mobile'=>'required|min:11',
            'address'=>'required|min:10',
        ]);
        if($this->flag){
            $vendor =Client::find($this->flag);
            $vendor->update($validated);
        }else{
        Client::create($validated);
    }
        $this->dispatch('closemodal');  
        $this->reset();
    }
    public function delete($id){
        $vendor=Client::find($id);
        $vendor->delete();
    }
    public function render()
    {
        $vendors = Client::OrderBy('id','desc')->get();
        return view('livewire.vendor',compact('vendors'))->extends('layouts.app');
    }
}
