@extends('layouts.app')

@section('content')


    <div class="container">
    <table class="table table-sm data-table display nowrap">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
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
    <script src="{{ asset('js/cursodt.js') }}" defer></script>


@endsection
