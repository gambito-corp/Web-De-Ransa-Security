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
                <div class="card-header">{{$variable.$categoria->titulo}}</div>

                <div class="card-body">
                    <form method="post" action="{{route('categoria.actualizado', ['id' => $categoria->id])}}">
                        @csrf

                        <div class="form-group row">
                            <input type="hidden" name='id' value="{{$categoria->id}}">
                            <input type="hidden" name='user_id' value="{{$categoria->user_id}}">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{$categoria->titulo}}" required autofocus>

                                @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar Categoria
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
