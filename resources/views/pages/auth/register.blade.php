@extends('layouts.public')

@section('head')
<style>
  .btn-custom {
    background-color: grey;
    color: white;
    
  }
  .container{
    margin-top: 8rem;
    margin-bottom:7rem !important;
    padding-bottom: 7rem !important;
  }
</style>
@endsection

@section('content')
  <div class="container custom-container">
    <form action="{{route('register')}}" method="POST" class="form mb-5">
      @csrf 
      <div class="form-group mt-4">
        <h3 class="text-center">Create a Mazoneinvest Account</h3>
      </div>
      @include('partials._message')
      <div class="form-group mt-4">
        <label for="" class="form-label">Username</label>
        <input type="text" name="username" class="form-control">
      </div>
      <div class="form-group mt-4">
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="form-group mt-4">
        <label for="" class="form-label">Referral Code</label>
        <input type="text" name="referral_code" class="form-control">
      </div>
      <div class="form-group mt-4">
        <label for="" class="form-label">Password</label>
        <input type="text" name="password" class="form-control">
      </div>
      <div class="form-group mt-4">
        <label for="" class="form-label">Confirm Password</label>
        <input type="text" name="password_confirmation" class="form-control">
      </div>
      <div class="form-group mt-4">
        <button style="float: right;background-color:#f7921a;" class="btn btn-custom">Create Account</button>
      </div>
    </form>
  </div>      
@endsection