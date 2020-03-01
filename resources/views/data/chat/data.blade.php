@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="margin-top: 0px; margin-bottom: -35px">
                    <div class="card-header card-header-success">
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <i class="material-icons input-group-text">
                                            {{ __('today') }}
                                        </i>
                                    </div>
                                    <input type="text" class="form-control" name="dates" id="dates"
                                        placeholder="Fechas">
                                </div>
                            </div>
                        </div>
                        <div id="table_wrapper" class="table-responsive">
                            <table id="firebaseData" class="table" style="width:100%">
                                <thead class="text-primary">
                                    <th style="width: 100px">Fecha</th>
                                    <th style="width: 50px">Hora</th>
                                    <th style="width: 50px">Usuario</th>
                                    <th style="width: 50px">Ticket</th>
                                    <th style="width: 50px">IP</th>
                                    <th style="width: 50px">Cédula</th>
                                    <th style="width: 50px">Abierto</th>
                                    <th style="width: 50px">Escalado (N2 / VT)</th>
                                    <th style="width: 500px">PIR / Comment</th>
                                    <th>Servicio</th>
                                    <th style="width: 50px">Duración</th>
                                </thead>
                                <tfoot class="text-primary">
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Usuario</th>
                                    <th>Ticket</th>
                                    <th>IP</th>
                                    <th>Cédula</th>
                                    <th>Abierto</th>
                                    <th>Escalado (N2 / VT)</th>
                                    <th>PIR / Comment</th>
                                    <th>Servicio</th>
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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<!--Range DatePicker-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function () {
        var url = '/data/{{auth()->user()->group}}'
        var today = new Date();

        function loadDataTable(url) {
            $('#firebaseData').DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'excelButton'
                }],
                serverSide: false,
                ajax: {
                    url: url,
                    type: 'GET',

                    dataSrc: 'data',
                    defaultContent: 'N/A'
                },
                columns: [
                    { "data": "date" },
                    {
                        "data": function (data, type, set) {
                            try {
                                if (data['hour']) {
                                    return data['hour']
                                }
                                return "00:00";
                            } catch (err) {
                                return "00:00";
                            }
                        }
                    },
                    {
                        "data": function (data, type, set) {
                            try {
                                if (data['user']) {
                                    return data['user']
                                }
                                return "No User";
                            } catch (err) {
                                return "No user";
                            }
                        }
                    },
                    { "data": "ticket" },
                    { "data": "ip" },
                    { "data": "dni" },
                    {
                        "data": function (data, type, set) {
                            try {
                                if (data['escalado']) {
                                    return 'Ticket abierto'
                                } else if (data['status']) {
                                    return 'Ticket abierto'
                                }
                                return "N/A";
                            } catch (err) {
                                return "No info";
                            }
                        }
                    },
                    {
                        "data": function (data, type, set) {
                            try {
                                if (data['escalado_n2']) {
                                    return 'Escalado'
                                } else {
                                    return 'Cerrado';
                                }
                            } catch (err) {
                                return "No info";
                            }
                        }
                    },
                    {
                        "data": function (data, type, set) {
                            try {
                                if (data['escalado_n2']) {
                                    return data['pir'] ? data['pir'] : 'Escalado' + ' -> ' + data['coment'] ? data['coment'] : 'No coment';
                                } else {
                                    return data['coment'] ? data['coment'] : 'No coment';
                                }
                            } catch (err) {
                                return "No info";
                            }
                        }
                    },
                    { "data": "req" },
                    { "data": "tmo" }
                ]
            });
            $('.excelButton').each(function () {
                $(this).removeClass('btn btn-secondary buttons-excel buttons-html5').addClass('btn btn-sm btn-primary')
            });
        }

        loadDataTable(url);

        $(function () {
            $('#dates').daterangepicker({
                opens: 'left',
                "maxDate": today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear(),
                locale: {
                    format: 'DD-MM-YYYY',
                    separator: " al ",
                    applyLabel: "Aplicar",
                    cancelLabel: "Cancelar",
                    toLabel: "al",
                    daysOfWeek: [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sab",
                    ],
                    monthNames: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                }
            }, function (start, end, label) {
                url = '/data/{{auth()->user()->group}}';
                url = url + '/' + start.format('DD-MM-YYYY') + '/' + end.format('DD-MM-YYYY');
                $('#firebaseData').DataTable().destroy();
                loadDataTable(url);
            });
        });
    });
</script>
@endsection
