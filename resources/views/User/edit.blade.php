@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$variable}}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('usuarios.actualizar')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    <option value="{{$user->role}}">{{$user->role}}</option>
                                    <option value="User">User</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Administrador">Administrador</option>
                                </select>

                                @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{$user->surname }}" required>

                                @if ($errors->has('surname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $user->telefono }}" required>

                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" name="empresa" value="{{ $user->empresa }}" required>

                                @if ($errors->has('empresa'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('empresa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        @if($user->imagen)
                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Tu Avatar</label>
                            <div class="col-md-6 avatar-config">
                                <img src="{{Route('user.imagen', ['filename'=>$user->imagen])}}" alt="Avatar de {{$user->name}} en Ramsa Security"/>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            @if($user->imagen)
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Deseas Cambiarlo?</label>
                            @else
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Avatar</label>
                            @endif
                            <div class="col-md-6">

                                <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen">

                                @if ($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modificar Usuario
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
