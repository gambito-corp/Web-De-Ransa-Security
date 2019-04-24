
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
    <table id="Testimonio" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del creador</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Url Empresa</th>
                <th>Aprobado</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonios as $testimonio)
            <tr>
                <td>{{$testimonio->id}}</td>

                <td>{{$testimonio->nombre}}</td>
                <td>{{$testimonio->cargo}}</td>
                <td>{{$testimonio->empresa}}</td>
                <td>
                    @if($testimonio->imagen)
                    <img src="{{Route('testimonio.imagen', ['filename'=>$testimonio->imagen])}}" alt="Imagen de {{$testimonio->empresa}} en Ramsa Security" height="100"/>
                    @endif
                </td>
                <td>{{$testimonio->descripcion}}</td>
                <td>{{$testimonio->url_empresa}}</td>
                <td>{{$testimonio->aprobado}}</td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('testimonio.editar', ['id' => $testimonio->id])}}" target="_self"><span>Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$testimonio->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$testimonio->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar el Testimonio de {{$testimonio->empresa}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        y no se puede recuperar,<br> no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('testimonio.eliminar', ['id' =>$testimonio->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{$testimonio->created_at}}</td>
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
                <th>Nombre del creador</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Url Empresa</th>
                <th>Aprobado</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Testimonio').DataTable();
    });
</script>
@endsection
