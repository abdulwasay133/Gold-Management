<div>

   
        <div class="container">
            <div class="row mt-5">
              <div class="col-md-3">
                <h4 class="mt-5">All Clints Ledgers</h4>
                </div>
                <div class="col-md-6  mt-5 d-flex justify-content-between">
                  
<div class="card mb-1">
  <div class="card-header bg-danger text-white">
    Cash Payable
  </div>
  <div class="card-body p-4s text-danger">

    {{$amountpay}}
  </div>
</div>
<div class="card mb-1">
  <div class="card-header bg-dark text-white">
    Cash Receivable
  </div>
  <div class="card-body p-4s">
    {{$amountrec}}
  </div>
</div>
<div class="card mb-1">
  <div class="card-header bg-danger text-white">
    Gold Payable
  </div>
  <div class="card-body p-4s text-danger">
    {{$goldpay}}
  </div>
</div>
<div class="card mb-1">
  <div class="card-header bg-dark text-white">
    Gold Receivable
  </div>
  <div class="card-body p-4s">
    {{$goldrec}}
  </div>
</div>
                </div>

            
        
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Clients </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone #</th>
                <th>Amount</th>
                <th>Gold</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vendors as $vendor)
              <tr>
                <td>{{$vendor->id}}</td>
                <td>
                  {{$vendor->name}}
                </td>
        
                <td>
                  {{$vendor->mobile}}
                </td>
                <td>{{$vendor->amount}}</td>
                <td>{{$vendor->gold}}</td>
                <td>
                  <a href="vendordetail/{{$vendor->id}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a> 
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
        
                    <div class="mb-3">
                      <label>Select Client</label>
                      <select class="form-control" wire:model="client">
                        <option value="0">Select Client</option>
                      @foreach($clients as $client)
                      <option value="{{$client->id}}">{{$client->name}}</option>
                      @endforeach
                    </select>
                      @error('client')
                      <span class="text-danger">{{$message}}</span> 
                      @enderror
                    </div>
        
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
                        <option value="0">Select Client</option>
                        <option value="1">Incoming</option>
                        <option value="2">Outgoing</option>
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

        function MakeNegative() {
    TDs = document.getElementsByTagName('td');
    for (var i=0; i<TDs.length; i++) {
            var temp = TDs[i];
            if (temp.firstChild.nodeValue.indexOf('-') == 0) temp.className = "bg-danger text-white";
        }
}


MakeNegative();

        
        
        
          });
        </script>
        

        
</div>
