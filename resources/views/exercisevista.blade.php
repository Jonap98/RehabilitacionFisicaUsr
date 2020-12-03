@section('classes')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <!--begin::Page Custom Styles(used by providers page)-->
    <link href="{{ asset('assets/css/pages/wizard/wizard-1.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
.video-responsive {
position: relative;
padding-bottom: 56.25%; /* 16/9 ratio */
padding-top: 30px; /* IE6 workaround*/
height: 0;
overflow: hidden;
}

.video-responsive video,
.video-responsive object,
.video-responsive embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>
@endsection

@extends('master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card-title">
                <h3 class="card-label">Ejercicio actual
            </div>
            <!--begin::Row-->
            <div class="row">
                @foreach ($exercise as $ex)
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Section-->
                            <div class="video-responsive" style="overflow: hidden; justify-content: center; align-items: center;">
                                <video class="player"  width="520" height="250" data-user=@json($ex->exercise_id) controls>
                                    <source src="{{'http://localhost/RehabilitacionApp/public'.$ex->exercise_path}}" type="video/mp4">
                                    Tu navegador no soporta los vídeos de HTML5
                                </video>
                            <input type="text" name="id_user" value="{{$ex->user_id}}" hidden>
                            <input type="text" name="id_user" value="{{$ex->exercise_id}}" hidden>
                                {{--<video  class="fm-video video-js vjs-16-9" src="{{'http://localhost/RehabilitacionApp/public'.$ex->exercise_path}}"></video>--}}
                                <!--<iframe style="overflow: hidden;" src="https://www.youtube.com/embed/_XzV3ovHrNc" frameborder=0 width=510 height=400 scrolling=no allowfullscreen=allowfullscreen></iframe>-->
                            </div>
                            <br>
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{$ex->exercise_name}}</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <br>
                                <form action="{{action('AssignmentController@addFavorite', $ex->favorite)}}">
                                    {{ csrf_field() }}
                                    <button id="myButton" type="submit"  class="btn btn-outline-danger font-weight-bold text-uppercase px-9 py-4">
                                    <input type="hidden" name="favorite" value="1">
                                    <input type="hidden" name="id_exercise" value="{{$ex->exercise_id}}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                          </svg>
                                    </button>
                                </form>
                            <!--end::Section-->
                        </div>
                        {{--
                        <form method="post" onsubmit="return enviar();">
                            <input type="text" name="user" id="user">
                            <input type="text" name="exercise" id="exercise">
                            <input type="submit" value="enviar">
                        </form>
                        <button onclick="prueba()">Holiwis</button>
                        <a id="link">Enlace</a>
                        --}}
                            <!--<button onclick="alert('Holiwis')">Holiwis</button>-->
                            <!--<button onclick="prueba()">Holiwis</button>-->

                            <!--Prueba ajax-->
                            {{--
                            <div id="divmsg" style="display: none" class="alert alert-primary" role="alert"></div>
                            <form method="POST">
                                @csrf
                                <input type="text" name="id_user" id="id_user" value="1" hidden>
                                <input type="text" name="id_exercise" id="id_exercise" value="2" hidden>
                                <button  type="submit" class="btn btn-success btnenviar">Boton</button>
                            </form>
                            --}}
                            {{--<form id="frmajax" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="id_user" id="id_user" value="1" hidden>
                                <input type="text" name="id_exercise" id="id_exercise" value="2" hidden>
                                <button id="btnguardar" type="submit" class="btnenviar">Guardar</button>
                            </form>
                            --}}
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
{{--
<div class="container">
    <h3>Ejercicios</h3>
@foreach ($exercise as $ex)
    <!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">               
           

            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{$ex->exercise_name}}</h3>
                    </div>
                    <div class="card-toolbar">
                        
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body" style="overflow: hidden">
                <!--begin::Button-->
                    <div class="video-responsive" style="overflow: hidden; justify-content: center; align-items: center;">
                        <video width="520" height="250" controls>
                            <source src="{{'http://localhost/RehabilitacionApp/public'.$ex->exercise_path}}" type="video/mp4">
                            Tu navegador no soporta los vídeos de HTML5
                        </video>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{action('AssignmentController@addFavorite', $ex->favorite)}}" target="request">
                        <button id="myButton" type="submit"  class="btn btn-outline-danger font-weight-bold text-uppercase px-9 py-4">
                        <input type="hidden" name="favorite" value="1">
                        <input type="hidden" name="id_exercise" value="{{$ex->exercise_id}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                              </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
