@extends('layouts.dashboard')

@section('head')
<style>
  @media(max-width:800px){
    .mobile_target{
      display: none;
    }
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 

@section('content')
@include('dashboard.partials._top_searchbar')
<div class="container" style="min-height: 100vh;">

  <!-- table starts -->

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Username</th>
      <th scope="col">Amount</th>
      <th class="mobile_target" scope="col">Balance</th>
      <th class="mobile_target" scope="col">Address</th>
      <th class="mobile_target">Status</th>
      <th>Actions</th>
    </tr>
    <tr>
      @include('partials._message')
    </tr>
  </thead>
  <tbody>
   @foreach($requests as $req)
   <tr>
      <th scope="row">{{$req->id}}</th>
      <td><a href="{{route('panel.user.profile', [$req->user->name, $req->user->id])}}">{{$req->user->name}}</a></td>
      <td>{{$req->amount}}</td>
      <td class="mobile_target">{{$req->user->wallet->balace}}</td>
      <td class="mobile_target">{{$req->add}}</td>
      <td class="mobile_target">@if($req->fullfilled == 0)
        <b>Nill</b>
        @elseif($req->fullfilled == 1)
        <b>Paid</b>
        @endif
      </td>
      <td style="display: flex;">
        @if($req->fullfilled ==0)
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#request-done-{{$req->id}}">Confirm</button>
        @else
          <button class="btn btn-danger">Reverse</button>
        @endif
          <button class="btn btn-sm" data-toggle="modal" data-target="#request-see-{{$req->id}}">
            <i class="fa-solid fa-eye fa-2x"></i>
          </button>
      </td>
    </tr>
    @include('dashboard.requests.request_modal')
   @endforeach
  </tbody>
</table>
{{$requests->links()}}
</div>
@endsection 