@extends('layouts.app')

@section('content')
<div class="container">


<div class="row">
<div class="col-sm-12 col-md-4">
<div class="container">



<div class="card" style="width: 18rem;">
  <div class="card-header">
    Admin Menu
  </div>
  <div class="list-group">
  <a href="{{route('cursosCrud')}}" class="list-group-item list-group-item-action">Cursos</a>
  <a href="#" class="list-group-item list-group-item-action">Agregar Nuevo Curso</a>
  <a href="#" class="list-group-item list-group-item-action">Docentes</a>
  <a href="#" class="list-group-item list-group-item-action">Agregar Nuevo Docente</a> 
</div>
</div>



</div>



</div>
<div class="col-sm-12 col-md-8">

</div>
</div>

</div>



@endsection
