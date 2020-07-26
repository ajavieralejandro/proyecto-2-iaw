@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuestro equipo: </h2>
<div class="gallery" id="gallery">

@foreach($docentes as $docente)
    <div class="gallery-item">
    @if($docente->image)
    <img class="mason-img avatar2"   src="data:image/png;base64,{{$docente->image}}" alt="user image">
 @else
    <img class="mason-img avatar2"   src="{{url('/images/avatar.png')}}" alt="user image">
@endif
        <div class="middle">
    <div class="text"><a href="{{route('getTeamDocenteView',['id'=>$docente->id])}}">{{$docente->name}}</a></div>
  </div>

  
        </div>
@endforeach
</div>


</div>

@endsection

@section('scripts')
<script src="{{ asset('js/masonry.js') }}" defer></script>

@endsection
