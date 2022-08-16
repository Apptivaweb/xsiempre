@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.aside')
        <div class="col-md-10">
            <h1>TAG</h1>
            {!! Form::open(['route'=>'tag.store','method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::label('nombre','Nombre:') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control']) !!}
                </div>                
                <div class="form-group">
                    {{ Form::submit('SAVE',['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection