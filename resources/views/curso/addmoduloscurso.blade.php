@extends('layouts.app')

@section('content')
<div class="container">


<div class="row">
<div class="col-sm-12 col-md-4">
<div class="container">



<div class="card" style="width: 18rem">
  <div class="card-header">
    Modulos Curso
  </div>
  <div class="list-group">
  <a href="{{route('getModulosView',['id' => $curso->id])}}" class="list-group-item list-group-item-action">Ver Modulos</a>
  <a href="{{route('addModuloView',['id' => $curso->id])}}" class="list-group-item list-group-item-action">Agregar Nuevo Modulo</a> 
  <a href="{{route('admin')}}" class="list-group-item list-group-item-action">Menu Admin</a> 

</div>  
</div>



</div>



</div>
<div class="col-sm-12 col-md-8">

</div>
</div>

</div>



@endsection





