@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-4">
<div class="center">
@if($docente->image)
    <img class="avatar"  src="data:image/png;base64,{{$docente->image}}" alt="user image">
 @else
    <img  style="float:right; width:300px;"  src="{{url('/images/avatar.png')}}" alt="user image">
@endif

</div>
</div>
<div class="col-sm-12 col-md-8" style="text-align:center">
<h1>{{$docente->name}}</h1>
    <p>mail : {{$docente->email}}</p>
    <p>profesión : {{$docente->profesion}}</p>
    <p>bio : {{$docente->bio}}  </p> 

</div>

</div>

<h2>Cursos dados : </h2>

<div class="gallery" id="gallery">

@foreach($cursos as $curso)
    <div class="gallery-item">
    <img class="mason-img"   src="data:image/png;base64,{{$curso->image}}" alt="Card image cap">
        <div class="middle">
    <div class="text"><a href="{{route('viewCurso',['id' => $curso->id])}}" >{{$curso->name}}</a></div>
  </div>

  
        </div>
@endforeach
</div>



</div>  

@endsection

@section('scripts')
<script src="{{ asset('js/masonry.js') }}" defer></script>

@endsection

