@extends('layouts.dashboard')

@section('head')
<style>
  .action{
    display: none;
  }
  @media(max-width:700px){
    .action{
      display: flex;
    }
    .mobile_target{
      display: none;
    }
  }
</style>
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
      <th scope="col" class="">Amount</th>
      <th scope="col" class="mobile_target">Date</th>
      <th scope="col" class="mobile_target">Offer Name</th>
      <th class="action">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($invests as $invest)

   @php 
       $offer = App\Models\Offer::find($invest->offer_id);
   @endphp
   <tr>
      <th scope="row">{{$invest->id}}</th>
      <td><a href="">{{$invest->user->name}}</a></td>
      <td>{{$invest->amount}}</td>
      <td class="mobile_target">{{$invest->created_at}}</td>
      <td class="mobile_target">{{$offer->name}}</td>
      <td class="action">
        <button class="btn btn-sm" data-toggle="modal" data-target="#investment-{{$offer->id}}">View</button>
      </td>
    </tr>
    @include('dashboard.userinvestments._modal')
   @endforeach
  </tbody>
</table>
</div>
@endsection 