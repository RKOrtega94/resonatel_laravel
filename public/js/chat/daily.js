$(document).ready(function () {
    var table = $('#firebaseData').DataTable({
        language: {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        serverSide: false,
        ajax: {
            url: dataUrl,
            type: 'GET',

            dataSrc: 'data',
            error: function () {
                $(".dataTables_empty").eq(0).text("No hay registros disponibles");
            }
        },
        columns: [
            { "data": "ticket" },
            { "data": "ip" },
            { "data": "dni" },
            {
                "data": function (data, type, set) {
                    var comentario = data['coment'];
                    return comentario.substring(0, 100) + "...";
                }
            },
            { "data": "tmo" },
            {
                "data": function (data, type, set) {
                    var ticket = data['id'] ? data['id'] : data['ticket'];
                    return "<a rel=\"tooltip\" class=\"btn btn-success btn-link\" href=\"/bitacora/" + ticket + "/edit\" data-original-title=\"\" title=\"\"><i class=\"material-icons\">edit</i><div class=\"ripple-container\"></div>";
                },
                className: 'td-actions text-right'
            },
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            totalRows = api.data().count();

            // Total over all pages
            total = api
                .column(4)
                .data()
                .reduce(function (a, b) {
                    var minutes = b.substring(0, b.indexOf(':'));
                    var seconds = b.substring(b.indexOf(':') + 1, b.length);
                    return intVal(a) + intVal((intVal(seconds) * 1000) + (intVal(minutes) * 60000));
                }, 0);

            promedioTmo = function (total, totalRows) {
                var tmo = total / totalRows;
                var min = parseInt((tmo / (1000 * 60))) < 10 ? '0' + parseInt((tmo / (1000 * 60))) : parseInt((tmo / (1000 * 60)));
                var seg = parseInt((tmo / 1000) % 60) < 10 ? '0' + parseInt((tmo / 1000) % 60) : parseInt((tmo / 1000) % 60);

                if ((tmo / 1000) < (269)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 0%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 0%</p>";
                } else if ((tmo / 1000) >= (270) && (tmo / 1000) <= (299)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 10%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 10%</p>";
                } else if ((tmo / 1000) >= (300) && (tmo / 1000) <= (329)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 20%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 20%</p>";
                } else if ((tmo / 1000) >= (330) && (tmo / 1000) <= (359)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 30%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 30%</p>";
                } else if ((tmo / 1000) >= (360) && (tmo / 1000) <= (389)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 40%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 40%</p>";
                } else if ((tmo / 1000) >= (390) && (tmo / 1000) <= (419)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 50%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 50%</p>";
                } else if ((tmo / 1000) >= (420) && (tmo / 1000) <= (449)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 60%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 60%</p>";
                } else if ((tmo / 1000) >= (450) && (tmo / 1000) <= (479)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 70%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 70%</p>";
                } else if ((tmo / 1000) >= (480) && (tmo / 1000) <= (509)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 80%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 80%</p>";
                } else if ((tmo / 1000) >= (510) && (tmo / 1000) <= (539)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-warning\">TMO: ' + min + ':' + seg + " 90%</h4>";
                    return '<p class=\"text-warning\">TMO: ' + min + ':' + seg + " 90%</p>";
                } else if ((tmo / 1000) >= (540) && (tmo / 1000) <= (569)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-success\">TMO: ' + min + ':' + seg + ' 100%</h4>';
                    return '<p class=\"text-success\">TMO: ' + min + ':' + seg + '100%</p>';
                } else if ((tmo / 1000) >= (570) && (tmo / 1000) <= (599)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-warning\">TMO: ' + min + ':' + seg + " 90%</h4>";
                    return '<p class=\"text-warning\">TMO: ' + min + ':' + seg + " 90%</p>";
                } else if ((tmo / 1000) >= (600) && (tmo / 1000) <= (629)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 80%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 80%</p>";
                } else if ((tmo / 1000) >= (630) && (tmo / 1000) <= (659)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 70%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 70%</p>";
                } else if ((tmo / 1000) >= (660) && (tmo / 1000) <= (689)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 60%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 60%</p>";
                } else if ((tmo / 1000) >= (690) && (tmo / 1000) <= (719)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 50%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 50%</p>";
                } else if ((tmo / 1000) >= (720) && (tmo / 1000) <= (749)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 40%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 40%</p>";
                } else if ((tmo / 1000) >= (750) && (tmo / 1000) <= (779)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 30%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 30%</p>";
                } else if ((tmo / 1000) >= (780) && (tmo / 1000) <= (809)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 20%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 20%</p>";
                } else if ((tmo / 1000) >= (810) && (tmo / 1000) <= (839)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 10%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 10%</p>";
                } else if ((tmo / 1000) >= (840)) {
                    document.getElementById('tmo').innerHTML = '<h4 class=\"text-danger\">TMO: ' + min + ':' + seg + " 0%</h4>";
                    return '<p class=\"text-danger\">TMO: ' + min + ':' + seg + " 0%</p>";
                }
            };

            // Update footer
            $(api.column(4).footer()).html(
                promedioTmo(total, totalRows)
            );
        },
    });
    table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
});
