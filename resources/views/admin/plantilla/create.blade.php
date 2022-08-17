@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @include('admin.aside')
        <div class="col-md-10">
            <h1>PLANTILLA</h1>
            {!! Form::open(['route'=>'plantilla.store','method'=>'POST','files'=>true]) !!}
            <div class="row">    
                <!--    
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <div class="card card-body">
                        <h2 class="fs-5">NOMBRE</h2>
                        <div class="row form-group">
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombretop','Top') !!}
                            {!! Form::number('gif_nombretop',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombreleft','Left') !!}
                            {!! Form::number('gif_nombreleft',null,['class'=>'form-control']) !!}
                        </div>                        
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombrestrokewidth','Strokewidth') !!}
                            {!! Form::number('gif_nombrestrokewidth',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombrefontsize','Fontsize') !!}
                            {!! Form::number('gif_nombrefontsize',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombrefontcolor','Fontcolor') !!}
                            {!! Form::color('gif_nombrefontcolor',null,['class'=>'form-control']) !!}
                        </div>                        
                        <div class="col-sm-3">
                            {!! Form::label('gif_nombrestrokecolor','Strokecolor') !!}
                            {!! Form::color('gif_nombrestrokecolor',null,['class'=>'form-control']) !!}
                        </div>
                        </div>
                    </div>
                    <div class="card card-body">
                        <h2 class="fs-5">FRASE</h2>
                        <div class="row form-group">
                        <div class="col-sm-3">
                            {!! Form::label('gif_frasetop','Top') !!}
                            {!! Form::number('gif_frasetop',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_fraseleft','Left') !!}
                            {!! Form::number('gif_fraseleft',null,['class'=>'form-control']) !!}
                        </div>                        
                        <div class="col-sm-3">
                            {!! Form::label('gif_frasestrokewidth','Strokewidth') !!}
                            {!! Form::number('gif_frasestrokewidth',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_frasefontsize','Fontsize') !!}
                            {!! Form::number('gif_frasefontsize',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::label('gif_frasefontcolor','Fontcolor') !!}
                            {!! Form::color('gif_frasefontcolor',null,['class'=>'form-control']) !!}
                        </div>                        
                        <div class="col-sm-3">
                            {!! Form::label('gif_frasestrokecolor','Strokecolor') !!}
                            {!! Form::color('gif_frasestrokecolor',null,['class'=>'form-control']) !!}
                        </div>
                        </div>
                    </div>
                </div>
            -->
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('nombre','Nombre:') !!}
                        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('frase','Frase:') !!}
                        {!! Form::textarea('frase',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('top','Frase:') !!}
                        {!! Form::textarea('top',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('bottom','bottom:') !!}
                        {!! Form::textarea('bottom',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Gif','GIF:') !!}
                        {!! Form::file('gif',['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>            
                
                <div class="form-group">
                    {{ Form::submit('SAVE',['class'=>'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection