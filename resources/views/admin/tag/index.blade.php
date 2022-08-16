@extends('layouts.admin')
@section('content')
<div class="container">    
    <div class="row">
            @include('admin.aside')
            <div class="col-sm-10">
                <a href="{{route('tag.create')}}" class="btn btn-info"> Crear</a>
                <table class="table table-striped">
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>                         
                        <th>Accion</th>
                    </tr>            
                    @foreach ($tags as $key => $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nombre }} </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('tag.edit',$p->id) }}">Editar</a>

                            {!! Form::open(['method' => 'DELETE','route' => ['tag.destroy', $p->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger','onclick'=>'return confirm("SEGURO DE ELIMINAR TAG")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
</div>
@endsection