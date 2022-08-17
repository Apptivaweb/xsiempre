@extends('layouts.admin')
@section('content')
@foreach($fuentes as $f)
<style>@font-face{font-family: "{{$f->nombre}}"; src: url("{{asset("font/".$f->urlfont)}}");}</style>
@endforeach
<script src="{{ asset('js/fabric.js') }}"></script>
<div class="container-fluid">
    <div class="row">
        @include('admin.aside')
        <div class="col-md-10">
            <h4>Plantilla</h4>
            {!! Form::open(['route'=>['plantilla.update',$plantilla],'method'=>'PUT','files'=>true]) !!}            
            <div class="row">
                <div class="col-sm-7">
                    <img src="/gif/{{$plantilla->gif}}" style="position: absolute;">
                    <canvas id="canvasgif" width="540" height="960" style="position: relative; border: 1px solid black"></canvas>                 
                </div>
                <div class="col-sm-5">
                    <div class="card card-body">
                        <h2 class="fs-5">NOMBRE</h2>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombretop','Top') !!}
                                {!! Form::number('gif_nombretop',$plantilla->gif_nombretop,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombreleft','Left') !!}
                                {!! Form::number('gif_nombreleft',$plantilla->gif_nombreleft,['class'=>'form-control']) !!}
                            </div>                        
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombrestrokewidth','Strokewidth') !!}
                                {!! Form::number('gif_nombrestrokewidth',$plantilla->gif_nombrestrokewidth,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombrefontsize','Fontsize') !!}
                                {!! Form::number('gif_nombrefontsize',$plantilla->gif_nombrefontsize,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombrefontcolor','Fontcolor') !!}
                                {!! Form::color('gif_nombrefontcolor',$plantilla->gif_nombrefontcolor,['class'=>'form-control']) !!}
                            </div>                        
                            <div class="col-sm-3">
                                {!! Form::label('gif_nombrestrokecolor','Strokecolor') !!}
                                {!! Form::color('gif_nombrestrokecolor',$plantilla->gif_nombrestrokecolor,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('font1','Font1') !!}
                                {!! Form::select('font1_id',$fonts,$plantilla->font1_id, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="card card-body">
                        <h2 class="fs-5">FRASE</h2>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                {!! Form::label('gif_frasetop','Top') !!}
                                {!! Form::number('gif_frasetop',$plantilla->gif_frasetop,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_fraseleft','Left') !!}
                                {!! Form::number('gif_fraseleft',$plantilla->gif_fraseleft,['class'=>'form-control']) !!}
                            </div>                        
                            <div class="col-sm-3">
                                {!! Form::label('gif_frasestrokewidth','Strokewidth') !!}
                                {!! Form::number('gif_frasestrokewidth',$plantilla->gif_frasestrokewidth,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_frasefontsize','Fontsize') !!}
                                {!! Form::number('gif_frasefontsize',$plantilla->gif_frasefontsize,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('gif_frasefontcolor','Fontcolor') !!}
                                {!! Form::color('gif_frasefontcolor',$plantilla->gif_frasefontcolor,['class'=>'form-control']) !!}
                            </div>                        
                            <div class="col-sm-3">
                                {!! Form::label('gif_frasestrokecolor','Strokecolor') !!}
                                {!! Form::color('gif_frasestrokecolor',$plantilla->gif_frasestrokecolor,['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::label('font2','Font2') !!}
                                {!! Form::select('font2_id',$fonts,$plantilla->font2_id, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('nombre','Nombre:') !!}
                    {!! Form::text('nombre',$plantilla->nombre,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('frase','Frase:') !!}
                    {!! Form::textarea('frase',$plantilla->frase,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('top','Frase:') !!}
                    {!! Form::textarea('top',$plantilla->top,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('bottom','bottom:') !!}
                    {!! Form::textarea('bottom',$plantilla->bottom,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Gif','GIF:') !!}
                    {!! Form::file('gif',['class'=>'form-control']) !!}
                </div>
            </div>
        </div> 
            
            <div class="form-group">
                {{ Form::submit('EDITAR',['class'=>'btn btn-outline-primary']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
var canvasgif = new fabric.Canvas('canvasgif', { preserveObjectStacking: true });

var gifnombre = new fabric.IText('gifnombre', { id:'gifnombre',    left: {{$plantilla->gif_nombreleft}}, top: {{$plantilla->gif_nombretop}}, fill: "{{$plantilla->gif_nombrefontcolor}}", strokeWidth: "{{$plantilla->gif_nombrestrokewidth}}", fontSize: {{$plantilla->gif_nombrefontsize}}, fontFamily: "{{$plantilla->font2->nombre}}", stroke: "{{$plantilla->gif_nombrestrokecolor}}", lineHeight: 1, selectable: true, textAlign: 'center', centeredScaling: true, align: 'mid', originX: 'center', originY: 'center', hasControls: true, hasBorders: true,transparentCorners: false  });

var giffrase = new fabric.IText('giffrase', { id:'giffrase',    left: {{$plantilla->gif_fraseleft}}, top: {{$plantilla->gif_frasetop}}, fill: "{{$plantilla->gif_frasefontcolor}}", strokeWidth: "{{$plantilla->gif_frasestrokewidth}}", fontSize: {{$plantilla->gif_frasefontsize}}, fontFamily: "{{$plantilla->font2->nombre}}", stroke: "{{$plantilla->gif_frasestrokecolor}}",  lineHeight: 1, selectable: true, textAlign: 'center', centeredScaling: true, align: 'mid', originX: 'center', originY: 'center', hasControls: true, hasBorders: true,transparentCorners: false  });

canvasgif.add(gifnombre)
canvasgif.add(giffrase)
canvasgif.setActiveObject(gifnombre)
canvasgif.renderAll()

canvasgif.on('mouse:up', function(e){
    if(e.target.get('id')=='gifnombre'){
        document.getElementById("gif_nombretop").value = e.target.get('top').toFixed()
        document.getElementById("gif_nombreleft").value = e.target.get('left').toFixed()
    }
    if(e.target.get('id')=='giffrase'){
        document.getElementById("gif_frasetop").value = e.target.get('top').toFixed()
        document.getElementById("gif_fraseleft").value = e.target.get('left').toFixed()
    }
})

</script>
@endsection
