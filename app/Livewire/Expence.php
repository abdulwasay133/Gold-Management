<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Payment;

class Expence extends Component
{
    public $description,$amount,$date,$flag,$start,$end,$payment;

    public function findrecord(){
        $validated = $this->validate([
            'start'=>'required',
            'end'=>'required'
        ]);
        $data = Payment::whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)->get();
        $this->payment = $data->where('flag',3);
        
    }
    public function delete($id){
        $payment = Payment::find($id);
        $payment->delete();
    }
    public function edit($id){
        $expense = Payment::find($id);
       
        $this->amount = $expense->amount;
        $this->date = $expense->created_at;
        $this->description = $expense->discription;
        $this->flag = $expense->id;
        $this->dispatch('openmodal');

    }
    public function addexpense(){
        $validated = $this->validate([
            'description'=>'required',
            'amount'=>'required|numeric',
        ]);
        if($this->date){
            $date = $this->date;
        }else{
            $date = now();
        }
        if($this->flag){
            $expense = Payment::find($this->flag);
            $expense->update([
                'discription'=>$this->description,
                'flag'=>3,
                'amount'=>$this->amount,
                'created_at'=>$date,
            ]);
        }else{
        $payment = Payment::create([
            'discription'=>$this->description,
            'flag'=>3,
            'amount'=>$this->amount,
            'created_at'=>$date,
        ]);
    }
        $this->dispatch('closemodal');
    }
    public function render()
    {
        if($this->start){
            $payment = $this->payment;
        }elseif($this->end){
            $payment = $this->payment;
        }else{
            
            $payment = Payment::where('flag',3)->take(10)->get();
        }
        $expenses = $payment;
       
        return view('livewire.expence',compact('expenses'))->extends('layouts.app');
    }
}
