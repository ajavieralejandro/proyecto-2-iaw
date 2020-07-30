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

<div class="center">


<form id="form1" action="/admin/addCurso" method="post" enctype="multipart/form-data">  
@csrf



<div class="card responsive-card" >
  <div class="card-header">
  <p>Inserte un nuevo curso</p>
  </div>
  <div class="card-body">

  <div class="form-group">
  <label for="input1">Nombre del Curso: </label>
    <input required  type="text" class="form-control" value="{{ old('name) }}" id="input1" name="name"  placeholder="Ej : Biomodelos">
  </div>
  <div class="form-group">
  <label for="input2">Youtube Link : </label>
    <input required  type="text" class="form-control" value="{{ old('youtubelink') }}" name="youtubelink" id="input2"  placeholder="https://youtube.com">
  </div>

  <div class="form-group">
  <label for="input2">Classrom Link : </label>
    <input required  type="text" name="link" value="{{ old('link') }}" class="form-control" id="input3" >
  </div>
  <div class="form-group">
  <label for="input1">Precio: </label>
    <input required  type="number" class="form-control" value="{{ old('price') }}" id="input0" name="price"  placeholder="500">
  </div>

  <div class="form-group">
  <label for="sel1">Selecciona el docente : </label>
  <select required  class="form-control" value="{{ old('docente') }}" name="docente" id="sel1">
    @foreach ($docentes as $docente)
    <option value={{ $docente->id }} >{{$docente->name}}</option>
    @endforeach

  </select>
</div>

  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea required  name="descripcion" value="{{ old('description') }}" class="form-control" rows="5" id="comment"></textarea>
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



