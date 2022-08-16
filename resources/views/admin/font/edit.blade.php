@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.aside')         
        <div class="col-sm-10">
            <h1 class="lead bg-primary text-white p-3">fontS » EDICIÓN</h1>
            {!! Form::open(['route'=>['admin.font.update',$font],'method'=>'PUT','files'=>true]) !!}        
                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',$font->nombre,['class'=>'form-control','required']) !!}
                </div>               
                <div class="form-group">
                    {!! Form::label('urlfont','font') !!}
                    {{$font->urlfont}}
                    {!! Form::file('urlfont',['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    <a href="javascript: history.go(-1)" class="btn btn-success">CANCELAR</a>
                    {{ Form::submit('ACTUALIZAR',['class'=>'btn btn-success']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
