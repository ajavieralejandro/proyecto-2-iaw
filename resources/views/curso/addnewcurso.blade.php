@extends('layouts.app')

@section('content')
<div class="container">
<div class="center">


<form id="form1" action="/addCurso" method="post" enctype="multipart/form-data">  
@csrf



<div class="card" style="width:600px;">
  <div class="card-header">
  <p>Inserte un nuevo curso</p>
  </div>
  <div class="card-body">

  <div class="form-group">
  <label for="input1">Nombre del Curso: </label>
    <input type="text" class="form-control" id="input1" name="name"  placeholder="Ej : Biomodelos">
  </div>
  <div class="form-group">
  <label for="input2">Youtube Link : </label>
    <input type="text" class="form-control" name="youtubelink" id="input2"  placeholder="https://youtube.com">
  </div>

  <div class="form-group">
  <label for="input2">Classrom Link : </label>
    <input type="text" name="link" class="form-control" id="input3" >
  </div>
  <div class="form-group">
  <label for="input1">Precio: </label>
    <input type="number" class="form-control" id="input0" name="price"  placeholder="500">
  </div>

  <div class="form-group">
  <label for="sel1">Selecciona el docente : </label>
  <select class="form-control" name="docente" id="sel1">
    @foreach ($docentes as $docente)
    <option value={{ $docente->id }} >{{$docente->name}}</option>
    @endforeach

  </select>
</div>

  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea name="descripcion" class="form-control" rows="5" id="comment"></textarea>
</div>

<div class="image-upload" style="text-align:center">
  <label for="file-input">
  Imagen del Curso : 
  <i class="fa fa-upload fa-3x" aria-hidden="true"></i>
  </label>
  <input name="image" id="file-input" type="file" />
</div>


  <button id="target" type="submit" style="float:right" class="btn btn-primary">Siguiente</button>
</div>





</form>
</div>
</div>

</div>
@endsection



