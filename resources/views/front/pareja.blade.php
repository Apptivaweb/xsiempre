@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                @foreach ($plantillas as $p)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="/{{$m->slug}}-y-{{$f->slug}}/{{$p->slug}}"><img src="/gif/{{$p->gif}}" alt="" class="img-fluid"></a>
                        </div>
                    </div> 
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
