@extends('layouts.app')

@section('content')
<div class="row p-4 m-4">
  <div class="card col-8 offset-3 shadow-lg" style="width: 50rem;">
    <img src="{{ asset('Storage/'.$article->image) }}" class="card-img-top pt-1" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">{{ $article->titre }}</h5> 
      <p class="card-text">{!! nl2br(e($article->contenu)) !!}</p>
      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
  </div>
</div>
@endsection