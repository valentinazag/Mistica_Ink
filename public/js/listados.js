
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de MAX total Usuarios",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [
                {
                    extend: "collection",
                    text: "Reportes",
                    orientation: "landscape",
                    buttons: [
                        { text: "Copiar", extend: "copy"}, 
                        { extend: "pdf" }, 
                        { extend: "csv" }, 
                        { extend: "excel" }, 
                        { text: "Imprimir", extend: "print"}
                    ]
                },
                {
                    extend: "colvis",
                    text: "Visor de columnas",
                    /* collectionLayout: "fixed three-column" */

                }
            ],
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });

$(document).ready(function() {
    $('#select_all').click(function() {
        $('.select-item').prop('checked', this.checked);
        toggleEliminarButton();
    });

    $('.select-item').change(function() {
        if ($('.select-item:checked').length == $('.select-item').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        toggleEliminarButton();
    });

    function toggleEliminarButton() {
        if ($('.select-item:checked').length > 0) {
            $('#btnEliminarSeleccionados').show();
        } else {
            $('#btnEliminarSeleccionados').hide();
        }
    }

    $('#formEliminarSeleccionados').submit(function(e) {
        e.preventDefault();
        var selected = [];
        $('.select-item:checked').each(function() {
            selected.push($(this).val());
        });
        $('#ids_seleccionados').val(selected.join(','));
        this.submit();
    });
});
