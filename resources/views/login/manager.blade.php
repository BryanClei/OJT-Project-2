@extends('layouts.layout')

@section('content')

<div class="col-xl-8 card m-5 w-50 mx-auto text-center card">
  <div class="card-header bg-primary text-white">
    For Manager
  </div>
  <div class="card-body">
    <h5 class="card-title">Manager</h5>
    <p class="card-text">Welcome Back {{$user->username}}!</p>
    <a href="{{ route('logout')}}" class="btn btn-primary">Logout</a>
  </div>
</div>

@endsection