@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.tableTools.css') }}">
    
@stop

@section('content')

<div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Estudiantes</strong></h3>

                @include('backend.layouts.alert')
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-blue">
                            <h3 class="panel-title"><strong>Listado</strong> de estudiantes</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">

                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>CI</th>                                                
                                                <th>Télefono</th>
                                                <th>Prestamos</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $key => $student)      
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->ci }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td class="text-center">{{ $student->rents() }}</td>
                                               <td><a href="/estudiantes/{{ $student->id }}" class="btn btn-info">Ver mas</a></td>
                                            </tr>
                                            @endforeach                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-green">
                            <h3 class="panel-title"><strong>Nuevo</strong> estudiante</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <form action="/estudiantes" method="post" id="student" class="form-horizontal" data-parsley-validate>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nombre:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">CI:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="ci" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Sección:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="section" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Genero:</label>
                                            <div class="col-sm-9">
                                                <select name="gender" id="">
                                                    <option value="male">Masculino</option>
                                                    <option value="female">Femenino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Dirección:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Télefono:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Correo:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" data-parsley-minlength="1" class="form-control" required>
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary m-b-10">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop

@section('javascript')
    <script src="{{ asset('/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables/table.editable.js') }}"></script>
    <script src="{{ asset('/assets/js/table_dynamic.js') }}"></script>
@stop