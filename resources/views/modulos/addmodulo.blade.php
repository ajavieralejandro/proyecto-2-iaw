@extends('layouts.app')

@section('content')
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form id="form1" action="/addModulo" method="post">  
<input type="hidden" id="id" name="id" value={{$curso->id}}>
@csrf

<div class="row">

<div class="col-md">

<div class="card" style="width: 28rem">
  <div class="card-header">
  <p>Inserte un nuevo Modulo</p>
  </div>
  <div class="card-body">

  <div class="form-group">

  <label for="input1">Título del modulo: </label>
    <input type="text" class="form-control" id="input1" name="title" required  placeholder="Ej : modulo 1">
  </div>


  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea name="description" required class="form-control" rows="5" id="comment"></textarea>
</div>



  <button id="target" type="submit" style="float:right" class="btn btn-primary">Subir Modulo</button>
</div>
</div>
</div>





</form>
</div>

</div>
@endsection



