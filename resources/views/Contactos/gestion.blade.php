
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
    <br>
    <table id="Contacto" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prospecto</th>
                <th>Email</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Seguimiento</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>

                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->asunto}}</td>
                <td>{{$cliente->mensaje}}</td>
                <td>{{$cliente->respuesta}}</td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('contacto.editar', ['id' => $cliente->id])}}" target="_self"><span>Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$cliente->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$cliente->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar el Prospecto {{$cliente->empresa}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        y no se puede recuperar,<br> no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('contacto.eliminar', ['id' =>$cliente->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
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
            </tr>
            @endForelse

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Prospecto</th>
                <th>Email</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Seguimiento</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Contacto').DataTable();
    });
</script>
@endsection
