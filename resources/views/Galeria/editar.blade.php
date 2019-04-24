@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
            <div class="alert alert-{{session('status')}}">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{$variable}}</div>

                <div class="card-body">
                    <form method="POST" action="{{Route('galeria.actualizado', ['id' => $galeria->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select name="categoria" id="categoria" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}">
                                    <option value="{{$galeria->categoria_id}}" disabled>{{$galeria->categorias->titulo}}</option>
                                    @forelse($categorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->titulo}}</option>
                                    @empty
                                    <option value="0">Crea Alguna Categoria Primero</option>
                                    @endforelse
                                </select>

                                @if ($errors->has('categoria'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('categoria') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @if($galeria->imagen)
                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-6 avatar-config">
                                <img src="{{Route('galeria.imagen', ['filename'=>$galeria->imagen])}}" alt="imagen de {{$galeria->empresa}} en Ramsa Security" height="500"/>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            @if($galeria->imagen)
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Deseas Cambiarla?</label>
                            @else
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                            @endif
                            <div class="col-md-6">
                                <input type="hidden" name="user" value="{{$galeria->user_id}}">
                                <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen">

                                @if ($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" value="{{$galeria->titulo}}" name="titulo" required autofocus>

                                @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" value="{{$galeria->empresa}}" name="empresa" required autofocus>

                                @if ($errors->has('empresa'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('empresa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}">{{$galeria->descripcion}}</textarea>
                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modificar Imagen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
