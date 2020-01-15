<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card" style="margin: 0px;">
            <div class="card-header card-header-success">
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
                        <thead class="text-info">
                            <th style="width: 100px">Ticket</th>
                            <th style="width: 100px">Anillamador</th>
                            <th style="width: 100px">Cédula</th>
                            <th>PIR / Comment</th>
                            <th style="width: 250px">Duración</th>
                        </thead>
                        <tfoot class="text-info">
                            <th style="width: 100px">Ticket</th>
                            <th style="width: 100px">Anillamador</th>
                            <th style="width: 100px">Cédula</th>
                            <th>PIR / Comment</th>
                            <th style="width: 250px">Duración</th>
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
            serverSide: false,
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
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                totalRows = api.data().count();

                // Total over all pages
                total = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        var minutes = b.substring(0, b.indexOf(':'));
                        var seconds = b.substring(b.indexOf(':') + 1, b.length);
                        return intVal(a) + intVal((intVal(seconds) * 1000) + (intVal(minutes) * 60000));
                    }, 0 );

                promedioTmo = function(total, totalRows) {
                    var tmo = total/totalRows;
                    var min = parseInt((tmo / (1000 * 60))) < 10 ? '0' + parseInt((tmo / (1000 * 60))) : parseInt((tmo / (1000 * 60)));
                    var seg = parseInt((tmo / 1000) % 60) < 10 ? '0' + parseInt((tmo / 1000) % 60) : parseInt((tmo / 1000) % 60);

                    if ((tmo / 1000) < (269)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 0%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 0%</p>";
                    } else if ((tmo / 1000) >= (270) && (tmo / 1000) <= (299)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 10%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 10%</p>";
                    } else if ((tmo / 1000) >= (300) && (tmo / 1000) <= (329)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 20%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 20%</p>";
                    } else if ((tmo / 1000) >= (330) && (tmo / 1000) <= (359)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 30%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 30%</p>";
                    } else if ((tmo / 1000) >= (360) && (tmo / 1000) <= (389)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 40%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 40%</p>";
                    } else if ((tmo / 1000) >= (390) && (tmo / 1000) <= (419)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 50%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 50%</p>";
                    } else if ((tmo / 1000) >= (420) && (tmo / 1000) <= (449)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 60%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 60%</p>";
                    } else if ((tmo / 1000) >= (450) && (tmo / 1000) <= (479)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 70%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 70%</p>";
                    } else if ((tmo / 1000) >= (480) && (tmo / 1000) <= (509)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 80%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 80%</p>";
                    } else if ((tmo / 1000) >= (510) && (tmo / 1000) <= (539)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-warning\">Promedio TMO: ' + min + ':' + seg + " 90%</h6>";
                        return '<p class=\"text-warning\">Promedio TMO: ' + min + ':' + seg + " 90%</p>";
                    } else if ((tmo / 1000) >= (540) && (tmo / 1000) <= (569)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-success\">Promedio TMO: ' + min + ':' + seg + ' 100%</h6>';
                        return '<p class=\"text-success\">Promedio TMO: ' + min + ':' + seg + '100%</p>';
                    } else if ((tmo / 1000) >= (570) && (tmo / 1000) <= (599)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-warning\">Promedio TMO: ' + min + ':' + seg + " 90%</h6>";
                        return '<p class=\"text-warning\">Promedio TMO: ' + min + ':' + seg + " 90%</p>";
                    } else if ((tmo / 1000) >= (600) && (tmo / 1000) <= (629)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 80%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 80%</p>";
                    } else if ((tmo / 1000) >= (630) && (tmo / 1000) <= (659)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 70%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 70%</p>";
                    } else if ((tmo / 1000) >= (660) && (tmo / 1000) <= (689)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 60%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 60%</p>";
                    } else if ((tmo / 1000) >= (690) && (tmo / 1000) <= (719)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 50%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 50%</p>";
                    } else if ((tmo / 1000) >= (720) && (tmo / 1000) <= (749)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 40%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 40%</p>";
                    } else if ((tmo / 1000) >= (750) && (tmo / 1000) <= (779)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 30%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 30%</p>";
                    } else if ((tmo / 1000) >= (780) && (tmo / 1000) <= (809)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 20%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 20%</p>";
                    } else if ((tmo / 1000) >= (810) && (tmo / 1000) <= (839)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 10%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 10%</p>";
                    } else if ((tmo / 1000) >= (840)) {
                        document.getElementById('tmo').innerHTML = '<h6 class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 0%</h6>";
                        return '<p class=\"text-danger\">Promedio TMO: ' + min + ':' + seg + " 0%</p>";
                    }
                };

                // Update footer
                $( api.column( 4 ).footer() ).html(
                    promedioTmo(total, totalRows)
                );
            }
        } );
        table.buttons().container().appendTo( '#table_wrapper .col-md-6:eq(0)');
    } );

</script>
@endsection