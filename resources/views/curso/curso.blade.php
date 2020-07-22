@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
<div class="col-md-6">
<h2>Curso : {{$curso->name}}</h2>
<h4>Docente : {{$curso->docente->name}}</h4>
{!! $curso->youtubelink !!}

<h4>Descripción : </h4>
<p class="card-text">{{$curso->description}}</p>
@if (count($curso->modulos))
<h3>Modulos : </h3>
<div id="accordion">
@foreach ($curso->modulos as $modulo)

  <div class="card" style="margin-top:2%;">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#data{{$modulo->id}}" aria-expanded="true" aria-controls="data{{$modulo->id}}">
          {{$modulo->title}}
        </button>
      </h5>
    </div>

    <div id="data{{$modulo->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      {{$modulo->description}}
      </div>    
    </div>
  </div>

  @endforeach

  
</div>
@endif



<form id="form1" action="{{route('addComentario')}}" method="post">  
@csrf
<input type="hidden" id="id" name="id" value={{$curso->id}}>

@if(Auth::user())
<div class="form-group">
  <label for="comment">Dejandos tu comentario : </label>
  <textarea  style="border-color: green;" required  name="comentario" class="form-control" rows="5" id="comment"></textarea>
</div>
<button id="target" type="submit" style="float:right" class="btn btn-primary">Comentar</button>
@endif


</form>
@if(count($curso->comentarios)>0)
<h3>Comentarios : </h3>
@foreach ($curso->comentarios as $comentario)
<p>{{$comentario->usuario->name}} dice : </p> 
<hr/>
<p>{{$comentario->comentario}}</p>
@endforeach
@else
<h3>No hay comentarios</h3>
@endif



</div>  
<div class="col-md-6">
    <div>
    <div class="right">
    <div class="center">
<img class="view-image" src="data:image/png;base64,{{$curso->image}}" alt="Red dot" /> 
</div>
@if(Auth::user())
@if(Auth::user()->isSubscripto($curso->id))
<h1>Estas subscripto</h1>
@else
<a  class="module-button btn btn-primary" href="{{route('addCurso', ['id' => $curso->id])}}" role="button">Subscribirse</a>
@endif
@endif





</div>  
</div>
</div>


</div>

 
</div>  

@endsection
