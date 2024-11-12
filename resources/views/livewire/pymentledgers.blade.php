<div>

<div class="container">
    <div class="row mt-5">
        {{-- <h4 class="mt-5">All Cashflow Details</h4> --}}
        
        <div class="row mt-4">
          <div class="col-md-3 mt-5">
              <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Entry 
                </button>
      </div>

          <div class="col-md-2 mt-4">
            <label>Starting Date</label>
              <input type="date" class="form-control" wire:model="start">
              @error('start')
              <span class="text-danger">{{$message}}</span> 
           @enderror
      </div>

          <div class="col-md-2 mt-4">
            <label>Ending Date</label>
              <input type="date" class="form-control" wire:model="end">
              @error('end')
              <span class="text-danger">{{$message}}</span> 
           @enderror
      </div>

          <div class="col-md-2 mt-5">
            <button class="btn  btn-primary " wire:click="findrecord">Filter</button>
      </div>
      <div class="col-md-3 mt-2">
        <table class="table table-bordered shadow">
          <tbody>
            <tr>
              <td><b>Gold</b</td>
              <td><b>{{$puregold->quantity+$refinegold->quantity}} gm</b</td>
            </tr>
            <tr>
              <td><b>Cash</b></td>
              <td><b>{{$cash->quantity}} Rs</b></td>
            </tr>
          </tbody>
        </table>
      </div>
       
      </div>
<div class="col-md-12 mt-2">

  <div class="card">
    <div class="card-header">
      
      <div class="row mb-3">

<div class="col-md-6">
<div class="card-title">Cash Book</div>
</div>

</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Description</th>
        <th>Gold</th>
        <th>Amount</th>
        <th>Mode</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>0</td>
        <td>{{Carbon\Carbon::now()->format('d-M-Y')}}</td>
        <td>Today Total</td>
        <td><div class="d-flex">
          {{$totalgold->quantity}} Gm
        </div>
        </td>
        <td><div class="d-flex">
         {{$totalcash->quantity}} Rs
        </div></td>
        <td></td>
        <td></td>
      </tr>

      @php
         $no = 0; 
      @endphp
      @foreach($payments as $payment)
      @php
      $no ++;
      @endphp
      <tr class="{{ $payment->discription}}">
        <td>{{$no}}</td>
        <td>{{Carbon\Carbon::parse($payment->created_at)->format('d-M-Y') }}</td>
        <td>{{ $payment->discription}}</td>
        <td>{{ $payment->puregold}} gm</td>

        <td>{{ $payment->amount}} </td>
@if($payment->flag == 1 )
        <td>
            Cash In
        </td>
        
        @elseif($payment->flag == 2)
        <td>
            Cash Out
        </td>
        @else
        <td></td>
        @endif
        
        
  
        <td>
          <button type="button" wire:click="edit('{{$payment->id}}')"  class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></button>
          <button type="button" wire:click="delete('{{$payment->id}}')" class="btn btn-sm  btn-danger"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      
  @endforeach
  <tr>
    <td colspan="2"><h4>Total Today</h4></td>
    <td></td>
    <td><div class="d-flex">
      <h4>{{$resultgold}} </h4><span class="mt-2"> Gold</span>
    </div>
    </td>
    <td><div class="d-flex">
      <h4>{{$resultcash}} </h4><span class="mt-2"> Cash</span>
    </div></td>
    <td></td>
    <td></td>
  </tr>
    </tbody>
  </table>

</div>
</div>
</div>

</div>
</div>
</div>

{{-- ********** Modal ********** --}}
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Entr Record</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">

            
          <div class="col-md-6 mb-3">
            <input class="redio" type="radio" data-filter='goldexchange' name="product" id="goldexchange" value="goldexchange" />
            <label>Gold Exchange</label>
          </div>
          <div class="col-md-6 mb-3">
            <input class="redio" type="radio" data-filter='goldsell' name="product" id="goldsale" value="goldsell" checked/>
            <label>Gold Sell/Purchase</label>
          </div>
            {{-- <div class="col-md-6 mb-3">
            <input class="redio" type="radio" data-filter="goldcash" name="product" id="goldcash" value="goldcash" />
            <label>Gold/Cash Sell/Purchase</label>
          </div> --}}
            <div class="col-md-6 mb-3">
            <input class="redio" type="radio" data-filter='silversell' name="product" id="goldsale" value="sliversell" />
            <label>Silver Sell/Purchase</label>
          </div>

        </div>
        <hr>
{{-- **** Exchange Gold **** --}}

        <div class="goldexchange gold hide" data-name='goldexchange' >
          <form wire:submit.prevent='addgoldexchange'>

          <div class="mb-3">
            <label>Gold Grams</label>
            <input wire:model.lazy="excgold" type="text" name="" id="" class="form-control">
            @error('excgold')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <button class="btn btn-sm btn-primary" type="submit">Add</button>
        </form>
        </div>



{{-- **** sell Gold **** --}}
<div class="goldexchange gold" data-name='goldsell' >
  <form wire:submit.prevent='addgoldsell'>
  <div class="mb-3">
    <label>1 Tola Amount</label>
    <input wire:model="onetola" type="text" id="onetola" class="form-control">
    @error('onethola')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="mb-3">
    <label>Pure Gold</label>
    <input wire:model="sellgold" type="text"  id="gm" class="form-control">
    @error('sellgold')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  
    <div class="mb-3">
    <label>Amount</label>
    <input readonly wire:model="amount" type="text" id="price" class="form-control">
    @error('amount')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  
    <div class="mb-3">
    <label>Status</label>
    <select class="form-control" wire:model="mode">
      <option value="" selected>Select</option>
      <option value="1">Gold Sell</option>
      <option value="2">Gold Purchase</option>
    </select>
    @error('mode')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="mb-3">
    <label>Add Extra Amount</label>
    <input wire:model="extra" type="number" id="extra" class="form-control">
    @error('extra')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

 
  <button class="btn btn-sm btn-primary" type="submit">Add</button>
</form> 
<div class="m-3">
  <button wire:click="calculate" class="btn btn-sm btn-primary">Calculate</button>
  <button wire:click="calculate" id="print" class="btn btn-sm btn-secondary">Print</button>
</div>
</div>



{{-- **** Sell Selver **** --}}

<div class="goldexchange gold hide" data-name='silversell' >
  <form wire:submit.prevent='addsilversell'>
  <div class="mb-3">
    <label>Pure Silver</label>
    <input type="text" wire:model="sellsilver" class="form-control">
    @error('sellsilver')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  
    <div class="mb-3">
    <label>Amount</label>
    <input type="text" wire:model="silveramount" class="form-control">
    @error('silveramount')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  
    <div class="mb-3">
    <label>Status</label>
    <select class="form-control" wire:model="silvermode">
      <option value="">Select Mode</option>
      <option value="1">Sell</option>
      <option value="2">Purchase</option>
    </select>
    @error('silvermode')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

      
  <button class="btn btn-sm btn-primary" type="submit">Add</button>
</form> 

</div>

</div>  

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>




<script>
  document.addEventListener('livewire:init', () => {
    
document.addEventListener('closemodal', () => {

$("#exampleModal").modal('hide');

});

document.addEventListener('openmodal', () => {

$("#exampleModal").modal('show');

});

document.addEventListener('alert', () => {

  alert("Invalid Entry Pleas Try Again.");

});

});


</script>

</div>
