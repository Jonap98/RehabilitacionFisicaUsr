@section('clases')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <!--begin::Page Custom Styles(used by providers page)-->
    <link href="{{ asset('assets/css/pages/wizard/wizard-1.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.19/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@extends('master')

@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rutina</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Ingresa los datos y después da clic en enviar</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body p-0">
                    <div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
                        <div class="kt-grid__item">
                            <!--begin::Wizard Nav-->
                            <div class="wizard-nav border-bottom">
                                <div class="wizard-steps p-8 p-lg-10">
                                    <!--begin::Detalles generales-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <h3 class="wizard-title"><strong>Programar rutina</strong></h3>
                                    </div>                                  
                                </div>
                            </div>
                            <!--end::Wizard Nav-->
                        </div>
                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <div id="app">
                                    <!--begin::Form Wizard-->
                                <form class="form" action="{{ $action }}" method="post">
                                        {{ csrf_field() }}
                                        <div id="main">
                                            <!--Pasos-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">    
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <br>
                                                        {{--<div class="form-group row">
                                                            @foreach ($users as $usr)
                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Usuario</label>
                                                                <h3 class="font-weight-bold col-form-label text-right col-lg-3 col-sm-12"><strong>{{$usr->name}} {{$usr->paterno}}</strong></h3>
                                                            @endforeach
                                                            <div class="col-lg-6">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Multiple Select</label>
                                                            <select class="selectpicker" multiple>
                                                                <option>Mustard</option>
                                                                <option>Ketchup</option>
                                                                <option>Relish</option>
                                                              </select>
                                                              
                                                        </div>--}}
                                                        {{--
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha</label>
                                                            <div class="col-lg-6">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Dropdown button
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        --}}
                                                        {{--<div class="form-group row">
                                                            <table border="1" class="table" id="tablaprueba">
                                                                <thead class="">
                                                                  <tr>
                                                                    <th>ID</th>
                                                                    <th>Nombres</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <td>
                                                                        holis
                                                                    </td>
                                                                    <td></td>
                                                                </tbody>
                                                              </table>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>
                                                            <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
                                                          </div>
                                                          --}}
                                                        <div class="form-group row">
                                                            @foreach ($users as $usr)
                                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Usuario</label>
                                                        <h3 class="font-weight-bold col-form-label text-right col-lg-3 col-sm-12"><strong>{{$usr->name}} {{$usr->paterno}} {{$usr->materno}}</strong></h3>
                                                            @endforeach
                                                            <div class="col-lg-6">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Ejercicio</label>
                                                            <div class="col-lg-6">
                                                            <select class="form-control" id="id_exercise" name="id_exercise">
                                                                <option value="">Selecciona el ejercicio</option> 
                                                                @foreach ($exercises as $ex)
                                                                    <option value="{{$ex->id}}">{{$ex->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-gorup row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="demo" name="date_range" value="" />
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha inicial</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                                <div class="input-group date">
                                                                    <input type="date" class="form-control" id="initial_date"  placeholder="Select date" />
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha final</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                                <div class="input-group date">
                                                                    <input type="date" class="form-control" id="end_date"  placeholder="Select date" />
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button @click.prevent="postForm" :disabled="submitted" class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                        <i class="fa fa-spinner fa-pulse fa-fw" v-if="submitted"></i>  
                                                        {{"Cancelar"}} 
                                                    </button>
                                                    <button type="submit"  class="btn btn-success font-weight-bold text-uppercase px-9 py-4">
                                                        <i class="fa fa-spinner fa-pulse fa-fw" v-if="submitted"></i>  
                                                        {{"Enviar"}} 
                                                    </button>
                                                </div>
                                                
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
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function agregarFila(){
    document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td></td><td></td>';
    }

    function eliminarFila(){
    var table = document.getElementById("tablaprueba");
    var rowCount = table.rows.length;
    //console.log(rowCount);
    
    if(rowCount <= 1)
        alert('No se puede eliminar el encabezado');
    else
        table.deleteRow(rowCount -1);
    }
    </script>
    <script>
  
        $(document).ready(function () {
            $('.selectPickerLive').selectpicker();
        })

        axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        Vue.component('employee', {
            template: '#employee',
            props: ['id', 'employee', 'add', 'remove'],
            data: function () {
                return {}
            }
        })
        d = moment().format('L');
    </script>
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/datatables/basic/headers-r-solicitudes.js?v=7.0.4')}}"></script>
    <!--begin::Page Scripts(used by providers page)-->
    <script src="{{asset('assets/js/pages/widgets.js?v=7.0.4')}}"></script>
    <!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.4')}}"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js?v=7.0.4')}}"></script>
        <!--end::Page Scripts-->
        <!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.4')}}"></script>
        <!--end::Page Scripts-->
        <script src="{{asset('assets/js/daterangepicker.js')}}"></script>
        <script>
            $(document).ready(function() {
            $('.mdb-select').materialSelect();
            });
                    </script>
            <script src="{{asset('assets/js/moment.min.js')}}"></script>
                    <script>
                        $('#demo').daterangepicker({
                "startDate": "11/05/2020",
                "endDate": "11/11/2020"
            }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });
                        $(function () {
                $('#date_range').daterangepicker({
                    "locale": {
                        "format": "YYYY-MM-DD",
                        "separator": " - ",
                        "applyLabel": "Guardar",
                        "cancelLabel": "Cancelar",
                        "fromLabel": "Desde",
                        "toLabel": "Hasta",
                        "customRangeLabel": "Personalizar",
                        "daysOfWeek": [
                            "Do",
                            "Lu",
                            "Ma",
                            "Mi",
                            "Ju",
                            "Vi",
                            "Sa"
                        ],
                        "monthNames": [
                            "Enero",
                            "Febrero",
                            "Marzo",
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Setiembre",
                            "Octubre",
                            "Noviembre",
                            "Diciembre"
                        ],
                        "firstDay": 1
                    },
                    "startDate": "2016-01-01",
                    "endDate": "2016-01-07",
                    "opens": "center"
                });
            });
        </script>
        <!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js?v=7.0.4')}}"></script>
		<!--end::Page Scripts-->
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
       
        $(document).ready(function () {
            $('.selectPickerLive').selectpicker();
        })
    </script>
    <script>
        $('.my-select').selectpicker();
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection
