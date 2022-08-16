@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.aside')
        <div class="col-md-10">
            <h4>nombre</h4>
            {!! Form::open(['route'=>['nombre.update',$nombre],'method'=>'PUT']) !!}
           
            <div class="form-group">
                {!! Form::label('Nombre','Nombre') !!}
                {!! Form::text('nombre',$nombre->nombre,['class'=>'form-control']) !!}                
            </div>

            <div class="form-group">
                {!! Form::label('sexo','Sexo:') !!}
                {!! Form::checkbox('sexo',null,$nombre->sexo) !!}
            </div>
            <div class="form-group">
                {!! Form::label('publicado','Publicado:') !!}
                {!! Form::checkbox('publicado',null,$nombre->publicado) !!}
            </div>       
            
            <div class="form-group">
                {{ Form::submit('EDITAR',['class'=>'btn btn-outline-primary']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
