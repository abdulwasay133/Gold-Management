<div>
       
        <div class="container">
            <div class="row mt-5">
                <h4 class="mt-5">All Expense</h4>


            <div class="row">
                <div class="col-md-4 mt-3">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Expense
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
        


        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Expense Table</div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead class="bg-light">
              <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
              <tr>
                <td>{{$expense->id}}</td>
                <td>
                  <p class="fw-normal mb-1">{{$expense->amount}}</p>
                </td>

                <td>{{ Carbon\Carbon::parse($expense->created_at)->format('d-M-Y') }}</td>
                <td>
                  {{$expense->discription}}
                </td>
                <td>
                  <button type="button" wire:click="edit('{{$expense->id}}')"  class="btn btn-link btn-sm btn-rounded">Edit</button>
                  <button type="button" wire:click="delete('{{$expense->id}}')"  class="btn btn-link btn-sm btn-rounded text-danger">Delete</button>
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
        </div>
        
        
        {{-- ********** Modal ********** --}}
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Expense</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
        
                    <div class="mb-3">
                        <label>Select Vendor</label>
                       <textarea name="" id="" cols="30" rows="2" class="form-control" wire:model="description"></textarea>
                      @error('clientid')
                         <span class="text-danger">{{$message}}</span> 
                      @enderror
                    </div>
        
                    <div class="mb-3">
                      <label>Date</label>
                      <input wire:model="date" type="date" class="form-control" >
                      @error('date')
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
                  <button type="button" wire:click="addexpense" class="btn btn-primary">Add</button>
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
