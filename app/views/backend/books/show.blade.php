@extends('backend.classified.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/magnific/magnific-popup.css') }}">    
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/datatables/dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/datatables/dataTables.tableTools.css') }}">
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/iconos.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/jnotify/jNotify.jquery.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/plugins/dropzone/dropzone.css') }}">

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
        <h3><img class="m-r-20" src="/backend/assets/img/various/clothing.png" alt="clothing" width="30px;"><small>{{ $product->getHumanDate() }}</small><br><br><strong>{{ $product->product }} </strong></h3>
        <br>

        @include('backend.layouts.alert')

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabcordion">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#product_general" data-toggle="tab">General</a></li>
                    <li><a href="#product_categories" data-toggle="tab">Categorias</a></li>
                    <li><a href="#product_images" data-toggle="tab">Imagenes</a></li>
                    <li><a href="#product_reviews" data-toggle="tab">Preguntas 
                        <span class="m-l-10 badge badge-primary"> {{ count($product->questions)}} </span></a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="product_general">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/panel/product/update/{{ $product->id }}" method="POST" id="product-update" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nombre del producto: <span class="asterisk">*</span>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="product" class="form-control" value="{{ $product->product }}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Precio: <span class="asterisk">*</span>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Descripción: <span class="asterisk">*</span>
                                        </label>
                                        <div class="col-sm-7">
                                            <textarea rows="6" name="description" class="form-control" placeholder="Ingrese una descripcion del producto...">{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label m-t-10">Estado <span class="asterisk">*</span>
                                        </label>
                                        <div class="col-sm-7">
                                            <div class="row">

                                                <div class="skin-section">
                                                    <div>
                                                        <label>
                                                            <input type="radio" value="online" name="status"
                                                            @if($product->status =='online') checked @endif>Activado
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" value="offline" name="status"
                                                            @if($product->status =='offline') checked @endif>Desactivado
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="radio" value="draft" name="status"
                                                            @if($product->status =='draft') checked @endif>Borrador
                                                        </label> 
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>  
                                    <input type="hidden" id="id" name="id" value="{{ $product->id }}">                          
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="product_categories">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Seleccione las categorías a la que refiera su producto:</p>
                                <div id="categorias">
                                    @foreach (Category::all() as $category) 
                                    <div class="form-group col-md-3">
                                        @if($product->hasCategory($category->id))
                                        <button type="button" data-id="{{ $category->id }}" class="btn btn-block btn-success"><i class="{{ $category->class }}"></i> {{ $category->category }}</button>
                                        @else 
                                        <button type="button" data-id="{{ $category->id }}" class="btn btn-block btn-default"><i class="{{ $category->class }}"></i> {{ $category->category }}</button>
                                        @endif
                                    </div>  
                                    @endforeach                                      
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="product_images">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 align="center">Arrastra las imagenes hasta aqui.</h3>
                                <div id="dropzone" class="dropzone"></div>
                            </div>




                            <div class="col-md-12">
    
                                <div class="gallery" id="MixItUp90E7C8">
                                    <div class="row">
                                        @foreach ($product->images()->classified()->get() as $key => $image)
                                        <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="1" style="display: block;">
                                            <div class="thumbnail">
                                                <div class="overlay">
                                                    <div class="thumbnail-actions">
                                                        <a href="{{ $image->getUrl() }}" class="btn btn-default btn-icon btn-rounded magnific" title="{{ $image->getName() }}"><i class="fa fa-search"></i></a>
                                                        <a href="#" data-id="{{ $image->id }}" class="btn btn-default btn-icon btn-rounded delete-img" title="Eliminar"><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                </div>
                                                <img src="{{ $image->getCroppa(200) }}" class="img-responsive" alt="animal1">
                                                <div class="thumbnail-meta">
                                                    <h5>{{ $image->getName() }}<br>
                                                        <small><i class="fa fa-clock-o"></i> {{ $image->getHumanDate() }}</small>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="product_reviews">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="product-review" cellpadding="0" cellspacing="0" border="0" class="table table-tools table-hover">
                                    <thead>
                                        <tr>
                                            <th style="min-width:70px"><strong>ID</strong></th>
                                            <th><strong>Fecha</strong></th>
                                            <th><strong>Usuario</strong></th>
                                            <th class="text-center"><strong>Estado</strong></th>
                                            <th class="text-center"><strong>Acciones</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->questions as $key => $question)
                                        <tr>
                                            <td>{{ $question->id }}</td>
                                            <td>{{ $question->getHumanDate() }}</td>
                                            <td>{{ $question->user->name }}</td>
                                            <td class="text-center">
                                                {{ $question->getStatus() }}
                                            </td>
                                            <td class="text-center"> 
                                                @if($question->isResponded())
                                                <a href="#" type="button" class="edit btn btn-sm btn-default view" data-question="{{ $question->question }}" data-answer="{{ $question->answer->answer }}" data-id="{{ $question->id }}"><i class="fa fa-reply"></i>Ver</a>
                                                @else
                                                <a href="#" type="button" class="edit btn btn-sm btn-default reply" data-question="{{ $question->question }}" data-id="{{ $question->id }}"><i class="fa fa-reply"></i>Ver y responder</a>
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 m-t-20 m-b-40 align-center">
            <a href="/panel/products" class="btn btn-default m-r-10 m-t-10"><i class="fa fa-reply"></i> Volver</a>
            <a href="/panel/product/delete/{{ $product->id }}" class="btn btn-danger delete-ad m-r-10 m-t-10"><i class="fa fa-times"></i> Eliminar publicación</a>
            <button class="btn btn-success m-t-10" id="submit-update"><i class="fa fa-check"></i> Guardar cambios</button>
        </div>
    </div>

    <div class="modal fade" id="modal-reply" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/panel/question/reply" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Responder pregunta</strong> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Pregunta</label>
                                    <p id="question-text"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Respuesta</label>
                                    <textarea name="answer" id="answer" cols="30" class="form-control" placeholder="Respuesta" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Responder</button>
                    </div>
                    <input type="hidden" name="question_id" id="question_id">
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Responder pregunta</strong> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Pregunta:</label>
                                    <p id="reply-question"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Respuesta:</label>
                                    <p id="reply-text"></p>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop

@section('javascript')

<script src="{{ asset('/backend/assets/plugins/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/datatables/dynamic/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/datatables/dataTables.tableTools.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/datatables/table.editable.js') }}"></script>
<script src="{{ asset('/backend/assets/js/table_dynamic.js') }}"></script>
<script src="{{ asset('/backend/assets/js/ecommerce.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/jnotify/jNotify.jquery.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/notifications.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/jnotify/jNotify.jquery.min.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/modal/js/classie.js') }}"></script>
<script src="{{ asset('/backend/assets/plugins/modal/js/modalEffects.js') }}"></script>

<script src="{{ asset('/backend/assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/handlebars-v1.3.0.js') }}"></script>

<script src="{{ asset('/backend/assets/js/product.show.js') }}"></script>

@include('backend.classified.partial.handlebar-templates.image-template');
<script>
$(document).on("ready", function() {
    var id = $("#id").val();
    var status = '';    
    

    /* handlebars */

    $("div#dropzone").dropzone({url: "/panel/product/"+ id +"/add/image"});

    

});
</script>

@stop