@extends('layouts.app')

@section('content')
<div class="container">
<form id="form1" action="/editModulo" method="post">
@method('PUT')
<input type="hidden" id="id" name="id" value={{$modulo->id}}>

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
    <input type="text" class="form-control" id="input1" name="title" value="{{$modulo->title}}" >
  </div>


  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea name="descripcion" class="form-control" rows="5" id="comment">{{$modulo->description}}</textarea>
</div>



  <button id="target" type="submit" style="float:right" class="btn btn-primary">Actualizar Modulo</button>
</div>
</div>
</div>





</form>
</div>

</div>
@endsection

