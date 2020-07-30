@extends('layouts.app')

@section('content')
<div class="container">
<div class="gallery" id="gallery">

@foreach($cursos as $curso)
    <div class="gallery-item">
        <img class="mason-img"   src="data:image/png;base64,{{$curso->image}}" alt="Card image cap">
        <div class="middle">
    <div class="text"><a href="{{route('viewCurso',['id' => $curso->id])}}">{{$curso->name}}</a></div>
  </div>

  
        </div>
@endforeach
</div>



</div>

@endsection

@section('scripts')
<script src="{{ asset('js/masonry.js') }}" defer></script>

@endsection
