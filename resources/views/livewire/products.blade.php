<div>
     
<div class="container mt-5">
    <div class="row">
        


<div class="col-md-8 mx-auto mt-5">
    <div class="col-md-2">
      
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
          </button> --}}

            </div>
            <div class="card mt-3">
              <div class="card-header">
                <div class="card-title">Entries</div>
              </div>
              <div class="card-body ">
                <div class="table-responsive">
  <table class="table table-striped table-bordered ">
    <thead class="bg-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->product}}</td>
        <td>
          <p class="fw-normal mb-1">{{$product->quantity}}</p>
        </td>

        <td>
          <button type="button" wire:click="edit('{{$product->id}}')" class="btn btn-sm  btn-primary"><i class="fas fa-plus"></i></button>
          {{-- <button type="button" wire:click="delete('{{$product->id}}')" class="btn btn-link btn-sm btn-rounded text-danger">Delete</button> --}}
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Entry</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>

            <div class="mb-3">
              <label>Product</label>
              <input wire:model="product" type="text" class="form-control" >
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


          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" wire:click="addproduct" class="btn btn-primary">Entr Now</button>
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
