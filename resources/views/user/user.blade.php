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
  <a href="{{route('getUserCursosView')}}" class="list-group-item list-group-item-action">Ver Cursos</a>
  <a href="{{route('editUser')}}" class="list-group-item list-group-item-action">Editar Perfil</a> 
</div>  
</div>



</div>



</div>
<div class="col-sm-12 col-md-8">
 @if(Auth::user()->avatar)
    <img class="avatar"  src="data:image/png;base64,{{Auth::user()->avatar}}" alt="user image">
 @else
    <img  style="float:right; width:300px;"  src="{{url('/images/avatar.png')}}" alt="user image">
@endif


    

</div>
</div>

</div>



@endsection





