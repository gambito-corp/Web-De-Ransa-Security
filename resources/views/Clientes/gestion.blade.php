
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
    <br><br>
    <a href="{{ route('cliente.crear') }}" class="tcb-small tcb-basic-d tcb-success">Crear Cliente</a>
    <br>
    <table id="Cliente" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del creador</th>
                <th>Empresa</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Imagen</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>

                <td>{{$cliente->users->name. ' '.$cliente->users->surname}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->cargo}}</td>
                <td>
                    @if($cliente->imagen)
                    <img src="{{Route('cliente.imagen', ['filename'=>$cliente->imagen])}}" alt="Imagen de {{$cliente->empresa}} en Ramsa Security" height="100"/>
                    @endif
                </td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('cliente.editar', ['id' => $cliente->id])}}" target="_self"><span>Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$cliente->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$cliente->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar el cliente  {{$cliente->empresa}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        y no se puede recuperar,<br> no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('cliente.eliminar', ['id' =>$cliente->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{$cliente->created_at}}</td>
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
            </tr>
            @endForelse

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre del creador</th>
                <th>Empresa</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Imagen</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Cliente').DataTable();
    });
</script>
@endsection
