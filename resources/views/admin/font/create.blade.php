@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row">

        @include('admin.aside')         

        <div class="col-10">

            <h1 class="lead bg-primary text-white p-3">FUENTES » CREACIÓN</h1>

            {!! Form::open(['route'=>'font.store','method'=>'POST','files'=>true]) !!}        

                <div class="form-group">

                    {!! Form::label('nombre','Nombre') !!}

                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}

                </div>         

               

                <div class="form-group">

                    {!! Form::label('urlfont','Tarjeta') !!}

                    {!! Form::file('urlfont',['class'=>'form-control'])!!}

                </div>



                <div class="form-group">

                    <a href="javascript: history.go(-1)" class="btn btn-success">CANCELAR</a>

                    {{ Form::submit('CREAR',['class'=>'btn btn-success']) }}

                </div>

            {!! Form::close() !!}

        </div>

    </div>

</div>

@endsection

