@extends('layouts.app')

@section('content')
<div>
   
  <div class="container">
      <div class="row">
          <h4>All Clints</h4>
          <div class="col-md-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Add Vendors
                </button>
      </div>
  
  <div class="col-md-12 mt-2">
  
  <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Name</th>
          <th>Title</th>
          <th>Status</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                  alt=""
                  style="width: 45px; height: 45px"
                  class="rounded-circle"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Software engineer</p>
            <p class="text-muted mb-0">IT department</p>
          </td>
          <td>
            <span class="badge bg-success rounded d-inline">Active</span>
          </td>
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Edit
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                  class="rounded-circle"
                  alt=""
                  style="width: 45px; height: 45px"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">Alex Ray</p>
                <p class="text-muted mb-0">alex.ray@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Consultant</p>
            <p class="text-muted mb-0">Finance</p>
          </td>
          <td>
            <span class="badge bg-primary rounded d-inline"
                  >Onboarding</span>
          </td>
          <td>Junior</td>
          <td>
            <button
                    type="button"
                    class="btn btn-link rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark"
                    >
              Edit
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                  class="rounded-circle"
                  alt=""
                  style="width: 45px; height: 45px"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">Kate Hunington</p>
                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Designer</p>
            <p class="text-muted mb-0">UI/UX</p>
          </td>
          <td>
            <span class="badge bg-warning rounded d-inline">Awaiting</span>
          </td>
          <td>Senior</td>
          <td>
            <button
                    type="button"
                    class="btn btn-link btn-rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark"
                    >
              Edit
            </button>
          </td>
        </tr>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add vendors</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
  
              <div class="mb-3">
                <label>Name</label>
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
            <button type="button" wire:click="addvendor" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div>
  <script>
    document.addEventListener('livewire:init', () => {
  
      document.addEventListener('closemodal',e=>{
        modal= document.querySelector('#exampleModal');
        modal.style.display='none';
      })
    });
  </script>
  
  </div>
  
@endsection
