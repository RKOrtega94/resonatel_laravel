$(document).ready(function () {

    var today = new Date();

    /**
     *
     * @param  url
     * Load datatable function
     */
    function loadDataTable(ruta) {
        let table = $('#firebaseData').DataTable({
            language: {
                "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            lengthChange: false,
            buttons: [{
                extend: 'excel',
                text: '<span class="text-white"> Exportar</span>',
                className: 'bg-success',
                attr: {
                    title: 'Export',
                    id: 'exportButton'
                }
            }],
            serverSide: false,
            ajax: {
                url: ruta,
                type: 'GET', error: function (xhr, textStatus, errorThrown) {
                    reloadTable()
                },
                dataSrc: 'data',
            },
            columns: [
                {
                    "data": function (data, type, set) {
                        try {
                            if (data['date']) {
                                return data['date']
                            }
                            return "0/0/0";
                        } catch (err) {
                            return "0/0/0";
                        }
                    }
                },
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
                {
                    "data": function (data, type, set) {
                        try {
                            if (data["ticket"]) {
                                return data["ticket"]
                            }
                            return "No ticket"
                        } catch (error) {
                            return "No ticket"
                        }
                    }
                },
                {
                    "data": function (data, type, set) {
                        try {
                            if (data["anillamador"]) {
                                return data["anillamador"]
                            }
                            return "No anillamador"
                        } catch (error) {
                            return "No anillamador"
                        }
                    }
                },
                {
                    "data": function (data, type, set) {
                        try {
                            if (data["dni"]) {
                                return data["dni"]
                            }
                            return "No dni"
                        } catch (error) {
                            return "No dni"
                        }
                    }
                },
                {
                    "data": function (data, type, set) {
                        try {
                            if (data["tipo"]) {
                                return data["tipo"]
                            }
                            return "No tipo"
                        } catch (error) {
                            return "No tipo"
                        }
                    }
                },
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
                                return 'Se cerró el ticket';
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
                                return data['pir'] ? data['pir'] : 'Escalado' + ' -> ' + data['coment'] ? data['coment'] : 'No Coment';
                            } else {
                                return data['coment'] ? data['coment'] : 'No Coment';
                            }
                        } catch (err) {
                            return "No Coment";
                        }
                    }
                },
                {
                    "data": function (data, type, set) {
                        try {
                            if (data["tmo"]) {
                                return data["tmo"]
                            }
                            return "No tmo"
                        } catch (error) {
                            return "No tmo"
                        }
                    }
                },
            ]
        });
        function reloadTable() {
            table.ajax.reload()
        }
    };

    loadDataTable(url)

    $(function () {
        $('#dates').daterangepicker({
            opens: 'right',
            "maxDate": today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear(),
            locale: {
                format: 'DD-MM-YYYY',
                separator: " al ",
                applyLabel: "Aplicar",
                cancelLabel: "Cancelar",
                fromLabel: "De",
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
            var newurl = `${url}/${start.format('DD-MM-YYYY')}/${end.format('DD-MM-YYYY')}`;
            console.log(newurl)
            $('#firebaseData').DataTable().destroy();
            loadDataTable(newurl);
        });
    });
    $('#firebaseData').DataTable.Buttons()
});

