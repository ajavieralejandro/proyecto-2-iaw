@extends('layouts.app')

@section('content')
<div class="container">
@foreach($cursos->chunk(3) as $chunk)
    <div class="row">
        @foreach($chunk as  $curso)
            <div class="col-md-6">
                <div class="card" style="width:18rem;">
                    <img style=" height: 250px;" class="card-img-top"  src="data:image/png;base64,{{$curso->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$curso->name}}</h5>
                        <p class="card-text">
                        @if (strlen($curso->description) > 200)
                        {{$curso->description | substr:0,200}}...
                        @else
                        {{$curso->description}}
                        @endif</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
</div>
@endsection