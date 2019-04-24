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
                    <form method="POST" action="{{route('contacto.actualizado', ['id' => $cliente->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $cliente->nombre }}" required autofocus>

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $cliente->email }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asunto" class="col-md-4 col-form-label text-md-right">Asunto</label>

                            <div class="col-md-6">
                                <input id="asunto" type="text" class="form-control{{ $errors->has('asunto') ? ' is-invalid' : '' }}" name="asunto" placeholder="http://" value="{{ $cliente->asunto }}" required autofocus>

                                @if ($errors->has('asunto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('asunto') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mensaje" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea name="mensaje" id="mensaje" class="form-control{{ $errors->has('mensaje') ? ' is-invalid' : '' }}">{{$cliente->mensaje}}</textarea>
                                @if ($errors->has('mensaje'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mensaje') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="respuesta" class="col-md-4 col-form-label text-md-right">Seguimiento</label>

                            <div class="col-md-6">
                                <textarea name="respuesta" id="respuesta" class="form-control{{ $errors->has('respuesta') ? ' is-invalid' : '' }}">{{$cliente->respuesta}}</textarea>
                                @if ($errors->has('respuesta'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('respuesta') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar Prospecto
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
