@extends('backend.classified.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/wizard/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/jquery-steps/jquery.steps.css') }}">

<link href="{{ asset('/backend/assets/plugins/datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('/backend/assets/plugins/pickadate/themes/default.css') }}" rel="stylesheet">
<link href="{{ asset('/backend/assets/plugins/pickadate/themes/default.date.css') }}" rel="stylesheet">
<link href="{{ asset('/backend/assets/plugins/pickadate/themes/default.time.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/iconos.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/dropzone/dropzone.css') }}">
<style>
[class^="icon-"], [class*=" icon-"] {
    font-size: 30px; 
}

div#dropzone{    
    text-align: center;
    border: 2px dashed #555;
    height: 350px;
}
div#dropzone:hover{
    background-color: #ddd;
}
</style>
@stop

@section('content')

<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><strong>Nuevo</strong> producto</h3>
                            <p>Completa el siguiente formulario:</p>
                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard" action="/panel/product/add" method="POST">
                                <h1>Categorias</h1>
                                <section>
                                    <p>Seleccione las categorías a la que refiera su producto:</p>
                                    <div id="categorias">
                                        @foreach ($categories as $category) 
                                        <div class="form-group col-md-3">
                                            <button type="button" data-id="{{ $category->id }}" class="btn btn-block btn-default"><i class="{{ $category->class }}"></i> {{ $category->category }}</button>
                                        </div>  
                                        @endforeach                                      
                                    </div>

                                    <input type="hidden" name="categories" id="hcat">
                                    
                                </section>
                                <h1>Datos</h1>
                                <section>
                                    <div class="form-group">
                                        <label for="product">Nombre del producto *</label>
                                        <input id="product" name="product" type="text" class="form-control required" minlength="4">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Precio *</label>
                                        <input id="price" name="price" type="text" class="form-control required number">
                                    </div>

                                    <div class="form-group">
                                        <label for="condition">Condición *</label>
                                        <fieldset data-role="controlgroup" data-type="horizontal" class="fselect">

                                            <input type="radio" name="condition" id="new" value="new">
                                            <label for="new">Nuevo</label>

                                            <input type="radio" name="condition" id="used" value="used">
                                            <label for="used">Usado</label>

                                            <input type="radio" name="condition" id="none" value="none">
                                            <label for="none">No aplica</label>

                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Descripción *</label>
                                        <textarea name="description" rows="5" class="form-control required" minlength="10" placeholder=""></textarea>
                                    </div>                                   

                                    <p>(*) Obligatorio</p>
                                </section>
                                <h1>Imagenes</h1>
                                <section>
                                    <div class="col-md-12">
                                        <h3 align="center">Arrastra las imagenes hasta aqui.</h3>
                                        <div id="dropzone" class="dropzone"></div>
                                    </div>
                                </section>
                                
                            </form>
                            <!-- END FORM WIZARD WITH VALIDATION -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')

<script type="text/javascript" src="{{ asset('/backend/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/backend/assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/wizard/wizard.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/handlebars-v1.3.0.js') }}"></script>

@include('backend.classified.partial.handlebar-templates.image-template');

<script>
$(document).on("ready", function(){
    window.sabueso = {};
    window.sabueso.categories = [];
    window.sabueso.images = [];    

    $("#new").attr('checked', true);

    /****  Inline Form Wizard with Validation  ****/
    $(".form-wizard").steps({
        bodyTag: "section",
        onStepChanging: function (event, currentIndex, newIndex) {
            // Always allow going backward even if the current step contains invalid fields!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid suppressing "Warning" step if the user is to young
            if (newIndex === 1 && window.sabueso.categories == 0) {
                return false;
            }else{
                $("#hcat").val(window.sabueso.categories.join());                
            }
            var form = $(this);
            // Clean up if user went backward before
            if (currentIndex < newIndex) {
                // To remove error styles
                $(".body:eq(" + newIndex + ") label.error", form).remove();
                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
            }
            // Disable validation on fields that are disabled or hidden.
            form.validate().settings.ignore = ":disabled,:hidden";
            // Start validation; Prevent going forward if false
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                $(this).steps("next");
            }
            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                $(this).steps("previous");
            }
        },
        onFinishing: function (event, currentIndex) {
            var form = $(this);
            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            var form = $(this);
            // Submit form input
            form.submit();
        }
    }).validate({
        errorPlacement: function (error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });

    /* handlebars */
    var source   = $("#image-template").html();
    var template = Handlebars.compile(source);
    /* dz */

    $("div#dropzone").dropzone({
        url: "/panel/product/add/image",
        init : function() {
           $.post('/panel/product/images', function(data, textStatus, xhr) {
               var d = $.parseJSON(data);
               $.each(d.images, function(index, val) {
                    var html = template({image: val});
                    $("#dropzone").append(html);
               });
           });
        }
    });

    /* ----------- */

    $("#categorias button").on("click", function(){
        var b = $(this);
        if(b.hasClass('btn-default')){
            b.removeClass('btn-default');
            b.addClass('btn-success');
            window.sabueso.categories.push(b.data('id'));
        }else{
            b.removeClass('btn-success');
            b.addClass('btn-default');
            window.sabueso.categories.pop(b.data('id'));
        }      
        
    });

})




</script>

@stop








