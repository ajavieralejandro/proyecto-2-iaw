@extends('layouts.app')

@section('content')


    <div class="container">
    <table class="table table-sm data-table display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Titulo</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>




@endsection

@section('scripts')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" ></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getModulosTables',['id' => $id]) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>


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
