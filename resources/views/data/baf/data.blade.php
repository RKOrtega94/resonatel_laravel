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
                                    <th style="width: 50px">Anillamador</th>
                                    <th style="width: 50px">Cédula</th>
                                    <th style="width: 50px">Abierto</th>
                                    <th style="width: 50px">Escalado (N2 / VT)</th>
                                    <th style="width: 500px">PIR / Comment</th>
                                    <th style="width: 50px">Duración</th>
                                </thead>
                                <tfoot class="text-primary">
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Usuario</th>
                                    <th>Ticket</th>
                                    <th>Anillamador</th>
                                    <th>Cédula</th>
                                    <th>Abierto</th>
                                    <th>Escalado (N2 / VT)</th>
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
    var url = '/data/{{auth()->user()->group}}';
</script>
<script src="{{ asset('js/baf/supervisor_data.js') }}"></script>
<script>
    $(".excelButton").removeClass("btn-secondary").addClass("btn-primary");
</script>
@endsection
