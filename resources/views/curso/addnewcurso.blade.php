@extends('layouts.app')

@section('content')
<div class="container">
<div class="card" style="width: 28rem;">
  <div class="card-header">
  <p>Inserte un nuevo curso</p>
  </div>
  <div class="card-body">

<form>
  <div class="form-group">
  <label for="input1">Nombre del Curso: </label>
    <input type="email" class="form-control" id="input1"  placeholder="Ej : Biomodelos">
  </div>
  <div class="form-group">
  <label for="input2">Youtube Link : </label>
    <input type="email" class="form-control" id="input2"  placeholder="https://youtube.com">
  </div>

  <div class="form-group">
  <label for="sel1">Selecciona el docente : </label>
  <select class="form-control" id="sel1">
    @foreach ($docentes as $docente)
    <option>{{$docente->name}}</option>
    @endforeach

  </select>
</div>


  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>

<div class="image-upload" style="text-align:center">
  <label for="file-input">
  Imagen del Curso : 
  <i class="fa fa-upload fa-3x" aria-hidden="true"></i>
  </label>

  <input id="file-input" type="file" />
</div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
@endsection
