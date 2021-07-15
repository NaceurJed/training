@extends('layouts.app')

@section('content')
<div class="row p-4 m-4">
  <div class="card col-8 offset-3 shadow-lg" style="width: 50rem;">
    <img src="{{ asset('Storage/'.$competition->image) }}" class="card-img-top pt-1" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">{{ $competition->nom }}</h5> 
      <h5 class="card-title text-center">Rendez-vous le {{ (new Datetime($competition->date_compet))->format('d-m-Y') }}</h5> 
      <p class="card-text">{!! nl2br(e($competition->description)) !!}</p>
      
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Participer
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $competition->nom }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Les inscription ne sont pas encore ouvertes.
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection