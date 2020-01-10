@extends('layouts.app', ['activePage' => 'bitácora', 'titlePage' => __(' - Bitácora')])

@section('custom-header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 style="margin: 0px">{{ __('Registro de incidencias') }}</h3>
                        <p class="card-category">{{ __('Bitácora') }}</p>
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
                            <table id="firebaseData" class="table" style="width:100%">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>ZIP / Post code</th>
                                    <th>Country</th>
                                </thead>
                                <tfoot class="text-primary">
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>ZIP / Post code</th>
                                    <th>Country</th>
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
    $(document).ready(function() {
        $.ajax({
            dataType: "json",
            url: '/api/data/mensual/{{auth()->user()->user}}',
            success: function(data){
                console.log(data);
            }
        })
        $('#firebaseData').DataTable( {
            serverSide: true,
            ajax: {
                url: '/api/data/mensual/{{ auth()->user()->user }}',
                type: 'GET',
                dataSrc: 'data'
            },
            columns: [
                {'data': 'ticket'},
                {'data': 'anillamador'},
                {'data': 'dni'},
                {'data': 'tmo'},
                {'data': 'coment'}
            ],
        } );
    } );
</script>
@endsection
