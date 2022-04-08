$(document).ready(function () {
    $('table.recuerdameTable').DataTable({
        paging: false,
        info: false,
        language: { search: "_INPUT_",
        searchPlaceholder: "Buscar..."}

    });
});