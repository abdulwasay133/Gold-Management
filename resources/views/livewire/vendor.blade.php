<div>
   
<div class="container">
    <div class="row mt-5">
        <h4 class="mt-5">All Clints</h4>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Client
              </button>
    </div>

<div class="col-md-12 mt-2">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Clients Table</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="bg-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone #</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($vendors as $vendor)
      <tr>
        <td>{{$vendor->id}}</td>
        <td>
          <p class="fw-normal mb-1">{{$vendor->name}}</p>
        </td>

        <td>
          {{$vendor->mobile}}
        </td>
        <td>{{$vendor->address}}</td>
        <td>
          <button type="button" wire:click="edit('{{$vendor->id}}')"  class="btn btn-link btn-sm btn-rounded">Edit</button>
          <button type="button" wire:click="delete('{{$vendor->id}}')" class="btn btn-link btn-sm btn-rounded text-danger">Delete</button>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$flag?"Edit Vendor":"Add vendors"}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>

            <div class="mb-3">
              <label>Select Vendor</label>
              <input wire:model="name" type="text" class="form-control" >
              @error('name')
                 <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>

            <div class="mb-3">
              <label>Mobile #</label>
              <input wire:model="mobile" type="text" class="form-control" >
              @error('mobile')
                 <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>

            <div class="mb-3">
              <label>Address</label>
              <textarea wire:model="address" cols="30" rows="2" class="form-control"></textarea>
              @error('address')
                 <span class="text-danger">{{$message}}</span> 
              @enderror
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" wire:click="addvendor" class="btn btn-primary">{{$flag?"Update":"Add"}}</button>
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
