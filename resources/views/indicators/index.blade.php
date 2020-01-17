@extends('layouts.app', ['activePage' => 'indicator', 'titlePage' => __(' - Indicadores')])

@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 style="margin: 0px">{{ __('Indicators') }}</h3>
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
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('indicators.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini"> <i class="material-icons">add_box</i>
                                        {{ __('Add') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="data" class="table table-striped" style="width: 100%">
                                    <thead class="text-primary">
                                        <th>{{ __('Indicador') }}</th>
                                        <th>{{ __('Descripción') }}</th>
                                        <th>{{ __('Meta') }}</th>
                                        <th>{{ __('Opciones') }}</th>
                                    </thead>
                                    <tfoot class="text-primary">
                                        <th>{{ __('Indicador') }}</th>
                                        <th>{{ __('Descripción') }}</th>
                                        <th>{{ __('Meta') }}</th>
                                        <th>{{ __('Opciones') }}</th>
                                    </tfoot>
                                </table>
                            </div>
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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data').DataTable( {
            serverSide: true,
            ajax: {
                url: '/api/indicators',
                type: 'GET',
            dataSrc: 'data',
            error: function(){
                $(".dataTables_empty").eq(0).text("No hay registros disponibles");
            }
            },
            columns: [
                { "data": "name"  },
                { "data": "description"  },
                { "data": function(data){
                    return "Debe ser " + data['signo'] + " " + data['meta'] + " %";
                }  },
                { "data": "btn"}
            ]
        } );
    });
</script>
@endsection
