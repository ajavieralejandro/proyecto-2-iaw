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
    
<div class="card" style="width:400px;">
  <div class="card-header">
  <p>Edit User</p>
  </div>
  <div class="card-body">

<form action="/editUser" method="post" enctype="multipart/form-data">

@method('PUT')
    @csrf

    <input type="hidden" id="id" name="id" value={{Auth::user()->id}}>


<div class="image-upload" style="text-align:center">
  <label for="file-input">
  <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
  </label>
  <p>Upload Avatar</p>
  <input id="file-input" name="avatar" type="file" />
</div>



  <div class="form-group">
  <label for="input1">Username </label>
    <input type="text" required  name="name" value="{{Auth::user()->name}}"class="form-control" id="input1">
  </div>    


  <div class="form-group">
  <label for="input1">mail</label>
    <input type="mail" required  name="email" value="{{Auth::user()->email}}"class="form-control" id="input2" >
  </div>   
  <button type="submit" value="Upload" class="btn btn-primary">Actualizar</button>
 

</form>
</div>
</div>
</div>
</div>
@endsection
