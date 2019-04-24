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
                    <form method="POST" action="{{route('testimonio.actualizado', ['id' => $testimonio->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $testimonio->nombre }}" required autofocus>

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" name="empresa" value="{{$testimonio->empresa }}" required autofocus>

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
                                <textarea name="descripcion" id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}">
                                    {{ trim($testimonio->descripcion) }}
                                </textarea>
                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">¿Que cargo Ostenta?</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" value="{{ $testimonio->cargo }}" required autofocus>

                                @if ($errors->has('cargo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cargo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Logotipo de la Empresa</label>

                            <div class="col-md-6">

                                <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen">

                                @if ($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url_empresa" class="col-md-4 col-form-label text-md-right">URL de la Empresa</label>

                            <div class="col-md-6">
                                <input id="url_empresa" type="url" class="form-control{{ $errors->has('url_empresa') ? ' is-invalid' : '' }}" name="url_empresa" placeholder="http://" value="{{ $testimonio->url_empresa }}" required autofocus>

                                @if ($errors->has('url_empresa'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_empresa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aprobar" class="col-md-4 col-form-label text-md-right">Aprobar Testimonio</label>

                            <div class="col-md-6">
                                <select name="aprobar" id="aprobar" class="form-control{{ $errors->has('aprobar') ? ' is-invalid' : '' }}"required>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                                @if ($errors->has('aprobar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('aprobar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Aprobar
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
