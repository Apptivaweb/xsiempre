@extends('layouts.admin')
@section('content')
<div class="container">    
    <div class="row">
            @include('admin.aside')
            <div class="col-sm-10">
                <a href="{{route('nombre.create')}}" class="btn btn-info"> Crear</a>
                <table class="table table-striped">
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th> 
                        <th>publicado</th>
                        <th>Sexo</th>
                        <th>Accion</th>
                    </tr>            
                    @foreach ($nombres as $key => $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nombre }} </td>
                        <td>{{ $p->publicado ? $p->publicado." PUBLICADO " : $p->publicado."NO PUBLICADO"}}</td>
                        <td>{!! !$p->sexo ? " <span class='text-danger'>FEMENINO</span> " : "<span class='text-primary'>MASCULINO </span>" !!}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('nombre.edit',$p->id) }}">Editar</a>

                            {!! Form::open(['method' => 'DELETE','route' => ['nombre.destroy', $p->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger','onclick'=>'return confirm("SEGURO DE ELIMINAR GIFGENERADO")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
</div>
@endsection