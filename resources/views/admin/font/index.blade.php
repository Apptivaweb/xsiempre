@extends('layouts.admin')
@section('content')
<div class="container">    
        <div class="row">  
            @include('admin.aside')         
            <div class="col-10">
                <h1 class="lead bg-primary text-white p-3">FUENTES</h1>
                <a href="{{ route('font.create') }}" class="btn btn-success"> Crear</a>
                @if(count($fonts))
                    <table class="table table-striped">
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Urlfont</th>
                            <th>Accion</th>
                    </tr>
                        @foreach ($fonts as $r)
                        <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->nombre }}</td>
                        <td>{{ $r->urlfont }}</td>
                        <td>                                
                            <a class="btn btn-success" href="{{ route('font.edit',$r->id) }}">Editar</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['font.destroy', $r->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-success','onclick'=>'return confirm("SEGURO?")']) !!}
                            {!! Form::close() !!}
                    </td>
                    </tr>
                        @endforeach
                </table>                        
                    @else
                        <p>No hay fonts</p>
                    @endif


        </div>         
    </div>
</div>
@endsection
