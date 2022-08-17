@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{$generado->nombre}}</h1>
            <img src="/gif/g/{{$generado->gif}}" alt="" class="img-fluid mx-auto d-block">
        </div>
    </div>
</div>
@endsection
