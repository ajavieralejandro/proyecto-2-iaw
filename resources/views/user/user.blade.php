@extends('layouts.app')

@section('content')
<div class="container">


<div class="row">
<div class="col-sm-12 col-md-4">
<div class="container">



<div class="card" style="width: 18rem">
  <div class="card-header">
    {{Auth::user()->name}}
  </div>
  <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Ver Cursos</a>
  <a href="{{route('editUser')}}" class="list-group-item list-group-item-action">Editar Perfil</a> 
</div>  
</div>



</div>



</div>
<div class="col-sm-12 col-md-8">

</div>
</div>

</div>



@endsection





