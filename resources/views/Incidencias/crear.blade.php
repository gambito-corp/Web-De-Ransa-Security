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
                    <form method="POST" action="{{route('incidencia.guardar')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="cliente_id" class="col-md-4 col-form-label text-md-right">Empresa</label>

                            <div class="col-md-6">

                                <select id="cliente_id" class="form-control{{ $errors->has('cliente_id') ? ' is-invalid' : '' }}" name="cliente_id"  required>
                                    <option value="{{ old('cliente_id') }}">{{ old('cliente_id') }}</option>
                                    @forelse($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @empty
                                    <option value="0">No Hay</option>
                                    @endforelse
                                </select>
                                @if ($errors->has('cliente_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cliente_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prioridad" class="col-md-4 col-form-label text-md-right">Prioridad</label>

                            <div class="col-md-6">

                                <select id="prioridad" class="form-control{{ $errors->has('prioridad') ? ' is-invalid' : '' }}" name="prioridad"  required>
                                    <option value="{{ old('prioridad') }}">{{ old('prioridad') }}</option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Alta</option>
                                </select>
                                @if ($errors->has('prioridad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prioridad') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" >{{ old('descripcion') }}</textarea>
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
                                    Crear Incidencia
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
