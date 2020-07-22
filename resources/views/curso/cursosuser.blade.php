@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cursos subscripto: </h2>
    <div class="gallery">

@foreach($cursos as $curso)
    <div class="img-container">
        <img class="mason-img"   src="data:image/png;base64,{{$curso->image}}" alt="Card image cap">
        <div class="middle">
    <div class="text">{{$curso->name}}</div>
  </div>
</div>
@endforeach
</div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>

@endsection
