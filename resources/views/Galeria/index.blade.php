@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row">
        @forelse($galerias as $galeria)
        <div class="col-md-3 col-sm-6">
            <div class="tc-image-caption6">
                @if($galeria->imagen)
                <img src="{{Route('galeria.imagen', ['filename'=>$galeria->imagen])}}" alt="Imagen de {{$galeria->empresa}} en Ramsa Security" width="300"/>
                @endif
                <div class="caption">
                    <h3>{{$galeria->titulo}}</h3>
                    <p>{{$galeria->descripcion}}</p>
                </div>
                <div class="link-wrap">
                    <a href="#foto{{$galeria->id}}" data-toggle="modal" data-target="#foto{{$galeria->id}}"><i class="fa fa-search"></i></a>
                    
                </div>
            </div>
        </div>
        <div class="modal tc-modal fade" id="foto{{$galeria->id}}">
            <div class="modal-dialog">
                <div class="tc-image-caption6 modal-content">
                    <i class="fa fa-close close" data-dismiss="modal"></i>
                    @if($galeria->imagen)

                    <img src="{{Route('galeria.imagen', ['filename'=>$galeria->imagen])}}" alt="Imagen de {{$galeria->empresa}} en Ramsa Security" width="600"/>
                    @endif
                    <div class="caption">
                        <h3>{{$galeria->titulo}}</h3>
                        <p>{{$galeria->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3 col-sm-6">
            <div class="tc-image-caption6">
                <img src="{{asset('img/p6.jpg')}}" alt="imagen por default cuando esta vacia la tabla" width="300">
                <div class="caption">
                    <h3>No hay datos</h3>
                    <p>Suba una imagen a la web</p>
                </div>
                <div class="link-wrap">
                    <a href="#"><i class="fa fa-search"></i></a>
                    
                </div>
            </div>
        </div>

        @endforelse
    </div>
    <div class="clearfix"></div>
    {{$galerias->links()}}
</div>

@endsection
