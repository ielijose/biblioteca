@extends('backend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/magnific/magnific-popup.css') }}">    
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables/dataTables.tableTools.css') }}">
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/iconos.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/jnotify/jNotify.jquery.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/dropzone/dropzone.css') }}">

<style>
[class^="icon-"], [class*=" icon-"] {
    font-size: 30px; 
}
</style>
@stop

@section('content')
<div id="main-content">
    <div class="page-title">
        <i class="icon-custom-left"></i>
        <h3>{{ $book->name }}</h3>
        <br>

        @include('backend.layouts.alert')

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabcordion">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#general" data-toggle="tab">Datos</a></li>
                   
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="general">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/libros/update/{{ $book->id }}" method="POST" id="book-update" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Título:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="name" class="form-control" value="{{ $book->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Autor:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="author" class="form-control" value="{{ $book->author }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Código:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="code" class="form-control" value="{{ $book->code }}">
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
    <div class="row">
        <div class="col-md-12 m-t-20 m-b-40 align-center">
            <a href="/libros" class="btn btn-default m-r-10 m-t-10"><i class="fa fa-reply"></i> Volver</a>
            <a href="/libros/delete/{{ $book->id }}" class="btn btn-danger delete-ad m-r-10 m-t-10"><i class="fa fa-times"></i> Eliminar libro</a>
             <button class="btn btn-success m-t-10" id="submit-update"><i class="fa fa-check"></i> Guardar cambios</button>
        </div>
    </div>

   

</div>

@stop

@section('javascript')

<script src="{{ asset('/assets/plugins/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
<script src="{{ asset('/assets/js/ecommerce.js') }}"></script>

<script>
"use strict";
(function(){

    var id = $("#id").val();
    var status = '';

    $(".delete-ad").on('click', function(event) {
        event.preventDefault();

        if (confirm("Desea eliminar el libro? \nNo se puede revertir.")) {
            location.href = $(this).attr('href');
        }
    });

    $("#submit-update").on("click", function() {
        $("#book-update").submit();
    });

})();
</script>

@stop