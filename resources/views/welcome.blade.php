@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">


    @if (Route::has('login'))
        <nav class="d-flex justify-content-end">
            @auth
                <a class="fs-5 text-black" href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a class="fs-5 text-black" href="{{ route('login') }}">Log in</a>

            @endauth
        </nav>
    @endif
</div>
</div>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 text-center">

            <img class="w-50" src="{{asset('assets/logo.png')}}" alt="">
            <div >
                <span">Gold Shop Management System</span>
            </div>
            <hr class="w-50 mx-auto m-0 p-0">
            <div >
            <span">Whatsapp : 0346-9778485</span>
        </div>
        </div>
    </div>
</div>
@endsection

