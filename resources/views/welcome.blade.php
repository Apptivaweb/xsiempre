@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <p class="text-center text-danger display-3">XSIEMPRE <span class="text-success">JUNTOS</span></p>
            <h1 class="text-center mt-5 mb-2">Gifs de Parejas de Amor</h1>
            <!-- buscador-->
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h2 class="text-center h4">Buscador de GIFs para parejas</h2>
                </div>
                <div class="card-body">
                    <p class="text-center">Prueba el buscador de Imágenes de gifs de amor para San Valentin personalizadas con nombres. Busca el nombre de tu amor y el tuyo para encontrar GIFs con diseños personalizados con sus nombres</p>
                    <input type="search" id="buscarnombre" class="form-control" maxlength="18" minlength="3" required placeholder="Ej.: Luis y Maria">
                    <div id="resultado" class="shadow"></div>
                </div>
            </div>
            <!--buscador/-->
            <!-- PAREJAS MAS POPULARES-->
            <h2 class="text-center mt-5 mb-2 h4">Imágenes GIFs de parejas enamoradas</h2>
            @php
                $x=1;
            @endphp
            @foreach ($m as $_)            
                @foreach ($f as $__)
                    @if ($loop->iteration == $x)
                        <a href="/">{{$_->nombre." y ".$__->nombre}}</a> <br>
                        @php
                            echo $x++;
                            $loop->iteration+1;
                        @endphp
                    @endif                
                @endforeach
            @endforeach


            <!-- PAREJAS MAS POPULARES //-->
           
            <h2 class="text-center mt-5 mb-2 h4">Imágenes GIFs de parejas enamoradas</h2>
            <p>Gifs de enamorados más lindos que están en tendencia en el internet en las redes sociales para buscar y compartir con tu media naranja por siempre.</p>
            <p>Imágenes en movimiento personalizadas con el nombre de tu media naranja y tu nombre, con una frase de amor adecuada para compartir en tu Facebook o WhatsApp</p>
            
            <ul>
                @foreach ($generados as $item)
                <li><a href="/{{$item->nombre1->slug."-y-".$item->nombre2->slug."/".$item->plantilla->slug}}" class="text-decoration-none">{{$item->nombre}}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
</div>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    function orderPost(_texto) {
            fetch('/parejas/ajaxbusca', {
                method: 'post',
                body: JSON.stringify({ texto : _texto}),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            })
            .then(response => {
                return response.json()
            })
            .then(data => {
                console.log(data)
                if(data.success){                  
                  var html="";                  
                  for(datos in data.parejas){
                    html+='<p class="border-bottom p-2"><a class="text-white text-decoration-none" href="/'+slug(data.parejas[datos])+'"><span class="text-danger">'+data.parejas[datos]+'</span></a></p>'
                  }
                  
                  resultado.innerHTML =  html
                }else{
                  //resultado.innerHTML =  "No hay resultados"
                }            
            })
            .catch(error => console.error(error));
        };
        document.getElementById('buscarnombre').addEventListener('keyup', (e)=>{            
            var texto = buscarnombre.value        
            if(texto.length>1){            
                orderPost(texto);
            }
        })
    
    function slug(text) {
            var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
            var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
            var p = new RegExp(a.split('').join('|'), 'g');
            return text.toString().toLowerCase().replace(/\s+/g, '-')
                .replace(p, function (c) {
                    return b.charAt(a.indexOf(c));
                })
                .replace(/&/g, '-y-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
    }
    </script>
@endsection
