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
<form id="form1" action="/editCurso" method="post" enctype="multipart/form-data">  
<input type="hidden" id="id" name="id" value={{$curso->id}}>

@method('PUT')
@csrf


<div class="row">

<div class="col-md">

<div class="card" style="width: 28rem">
  <div class="card-header">
  <p>Inserte un nuevo curso</p>
  </div>
  <div class="card-body">

  <div class="form-group">
  <label for="input1">Nombre del Curso: </label>
    <input type="text" required  class="form-control" id="input1" name="name" value="{{$curso->name}}">
  </div>
  <div class="form-group">
  <label for="input2">Youtube Link : </label>
    <input type="text" required  class="form-control" name="youtubelink" value="{{$curso->youtubelink}}"  id="input2"  placeholder="https://youtube.com">
  </div>

  <div class="form-group">
  <label for="input2">Classrom Link : </label>
    <input type="text" required  name="link" class="form-control" value="{{$curso->link}}" id="input3" >
  </div>

  <div class="form-group">
  <label for="input1">Precio: </label>
    <input required  type="number" class="form-control" id="input0" name="price" value="{{$curso->price}}"  placeholder="500">
  </div>

  <div class="form-group">
  <label for="sel1">Selecciona el docente : </label>
  <select required  class="form-control" name="docente" value="{{$curso->docente}}" id="sel1">
    @foreach ($docentes as $docente)
    <option value={{ $docente->id }} >{{$docente->name}}</option>
    @endforeach

  </select>
</div>

  <div class="form-group">
  <label for="comment">Descripcion</label>
  <textarea required  name="descripcion" class="form-control" rows="5" id="comment">{{$curso->description}}</textarea>
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
</div>
</div>





</form>
</div>

</div>
@endsection



@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
<div class="col-md-8">
<h3 >Curso : {{$curso->name}}</h3>
<h3 >Docente : {{$curso->docente->name}}</h3>
<h3>Descripción : </h3>
<p class="card-text">{{$curso->description}}</p>
@if (count($curso->modulos))
<h3>Modulos : </h3>
<div id="accordion">
@foreach ($curso->modulos as $modulo)

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{$modulo->title}}
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      {{$modulo->description}}
      </div>    
    </div>
  </div>
  @endforeach

  
</div>
@endif

</div>  
<div class="col-md-4">

<img class="view-image" src="data:image/png;base64,{{$curso->image}}" alt="Red dot" /> 

</div>  

</div>

 
</div>  

@endsection
