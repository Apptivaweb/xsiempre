@extends('layouts.admin')
@section('content')
<div class="container">    
    <div class="row">
            @include('admin.aside')
            <div class="col-sm-10">
                <a href="{{route('plantilla.create')}}" class="btn btn-info"> Crear</a>
                <table class="table table-striped">
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th> 
                        <th>publicado</th>                        
                        <th>Accion</th>
                    </tr>            
                    @foreach ($plantillas as $key => $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nombre }} </td>
                        <td>{{ $p->publicado ? $p->publicado." PUBLICADO " : $p->publicado."NO PUBLICADO"}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('plantilla.edit',$p->id) }}">Editar</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['plantilla.destroy', $p->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger','onclick'=>'return confirm("SEGURO DE ELIMINAR PLANTILLA")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
</div>
@endsection