<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card" style="margin: 0px;">
            <div class="card-header card-header-primary">
                <h3 style="margin: 0px">{{ __('Registro de incidencias') }}</h3>
                <p class="card-category">{{ __('Bitácora diaria') }}</p>
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
                <div id="table_wrapper" class="table-responsive">
                    <table id="firebaseData" class="table" style="width:100%">
                        <thead class="text-primary">
                            <th style="width: 100px">Ticket</th>
                            <th style="width: 150px">Anillamador</th>
                            <th style="width: 150px">Cédula</th>
                            <th>PIR / Comment</th>
                            <th>Duración</th>
                        </thead>
                        <tfoot class="text-primary">
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
    $(document).ready(function() {
        var table = $('#firebaseData').DataTable( {
            serverSide: true,
            ajax: {
                url: '/api/data/baf/daily/{{auth()->user()->user}}',
                type: 'GET',

            dataSrc: 'data'
            },
            columns: [
                {"data": "ticket"},
                {"data": "anillamador"},
                {"data": "dni"},
                {"data": "coment"},
                {"data": "tmo"}
            ]
        } );
    } );
    table.buttons().container().appendTo( '#table_wrapper .col-md-6:eq(0)');

</script>
@endsection
