@extends('layouts.app')

@section('content')
<div class="container">
@foreach($cursos->chunk(3) as $chunk)
    <div class="row">
        @foreach($chunk as  $curso)
        <div class="margin">
            <div class="col-md-6">
                <div class="card" style="width:18rem;">
                    <img style=" max-width:100%;height:auto;"  src="data:image/png;base64,{{$curso->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$curso->name}}</h5>
                        <p class="card-text">
                        @if (strlen($curso->description) >50)
                        {{$curso->description | substr:0,50}}...
                        @else
                        {{$curso->description}}
                        @endif</p>
                        <a href="{{route('viewCurso', ['id' => $curso->id])}}" class="right btn btn-outline-success">Ver más</a>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endforeach
</div>
@endsection