--}}
@endsection

@section('scripts')
{{--
<script>
    $(".btnenviar").click(function(e){
document.getElementById().addEventListener('ended',myHandler,false);
    function myHandler(e) {
        alert('Video finalizado')
    }
</script>
--}}

<script type="text/javascript">
$(".player").bind('ended', function(){
       // done playing
       let exercise = document.querySelector('.player').dataset.user;
        exercise = JSON.parse(exercise);
        console.log(exercise);
        location.reload();
       //alert("Player stopped");
});
</script>

<script type='text/javascript'>
    document.getElementById('myVideo').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        alert('Video finalizado')
    }
</script>
<script>
    document.getElementById("link").addEventListener("click", function(){
    const ventana = window.open("https://google.com.pe","_blank");
    setTimeout(function(){
        ventana.close();
    }, 5);
});
</script>
<script>
    function enviar(){
        var user = document.getElementById('user').value;
        var exercise = document.getElementById('exercise').value;
        
        var dataen = 'user='+user+'&exercise='+exercise;

        $.ajax({
            type: 'POST',
            url: '{{ route('playback.store') }}',
            data: dataen,
            success:function(resp){
                $("#respa").hmtl(resp);
            }
        });
        return false;
    }
</script>

<script type="text/javascript">
    function limpiarCampos(){
        $("#id_user").val('');
        $("#id_exercise").val('');
    }
    function mostrarMensaje(mensaje){
        $("#divmsg").empty(); //Limpiar div
        $("#divmsg").append("<p>"+mensaje+"</p>");
        $("#divmsg").show(500);
        $("#divmsg").hide(5000);
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btnenviar").click(function(e){
        e.preventDefault();

        var id_user = $("input[name=id_user]").val();
        var id_exercise = $("input[name=id_exercise]").val();

        $.ajax({
            type:'POST', //Para eliminar, DELETE
            url:"{{ route('playback.store') }}",
            data:{id_user:id_user, id_exercise:id_exercise},
            dataType: 'JSON',
            success:function(data){
                alert(data.success);
                /*mostrarMensaje(data.mensaje);
                limpiarCampos();*/
            }
        });
         
    });

</script>
{{--<script>
    $(document).ready(function(){
        $('#btnguardar').click(function(){
            //var datos=$('#frmajax').serialize();
            var datos=$('#frmajax').val();
            alert(datos);
            return false;
            $.ajax({
                type:"POST",
                url:"insertar.php"
                headers: {'X-CSRF-TOKEN': token},
                data:datos,
                success:function(){

                }
            });
        });
    })
</script>
--}}
<script>
    function prueba(){
        alert('HoliwisGGG')
    }
</script>
<script>
    $("#myButton").click(function(){
    $(this).toggleClass("btn-outline-danger btn-danger");
    });
</script>
<script> 
    var video = document.getElementById("videoPlayer");
    function playPause() { 
        if (video.paused) 
            video.play(); 
        else 
            video.pause(); 
    }
    function reload() { 
       video.load(); 
    }
    function makeLarge() { 
        video.width = 1000; 
    }
    function makeSmall() { 
        video.width = 250; 
    } 
    function makeNormal() { 
        video.width = 500; 
    } 
    </script>
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/datatables/basic/headers-r-solicitudes.js?v=7.0.4')}}"></script>
    <!--begin::Page Scripts(used by providers page)-->
    <script src="{{asset('assets/js/pages/widgets.js?v=7.0.4')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection