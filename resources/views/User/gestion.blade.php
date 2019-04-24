
@extends('layouts.app')

@section('contenido')
<h1>{{$variable}}</h1>
<br>
<div class="container-fluid">
    @if(session('message'))
    <div class="alert alert-{{session('status')}}">
        {{session('message')}}
    </div>
    @endif
    <br>
    <a href="{{ route('register') }}" class="tcb-small tcb-basic-d tcb-success">Crear Usuario</a>
    <br>
    <br>
    <table id="Usuarios" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Imagen</th>
                <th>Telefono</th>
                <th>Empresa</th>
                <th>E-mail</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>
                    @if($user->imagen)
                    <img src="{{Route('user.imagen', ['filename'=>$user->imagen])}}" alt="Avatar de {{$user->name}} en Ramsa Security" height="40"/>
                    @endif
                </td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->empresa}}</td>
                <td>{{$user->email}}</td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('usuarios.editar', ['id' =>$user->id])}}" target="_self"><span><i class="icon-eye-open"></i> Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$user->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$user->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar a {{$user->name.' '.$user->surname}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        <br> y no se puede recuperar, no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('user.eliminar', ['id' =>$user->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{$user->created_at}}</td>
            </tr>
            @empty
            <tr>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
            </tr>
            @endForelse

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Imagen</th>
                <th>Telefono</th>
                <th>Empresa</th>
                <th>E-mail</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Usuarios').DataTable();
    });
</script>
@endsection
