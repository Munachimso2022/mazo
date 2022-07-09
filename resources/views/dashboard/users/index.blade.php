@extends('layouts.dashboard')

@section('head')
<style>
  @media(max-width:700px){
    .mobile_target{
      display: none;
    }
  }
</style>
@endsection 

@section('content')
@include('dashboard.partials._top_searchbar')
<div class="container" style="min-height: 100vh;">

  <table class="table">
    <thead>
      <h2 class="text-center">User Table ({{$total}})</h2>
    </thead>
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Username</th>
        <th scope="col" class="mobile_target">Email</th>
        <th scope="col" class="mobile_target">Referrer</th>
        <th scope="col" class="mobile_target">Total Referrals</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td  class="mobile_target">{{$user->email}}</td>
        <td  class="mobile_target">
          @if($user->ref_deets != null)
          <a href="">{{$user->ref_deets->name}}</a>
          @else 
            <span>Nill</span>
          @endif
        </td>
        <td  class="mobile_target">{{$user->ref_count}} people</td>
        <td>
          <a href="{{route('panel.user.profile', [$user->name, $user->id])}}" t class="btn btn-primary btn-sm">view</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}
</div>
@endsection 