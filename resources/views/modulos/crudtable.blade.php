@extends('layouts.app')

@section('content')


    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($modulos as $modulo)

    <tr>
      <th scope="row">{{$modulo->id}}</th>
      <td>{{$modulo->title}}</td>
      <td><div><a href="/modulo/{{$modulo->id}}" class="edit btn btn-outline-success btn-sm">View</a>
                        <a href="/editmodulo/{{$modulo->id}}" class="edit btn btn-outline-warning btn-sm">Edit</a>
                        <button name="{{$modulo->title}}"  value="{{$modulo->id}}" class="delete btn btn-outline-danger btn-sm">Delete</button></div></td>
    </tr>
    @endforeach

  </tbody>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
<script type="text/javascript">
//Dinamic button clicked on Jquery!!
$(document).on('click', '.delete', function(event){
    console.log("el elemento clickead es : ");
    console.log(event.target.value);
  aux = $('.delete').val(); 
  console.log("El id es : ",aux); 
  toDelete = confirm("Are you sure you want to Delete : "+event.target.name);
  if(toDelete){
    $.ajax({
   url: '/deleteModulo',
   type: 'DELETE',
   data: {
     "id" : event.target.value,
    "_token": $("meta[name='csrf-token']").attr("content")
   },
   success: function(response) {
    location.reload(true);
   }
});
  }
});
</script>

@endsection