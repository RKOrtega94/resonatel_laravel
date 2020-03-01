$(document).ready(function () {
    var url = '/data/{{auth()->user()->group}}'

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
            opens: 'left'
        }, function (start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            url = '/data/{{auth()->user()->group}}';
            url = url + '/' + start.format('DD-MM-YYYY') + '/' + end.format('DD-MM-YYYY');
            $('#firebaseData').DataTable().destroy();
            loadDataTable(url);
        });
    });
});
