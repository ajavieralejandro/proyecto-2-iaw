@extends('layouts.app')

@section('content')
<div class="container">




<div class="row">
<div class="center">
    <div>

</div>



<div class="card" >
  <div class="card-header">
    <h1 style="text-align:center;">{{Auth::user()->name}}</h1> 
    @if(Auth::user()->avatar)
    <img class="avatar"   src="data:image/png;base64,{{Auth::user()->avatar}}" alt="user image">
 @else
    <img class="avatar" src="{{url('/images/avatar.png')}}" alt="user image">
@endif
  </div>
  <div class="list-group">
  <a href="{{route('getUserCursosView')}}" class="list-group-item list-group-item-action">Ver Cursos</a>
  <a href="{{route('editUser')}}" class="list-group-item list-group-item-action">Editar Perfil</a> 
</div>  


</div>

</div>

</div>



@endsection





