<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Asset;
use Livewire\WithPagination;

class Pymentledgers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $flag,$start,$end;

    // *** Gold Exchange ***
    public $excgold;
    // *** Gold sell ***
    public $mode,$amount,$sellgold,$onetola,$extra,$cashedit,$goldedit;
   
    // *** Silver sell ***
    public $silvermode,$silveramount,$sellsilver;
    

        
    public function edit($id){
        $payment = Payment::find($id);
        $this->flag = $payment->id;

        $this->excgold = $payment->refinegold;

        $this->amount = $payment->amount;
        $this->cashedit = $payment->amount;
        $this->mode = $payment->flag;
        $this->sellgold = $payment->puregold;
        $this->goldedit = $payment->puregold;

        
        $this->dispatch('openmodal');

    }
    
        public function addgoldexchange(){
            $this->validate([
                'excgold'=>'required|numeric'
            ]);
            $refinegold = Asset::find(2);
            $puregold = Asset::find(1);

            if($puregold->quantity > $this->excgold){
            $pgold = $puregold->quantity - $this->excgold;
            $rgold = $refinegold->quantity + $this->excgold;
            $refinegold->update(['quantity'=>$rgold]);
            $puregold->update(['quantity'=>$pgold]);
            $payment=Payment::create([
                'created_at'=>now(),
                'refinegold'=>$this->excgold,
                'puregold'=>$this->excgold,
                'discription'=>"Gold Exchange",
            ]);
        }else{
            $this->dispatch('alert');
        }
            $this->dispatch('closemodal');
            $this->reset();   
        }
    
        public function addgoldsell(){

            $this->validate([
                'mode'=>'required',
                'sellgold'=>'required|numeric',
                'amount'=>'required|numeric',
            ]);

            $cash = Asset::find(3);
            $gold = Asset::find(1);

            if($this->flag){
                if($this->mode==1){
                    $editedcash = $cash->quantity - $this->cashedit;
                    $editedgold = $gold->quantity + $this->goldedit;
                    $cash->update(['quantity'=>$editedcash]);
                    $gold->update(['quantity'=>$editedgold]);
                    $newgold = $gold->quantity - $this->sellgold;
                    $newcash = $cash->quantity + $this->amount;
                    $dis = "Gold Sell";
                }elseif($this->mode==2){
                    $editedcash = $cash->quantity + $this->cashedit;
                    $editedgold = $gold->quantity - $this->goldedit;
                    $cash->update(['quantity'=>$editedcash]);
                    $gold->update(['quantity'=>$editedgold]);
                    $newgold = $gold->quantity + $this->sellgold;
                    $newcash = $cash->quantity - $this->amount;
                    $dis = "Gold Purchase";
                }
                $cash->update(['quantity'=>$newcash]);
                $gold->update(['quantity'=>$newgold]);

                $payment = Payment::find($this->flag);
                $payment->update([
                    'amount'=>$this->amount,
                    'puregold'=>$this->sellgold,
                    'flag'=>$this->mode,
                    'discription'=>$dis,
                ]);
                
            }else{
                
            if($this->mode==1){
                if($gold->quantity > $this->sellgold){
                    $newgold = $gold->quantity - $this->sellgold;
                    $newcash = $cash->quantity + $this->amount;
                    $dis = "Gold Sell";
                }else{
                    $this->dispatch('alert');
                }
            }elseif($this->mode==2){
                if($cash->quantity > $this->amount){
                    $newgold = $gold->quantity + $this->sellgold;
                    $newcash = $cash->quantity - $this->amount;
                    $dis = "Gold Purchase";
                }else{
                    $this->dispatch('alert');
                }
            }
            
            $cash->update(['quantity'=>$newcash]);
            $gold->update(['quantity'=>$newgold]);

            Payment::create([
                'amount'=>$this->amount,
                'puregold'=>$this->sellgold,
                'flag'=>$this->mode,
                'discription'=>$dis,
            ]);
        }
            $this->dispatch('closemodal');
            $this->reset();
            
        }

    
        public function addsilversell(){
            // dd('this is silver sell');
            // dd($this->silvermode);
            
            $this->validate([
                'silvermode'=>'required',
                'sellsilver'=>'required|numeric',
                'silveramount'=>'required|numeric',
            ]);
            $cash = Asset::find(3);
            $silver = Asset::find(4);
            if($this->silvermode==1){
                $newsilver = $silver->quantity - $this->sellsilver;
                $newcash = $cash->quantity + $this->amount;
                $dis = "Silver Sell";
            }elseif($this->silvermode==2){
                $newsilver = $silver->quantity + $this->sellsilver;
                $newcash = $cash->quantity - $this->amount;
                $dis = "Silver Purchase";
            }
            $cash->update(['quantity'=>$newcash]);
            $silver->update(['quantity'=>$newsilver]);

            Payment::create([
                'amount'=>$this->silveramount,
                'puregold'=>$this->sellsilver,
                'flag'=>$this->silvermode,
                'discription'=>$dis,
            ]);
            $this->dispatch('closemodal');
            $this->reset();
            
        }
        public function calculate(){
            $this->amount = ceil(($this->sellgold/11.664) * $this->onetola);
            $this->amount += $this->extra;
        }


        public function delete($id){

            $payment = Payment::find($id);
            $puregold = Asset::find(1);
            $refinegold = Asset::find(2);
            $cash = Asset::find(3);
            $silver = Asset::find(4);
            $todaygold = Asset::find(6);
            $todaycash = Asset::find(7);

            if($payment->flag == 2){
                $newpuregold = $puregold->quantity - $payment->puregold;
                $newamount = $cash->quantity+$payment->amount;
                $cash->update(['quantity'=>$newamount]);
                $puregold->update(['quantity'=>$newpuregold]);
            }elseif($payment->flag == 1){
                $newpuregold = $puregold->quantity + $payment->puregold;
                $newsellamount = $cash->quantity - $payment->amount;
                $cash->update(['quantity'=>$newsellamount]);
                $puregold->update(['quantity'=>$newpuregold]);   
            }else{
                $newexpuregold = $puregold->quantity + $payment->puregold;
                $newexrefinegold = $refinegold->quantity - $payment->puregold;
                $puregold->update(['quantity'=>$newexpuregold]);
                $refinegold->update(['quantity'=>$newexrefinegold]);
            }

            $payment->delete();
        }





        public function findrecord(){
            $validated = $this->validate([
                'start'=>'required',
                'end'=>'required'
            ]);
            $data = Payment::whereDate('created_at','>=',$this->start)->whereDate('created_at','<=',$this->end)->get();
            $this->payment = $data->all();

        }




























    
        public function addgoldcash(){

            $this->validate([
                'totalprice'=>'required|numeric',
                'goldgm'=>'required|numeric',
                'goldamount'=>'required|numeric',
            ]);
            $amount = Asset::find(3);
            $gold = Asset::find(1);
            $newamount = $amount->quantity - $this->goldamount;
            $newgold = $gold->quantity + $this->goldgm;
            $amount->update(['quantity'=>$newamount]);
            $gold->update(['quantity'=>$newgold]);
            
            Payment::create([
                'discription'=>'Gold Cash',
                'puregold'=>$this->goldgm,
                'amount'=>$this->goldamount,
                'flag'=>2,
            ]);
            $this->dispatch('closemodal');
            $this->reset();
        }



    public function addpayment(){
        $validated = $this->validate([
            'clientid'=>'required',
            'amount'=>'required',
            'mode'=>'required',
        ]);
        $vendor = Client::find($this->clientid);

        if($this->date){
            $date = $this->date;
        }else{
            $date = now();
        }
        
        if($this->flag){
            $amount=$this->amount;
            $payment = Payment::find($this->flag);
            $payment->update([
                'client_id'=>$this->clientid,
                'flag'=>$this->mode,
                'amount'=>$this->amount,
                'created_at'=>$date,
            ]);
        }else{

            if($this->mode=="0"){
                $amount=$vendor->amount - $this->amount;
                
            }elseif($this->mode=="1"){
                $amount=$vendor->amount + $this->amount;
            }

        $payment = Payment::create([
            'client_id'=>$this->clientid,
            'flag'=>$this->mode,
            'amount'=>$this->amount,
            'discription'=>"Liability",
            'created_at'=>$date,
        ]);
    }
    $vendor->update(['amount'=>$amount]);

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
            
        $payment = Payment::whereDate('created_at',now()->toDateString())->orderBy('id','desc')->take(10)->get();
      }

        
        $payments = $payment;
       

        $cash = Asset::find(3);
        $puregold = Asset::find(1);
        $refinegold = Asset::find(2);

        $cashout = Payment::whereDate('created_at',now()->toDateString())->where('flag','2')->sum('amount');
        $cashin = Payment::whereDate('created_at',now()->toDateString())->where('flag','1')->sum('amount');
        $goldout = Payment::whereDate('created_at',now()->toDateString())->where('flag','1')->where('discription','Gold Sell')->sum('puregold');
        $goldin = Payment::whereDate('created_at',now()->toDateString())->where('flag','2')->where('discription','Gold Purchase')->sum('puregold');
        // dd($goldin);


        $totalgold = Asset::find(6);
        // $totalgold = Asset::find(6);
        $totalcash = Asset::find(7);
        // $totalcash = Asset::find(7);

        // $totalgold = ;
        $subgold =$totalgold->quantity+$goldin;
        $resultgold = $subgold-$goldout;

        $subcash =$totalcash->quantity+$cashin;
        $resultcash = $subcash-$cashout;

        $start = $this->start;
        // dd($resultgold);
        return view('livewire.pymentledgers',compact('start','payments','cash','puregold','refinegold','cashout','goldout','resultgold','resultcash','totalgold','totalcash'))->extends('layouts.app');
    }
}
