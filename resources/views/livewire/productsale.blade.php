<div>
    <div class="container">
        <div class="row mt-5">
          <h4 class="mt-5">All Sales</h4>
            <div class="row">
              
              <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Sale
                      </button>
            </div>
      
                <div class="col-md-2">
                  <label>Starting Date</label>
                    <input type="date" class="form-control" wire:model="start">
                    @error('start')
                    <span class="text-danger">{{$message}}</span> 
                 @enderror
            </div>
      
                <div class="col-md-2">
                  <label>Ending Date</label>
                    <input type="date" class="form-control" wire:model="end">
                    @error('end')
                    <span class="text-danger">{{$message}}</span> 
                 @enderror
            </div>
      
                <div class="col-md-2 mt-4">
                  <button class="btn  btn-primary " wire:click="findrecord">Filter</button>
            </div>
             
            </div>
    
    <div class="col-md-12 mt-2">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Sales Table</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Products</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
        
          <tr>
            <td>{{$sale->id}}</td>
            <td>
              <p class="fw-normal mb-1">
                @foreach($sale->asset as $product)
                {{$product->product}}
                @endforeach
              </p>
            </td>
    
            <td>
              {{$sale->quantity}}
            </td>
            <td>{{$sale->amount}}</td>
            <td>
              <button type="button" wire:click="delete('{{$sale->id}}')"  class="btn btn-link btn-sm btn-rounded text-danger">Delete</button>
            </td>
          </tr>
   @endforeach
    
        </tbody>
      </table>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sale</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
    
                <div class="mb-3">
                  <label>Select Vendor</label>
                  <select wire:model="product" class="form-control">
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->product}}</option>
                    @endforeach
                  </select>
                  @error('product')
                     <span class="text-danger">{{$message}}</span> 
                  @enderror
                </div>
    
                <div class="mb-3">
                  <label>Quantity</label>
                  <input wire:model="quantity" type="text" class="form-control" >
                  @error('quantity')
                     <span class="text-danger">{{$message}}</span> 
                  @enderror
                </div>
    
                <div class="mb-3">
                  <label>Amount</label>
                  <input wire:model="amount" type="text" class="form-control" >
                  @error('amount')
                     <span class="text-danger">{{$message}}</span> 
                  @enderror
 
                </div>
    
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" wire:click="addsale" class="btn btn-primary">Add Sale</button>
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
