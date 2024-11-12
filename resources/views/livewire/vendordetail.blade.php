<div>
  <style>

    </style>
    <div class="container ">
        <div class="row mt-5">
            <h4 class="mt-5">Client Record</h4>
            
              <div class="row">
            <div class="col-md-2">
              <label>Starting Date</label>
                <input type="date" class="form-control" wire:model="start" >
        </div>
  
            <div class="col-md-2">
              <label>Ending Date</label>
                <input type="date" class="form-control" wire:model="end">
        </div>
            <div class="col-md-2">
              <button class="btn btn-sm btn-primary mt-4" wire:click="findrecord">Filter</button>
        </div>

        <div class="col-md-2">
          <button class="btn btn-primary mt-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add Record</button>
        </div>
  
  
         
        </div>
 
  
  
  
    
    <div class="col-md-12 mt-2">
      <div class="card">
        <div class="card-header">
          <div class="card-title">All Client Detail</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead  class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Gold</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vendors as $vendor)
          <tr class="cash{{$vendor->flag}}">
            <td>
              {{$vendor->id}}
            </td>
            <td>
              <p class="fw-normal mb-1">{{$vendor->client->name}}</p>
            </td>
            <td>
              {{ Carbon\Carbon::parse($vendor->created_at)->format('d-M-Y')}}
            </td>
  
            @if($vendor->flag == 1 )
          <td>
              Outgoing
          </td>
          @else
          <td>
              Incoming
          </td>
          @endif
            <td>{{$vendor->amount}}</td>
            <td>{{$vendor->gold}}</td>
            <td>
              {{-- <button type="button" wire:click="edit('{{$vendor->id}}')" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></button> --}}
              <button type="button" wire:click="delete('{{$vendor->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
          @endforeach
   
  
        </tbody>
      </table>
    </div>
    
    </div>
    </div>
    
  {{-- ********** Modal ********** --}}
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>



            <div class="mb-3">
              <div class="input-group">
                <div class="mx-3">
              <label>Amount</label>
              <input wire:model="amount" type="number" class="form-control" >
              @error('amount')
                 <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>
              <div>
              <label>Gold</label>
              <input wire:model="gold" type="number" class="form-control" >
              @error('gold')
                 <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>
            </div>
            </div>

            <div class="mb-3">
              <label>Select mood</label>
              <select class="form-control" wire:model="mode">
                <option value="0">Select Status</option>
                <option value="1">Outgoing</option>
                <option value="2">Incoming</option>
            </select>
              @error('client')
              <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" wire:click="addpayment" class="btn btn-primary">add</button>
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
      });
    </script>
</div>
