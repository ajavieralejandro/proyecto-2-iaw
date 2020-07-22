@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
<div class="col-md-8">
<h3 >Curso : {{$curso->name}}</h3>
<h3 >Docente : {{$curso->docente->name}}</h3>
<h3>Descripción : </h3>
<p class="card-text">{{$curso->description}}</p>
@if (count($curso->modulos))
<h3>Modulos : </h3>
<div id="accordion">
@foreach ($curso->modulos as $modulo)

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{$modulo->title}}
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      {{$modulo->description}}
      </div>    
    </div>
  </div>
  @endforeach

  
</div>
@endif

</div>  
<div class="col-md-4">

<img class="view-image" src="data:image/png;base64,{{$curso->image}}" alt="Red dot" /> 
<a  class="module-button btn btn-primary" href="/addModulosCurso/{{$curso->id}}" role="button">Editar Modulos</a>
<a  class="module-button btn btn-primary" href="/addModulosCurso/{{$curso->id}}" role="button">Editar Curso</a>



</div>  

</div>

 
</div>  

@endsection
