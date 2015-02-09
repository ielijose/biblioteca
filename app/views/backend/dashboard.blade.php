@extends('backend.layouts.master')

@section('css')
<link href="/assets/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.date.css" rel="stylesheet">
<link href="/assets/plugins/pickadate/themes/default.time.css" rel="stylesheet">
@endsection

@section('content')

<div id="main-content" class="dashboard">
    <div class="row m-b-40 m-t-10">
                <div class="col-md-12">
                    <div class="tabcordion">
                        <ul id="myTab" class="nav nav-tabs nav-dark">
                            <li class="active"><a href="#products" data-toggle="tab">Top Selling</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="products">
                               <div class="row p-20">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                    <table id="products-table" class="table table-tools table-hover">
                                        <thead>
                                            <tr>
                                                <th style="min-width:70px"><strong>ID</strong>
                                                </th><th><strong>Product</strong>
                                                </th>
                                                <th><strong>Category</strong>
                                                </th>
                                                <th><strong>Price</strong>
                                                </th>
                                                <th><strong>Sales this Month</strong>
                                                </th>
                                                <th><strong>Sales Variation</strong>
                                                </th>
                                                <th class="text-center"><strong>Sales</strong>
                                                </th>
                                                <th class="text-center"><strong>Status</strong>
                                                </th>
                                                <th class="text-center"><strong>Actions</strong>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product 1</td>
                                                <td>Women / Underwear</td>
                                                <td><strong>$25.20</strong></td>
                                                <td>123</td>
                                                <td class="c-green"><strong>+26%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#7BB2B4" data-sparkline-value="[13,14,16,15,4,14,20,14,12,16,11,17,19,16]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center "> 
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product 2 <span class="label bg-red">Low Stock</span>
                                                </td>
                                                <td>Menu / Shoes</td>
                                                <td><strong>$22.55</strong></td>
                                                <td>112</td>
                                                <td class="c-green"><strong>+11%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#c3a8db" data-sparkline-value="[14,17,16,12,15,16,22,15,14,17,11,18,11,12]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center ">
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product 3</td>
                                                <td>Women / Underwear</td>
                                                <td><strong>$21.00</strong></td>
                                                <td>97</td>
                                                <td class="c-red"><strong>-8%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#8dae24" data-sparkline-value="[18,14,15,14,13,12,21,16,18,14,12,15,17,19]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center ">
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Product 4</td>
                                                <td>Women / Underwear</td>
                                                <td><strong>$34.25</strong></td>
                                                <td>85</td>
                                                <td class="c-green"><strong>+38%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#7BB2B4" data-sparkline-value="[18,10,11,14,4,14,20,14,18,11,10,15,19,16]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center "> 
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Product 5</td>
                                                <td>Menu / Shoes</td>
                                                <td><strong>$42.78</strong></td>
                                                <td>72</td>
                                                <td class="c-red"><strong>-6%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#c3a8db" data-sparkline-value="[8,12,16,12,11,16,22,15,14,17,10,13,11,16]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center ">
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Product 6</td>
                                                <td>Women / Underwear</td>
                                                <td><strong>$21.00</strong></td>
                                                <td>62</td>
                                                <td class="c-green"><strong>+47%</strong></td>
                                                <td class="text-center">
                                                    <div class="sparkline" data-sparkline-color="#8dae24" data-sparkline-value="[18,14,15,14,13,12,21,16,18,14,12,15,17,19]"><canvas width="96" height="20" style="display: inline-block; vertical-align: top; width: 96px; height: 20px;"></canvas></div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300">Online</span>
                                                </td>
                                                <td class="text-center ">
                                                    <a href="ecommerce_product_view.html" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#" class="delete btn btn-sm btn-default"><i class="fa fa-times-circle"></i> Remove</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>


    @if(isset($data))
    <div class="row">
        <div class="col-md-12">

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-dark">
                        <div class="icon"><i class="fa fa-archive"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['total'] }}</div>
                                <a href="/customer"><h3>Clientes</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-blue">
                        <div class="icon"><i class="fa fa-question"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['prospecto'] }}</div>
                                <a href="/customer?estado=prospecto"><h3>Prospectos</h3></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-green">
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['asignado'] }}</div>
                                <a href="/customer?estado=asignado"><h3>Asignados</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-red">
                        <div class="icon"><i class="fa fa-envelope"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['negociacion'] }}</div>
                                <a href="/customer?estado=negociacion"><h3>Negociación</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-orange">
                        <div class="icon"><i class="fa fa-money"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['interesado'] }}</div>
                                <a href="/customer?estado=interesado"><h3>Interesados</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="panel no-bd bd-9 panel-stat">
                    <div class="panel-body bg-purple">
                        <div class="icon"><i class="fa fa-legal"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stat-num">{{ $data['compro'] }}</div>
                                <a href="/customer?estado=compro"><h3>Compró</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                            <h2>Hola {{ Auth::user()->name() }}! Bienvenido al BackOffice de MLMfunnels.</h2>
                        </div>                  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="graph-wrapper">
                                <div class="graph-info p-r-10">
                                    <a href="javascript:void(0)" class="btn bg-green">Correos</a>
                                    <a href="javascript:void(0)" class="btn bg-blue">Visitas</a>

                                    <a href="javascript:void(0)" class="btn bg-purple filter">Filtrar</a> 
                                    <button href="#" id="bars" class="btn" disabled>
                                        <span></span>
                                    </button>
                                    <button href="#" id="lines" class="btn active" disabled>
                                        <span></span>
                                    </button>
                                </div>
                                <div class="h-300">
                                    <div class="h-300" id="graph-lines" style="width: 100%"></div>
                                    <div class="h-300" id="graph-bars" style="width: 100%"></div>
                                </div>
                            </div>

                            <input type="hidden" id="start" value="{{ Input::get('start') }}">
                            <input type="hidden" id="end" value="{{ Input::get('end') }}">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{--<div class="row">        
        <div class="col-lg-12 m-b-20">
            <div class="modal fade" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                <strong>Manage</strong> my events
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event">Create
                                event</button>
                            <button type="button" class="btn btn-danger delete-event"
                                data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div id="external-events" class="bg-white row m-0">
                <div class="col-md-4 p-0">
                    <div class="widget bg-gray-l">
                        <div class="widget-body p-b-0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2 class="panel-title width-100p c-blue w-500 f-20 carrois"
                                        id="calender-current-day">Events Manager</h2>
                                    <div id='external-events'>
                                        <br> <br> <br>
                                        <div class="external-event bg-green" data-class="bg-green"
                                            style="position: relative;">
                                            <i class="fa fa-move"></i>Sport
                                        </div>
                                        <div class="external-event bg-purple" data-class="bg-purple"
                                            style="position: relative;">
                                            <i class="fa fa-move"></i>Meeting
                                        </div>
                                        <div class="external-event bg-red" data-class="bg-red"
                                            style="position: relative;">
                                            <i class="fa fa-move"></i>Work
                                        </div>
                                        <div class="external-event bg-blue" data-class="bg-blue"
                                            style="position: relative;">
                                            <i class="fa fa-move"></i>Children
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1 p-0 no-bd">
                    <div class="widget bg-white">
                        <div class="widget-body p-b-0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</div>


<div class="modal" id="modal-filter">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Filtrar notificaciones</strong> </h4>
                </div>
                <div class="modal-body ">   

                <div class="row">
                    <div class="col-md-6" align="center">
                        <h3>Desde:</h3>
                        <div class="datepicker start" data-inline="true" data-date-format="yyyy-mm-dd"></div>
                    </div>

                    <div class="col-md-6" align="center">
                        <h3>Hasta:</h3>
                        <div class="datepicker end" data-inline="true" data-date-format="yyyy-mm-dd"></div>
                    </div>                    
                </div> 

                </div>        
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="filter-action">Filtrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('assets/plugins/metrojs/metrojs.min.js') }}"></script>
<script src="{{ asset('assets/plugins/google-maps/markerclusterer.js') }}"></script>
<script src="{{ asset('assets/plugins/charts-flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/charts-flot/jquery.flot.animator.min.js') }}"></script>
<script src="{{ asset('assets/plugins/charts-flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/plugins/charts-flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('assets/plugins/charts-morris/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.angular.js') }}"></script>


<script src="{{ asset('assets/plugins/datetimepicker/jquery.datetimepicker.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('assets/plugins/pickadate/picker.js')}}"></script>
<script src="{{ asset('assets/plugins/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('assets/plugins/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js')}}"></script>

<script>
$(document).on("ready", function(){
    /* Filtrado */
    $("#modal-filter").modal();
    $("#modal-filter").modal('hide');

    $(".filter").on("click", function(){
        $("#modal-filter").modal();
    });


    $('#filter-action').on('click', function (e) {
        var d = new Date();
        var defaultDate = d.getFullYear() +"-"+ ('0' + (d.getMonth()+1)).slice(-2) +"-"+ ('0' + d.getDate()).slice(-2);
        var start = $('.start').data('date') || defaultDate;
        var end = $('.end').data('date') || defaultDate;
        location.href = "?start="+start+"&end="+end;
    })
});
</script>
@stop

