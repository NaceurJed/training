@extends('layouts.app')

@section('content')
<div class="row p-4 m-4">
  <div class="card col-8 offset-3 shadow-lg" style="width: 50rem;">
    <img src="{{ asset('Storage/'.$competition->image) }}" class="card-img-top pt-1" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">{{ $competition->nom }}</h5> 
      <h5 class="card-title text-center">Rendez-vous le {{ (new Datetime($competition->date_compet))->format('d-m-Y') }}</h5> 
      <p class="card-text">{!! nl2br(e($competition->description)) !!}</p>
      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
  </div>
</div>
@endsection