@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.aside')
        <div class="col-md-10">
            <h4>Tag</h4>
            {!! Form::open(['route'=>['tag.update',$tag],'method'=>'PUT']) !!}
           
            <div class="form-group">
                {!! Form::label('Nombre','Nombre') !!}
                {!! Form::text('nombre',$tag->nombre,['class'=>'form-control']) !!}                
            </div>
          
            
            <div class="form-group">
                {{ Form::submit('EDITAR',['class'=>'btn btn-outline-primary']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
