@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
  <p>Nuevo Docente</p>
  </div>
  <div class="card-body">

<form action="/upload/docente" method="post" enctype="multipart/form-data">
@csrf


<div class="image-upload" style="text-align:center">
  <label for="file-input">
  <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
  </label>
  <p>Upload Avatar</p>
  <input id="file-input" name="image" type="file" />
</div>



  <div class="form-group">
  <label for="input1">Nombre del Docente </label>
    <input type="text" name="name" class="form-control" id="input1"  placeholder="Juan Perez">
  </div>
  <div class="form-group">
  <label for="input2">Profesión: </label>
    <input type="text" class="form-control" name="profesion" id="input2"  placeholder="Ej: abogado">
  </div>

  <div class="form-group">
  <label for="comment">Bio: </label>
  <textarea class="form-control" name="bio" rows="5" id="comment"></textarea>
</div>

  <button type="submit" value="Upload" class="btn btn-primary">Cargar Docente</button>
</form>
</div>
</div>
</div>
@endsection
