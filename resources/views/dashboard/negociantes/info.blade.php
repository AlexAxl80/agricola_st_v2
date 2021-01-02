@extends('plantillaDashboard')
@section('name-page')
Perfil del negociante
@endsection
@section('dealer-item')
active
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('negociantes')}}">Negociantes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información</li>
    </ol>
</nav>
@endsection
@section('body')
<div class="card shadow">
    <div class="card-header">
        <h1 class="h3">Perfil del negociante</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <img src="{{asset('resources/img/undraw_businessman_97x4.svg')}}" alt="" class="img-thumbnail border-0"
                    style="width: 400px;">
            </div>
            <div class="col-lg-6 text-gray-900 mb-3">
                <div class="my-2">
                    <span class=""><i class="fas fa-id-card text-gray-500"></i> </span><span
                        class="font-weight-bold ">{{$read_neg->ci_neg}}</span>

                </div>
                <hr>
                <div class="my-2">
                    <span class="h2 text-capitalize">{{$read_neg->nombre_neg}} {{$read_neg->apellido_neg}}</span>
                    <span class="mx-2">
                        <a type="button" class="" data-toggle="modal" data-target="#editarNegociante"><i
                                class="far fa-edit"></i> Editar</a>
                    </span>
                </div>
                <hr>
                <div class="my-2">
                    @if($read_neg->direccion_neg)
                    <div class="mb-3">
                        <span class=""><i class="fas fa-map-marker-alt text-gray-500"></i> </span>
                        <span class="text-capitalize">{{$read_neg->direccion_neg}}</span>
                    </div>
                    @endif
                    @if($read_neg->correo_neg)
                    <div class="">
                        <span class=""><i class="fas fa-envelope text-gray-500"></i>
                        </span><span>{{$read_neg->correo_neg}}</span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="h3 text-center text-gray-800">Actividad</div>
                <div class="row">
                    <div class="col-6 border-right text-success">
                        <div class="h5">Compras</div>
                        <div class="h2">150</div>
                    </div>
                    <div class="col-6 text-primary">
                        <div class="h5">Ventas</div>
                        <div class="h2">150</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 my-3">
                        @if($read_neg->telefono_neg)
                        <a href="" class="btn bg-success text-white" style="font-size: 1.5rem;"><i
                                class="fab fa-whatsapp"></i> {{$read_neg->telefono_neg}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                @if(session('update_negociante'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Negociante actualizado!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <div class="row px-4 py-2">
            <div class="container p-0 text-center">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="h4 text-gray-600 text-uppercase"><i class="fas fa-history"></i> Historial</div>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm ">
                        <i class="fas fa-file-pdf"></i>
                        Descargar PDF
                    </a> -->
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped table-hover" id="tablaHistorial"
                    width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">COD</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" class="text-center w-75px"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td scope="row">1712957396</td>
                            <td>Sab. 15 de noviembre del 2020</td>
                            <td>Compra</td>
                            <td class="text-center w-75px">
                                <a href="" class="text-secondary">
                                    <i class="fas fa-eye"></i>
                                    <span class="d-none d-sm-inline">Ver</span>
                                </a>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="alert-danger px-4 py-2 rounded ">
            <div class="h4"><i class="fas fa-exclamation-triangle"></i> Precaución</div>
            <div class="row justify-content-end">
                <button type="button" class="btn btn-outline-danger shadow-sm" data-toggle="modal"
                    data-target="#eliminarNegociante"><i class="far fa-trash-alt"></i> Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<!-- Modal Editar -->
<div class="modal fade" id="editarNegociante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo negociante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('negociantes_update',$read_neg)}}" method="POST" autocomplete="off"> @CSRF
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">CI/ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('ci_neg'))is-invalid @endif"
                                    placeholder="Ej: 1705XXXXXX" name="ci_neg"
                                    value="@if($errors->has('ci_neg')){{old('ci_neg')}}@else{{$read_neg->ci_neg}}@endif"
                                    minlength="10" maxlength="13" required>
                                @if($errors->has('ci_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('ci_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Telefono</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @if($errors->has('telefono_neg'))is-invalid @endif"
                                    placeholder="Ej: 0987XXXXXX" name="telefono_neg"
                                    value="@if($errors->has('telefono_neg')){{old('telefono_neg')}}@else{{$read_neg->telefono_neg}}@endif"
                                    minlength="9" maxlength="13">
                                @if($errors->has('telefono_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('telefono_neg')}}
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Apellido</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @if($errors->has('apellido_neg'))is-invalid @endif"
                                    placeholder="Ej: Lee" name="apellido_neg"
                                    value="@if($errors->has('apellido_neg')){{old('apellido_neg')}}@else{{$read_neg->apellido_neg}}@endif"
                                    maxlength="50" required>
                                @if($errors->has('apellido_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('apellido_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control @if($errors->has('nombre_neg'))is-invalid @endif"
                                    placeholder="Ej: Steve" name="nombre_neg"
                                    value="@if($errors->has('nombre_neg')){{old('nombre_neg')}}@else{{$read_neg->nombre_neg}}@endif"
                                    maxlength="50" required>
                                @if($errors->has('nombre_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nombre_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Dirección</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @if($errors->has('direccion_neg'))is-invalid @endif"
                                    placeholder="Ej: Av.Principal y 10 de Agosto" name="direccion_neg"
                                    value="@if($errors->has('direccion_neg')){{old('direccion_neg')}}@else{{$read_neg->direccion_neg}}@endif"
                                    maxlength="150">
                                @if($errors->has('direccion_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('direccion_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="">Correo electronico</label>
                            <div class="input-group">
                                <input type="email"
                                    class="form-control @if($errors->has('correo_neg'))is-invalid @endif"
                                    placeholder="Ej: correo@gmail.com" name="correo_neg"
                                    value="@if($errors->has('correo_neg')){{old('correo_neg')}}@else{{$read_neg->correo_neg}}@endif"
                                    maxlength="60" required>
                                @if($errors->has('correo_neg'))
                                <div class="invalid-feedback">
                                    {{$errors->first('correo_neg')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="eliminarNegociante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar negociante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar este negociante?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{route('negociantes_delete',$read_neg)}}" method="POST">
                    @CSRF
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@if($errors->any())
<script>
$(document).ready(function() {
    $('#editarNegociante').modal('show');
});
</script>
@endif
@endsection