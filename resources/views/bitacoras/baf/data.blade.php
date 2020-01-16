@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="margin-top: 0px;">
                    <div class="card-header card-header-danger">
                        <h3 style="margin: 0px">{{ __('Registro de incidencias') }}</h3>
                        <p class="card-category">{{ __('Bitácora general') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div id="tmo"></div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('bitacora.create') }}" class="btn btn-sm btn-primary">
                                    <span class="sidebar-mini">
                                        <i class="material-icons">assignment</i>
                                        {{ __('Bitácora') }}
                                    </span>
                                </a>
                            </div>
                        </div>
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
                                    <th>Fecha</th>
                                    <th>Ticket</th>
                                    <th>Anillamador</th>
                                    <th>Cédula</th>
                                    <th>PIR / Comment</th>
                                    <th>Duración</th>
                                </thead>
                                <tfoot class="text-primary">
                                    <th>Fecha</th>
                                    <th>Ticket</th>
                                    <th>Anillamador</th>
                                    <th>Cédula</th>
                                    <th>PIR / Comment</th>
                                    <th>Duración</th>
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
        $('#firebaseData').DataTable( {
            serverSide: true,
            ajax: {
                url: '/api/group/{{auth()->user()->group}}',
                type: 'GET',
            dataSrc: 'data',
            error: function(){
                $(".dataTables_empty").eq(0).text("No hay registros disponibles");
            }
            },
            columns: [
                {"data": "date"},
                {"data": "ticket"},
                {"data": "anillamador"},
                {"data": "dni"},
                {"data": "coment"},
                {"data": "tmo"}
            ]
        } );
    } );
</script>
@endsection
