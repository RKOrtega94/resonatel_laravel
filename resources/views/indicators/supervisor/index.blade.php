@extends('layouts.app', ['activePage' => 'user-indicator', 'titlePage' => __(' - Indicadores')])

@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="margin: 0px">
                    <div class="card-header card-header-success">
                        <h3 style="margin: 0px">{{ __('Listado de asesores') }}</h3>
                        <p class="card-category">{{ auth()->user()->group }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="usersTable" class="table" style="width: 100%">
                                <thead class="text-primary">
                                    <th>Asesor</th>
                                    <th>Perfil</th>
                                    <th>Indicadores</th>
                                    <th></th>
                                </thead>
                                <tfoot class="text-primary">
                                    <th>Asesor</th>
                                    <th>Perfil</th>
                                    <th>Indicadores</th>
                                    <th></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
<script>
    $(document).ready(function(){
        $('#usersTable').DataTable({
            serverSide: true,
            ajax: {
                url: '/indicator/{{ auth()->user()->user }}',
                tyoe: 'GET',
                dataSrc: 'data',
                error: function() {
                    $(".dataTables_empty").eq(0).text("No hay registros disponibles");
                }
            },
            columns: [
               { "data": "firstName", render: function(data, type, row){
                   return row.firstName + " " + row.lastName
               }},
               { "data": null, render: function(data){
                   var profile = "";
                   for(var i = 0; i < data.profiles.length; i++){
                       profile = profile + data.profiles[i].name;
                       if(i+1 < data.profiles.length){
                           profile =+ "<br>";
                       }
                   }
                   return profile;
               } },
               { "data": null, render: function(data){
                   if(!data.indicators.length){
                       return "No posee indicadores";
                   }
               }},
               { "data": "btn",
                className: "td-actions text-right" }
            ]
        });
    });
</script>
@endsection
