function DeleteRecord(strURL) {
    if (confirm("Confirmer la suppression ?")) {
        var oForm = document.getElementById("frmDelete");
        oForm.setAttribute("action", strURL);
        oForm.submit();
    }
}

function setupPrint(id) {
    if (id != "") {
        var strURL = "/dashboard/printhistorysociete/" + id.toString();
        var oLink = document.getElementById("lnkPrintSocieteHistory");
        oLink.setAttribute("href", strURL);
    }
}

function LoadBySociete(strURL) {
    // var idSociete = document.getElementById("idSociete").value;
    // $("#tblHistorysociete").DataTable().ajax.data({ idSociete: idSociete });
    $("#tblHistorysociete").DataTable().ajax.reload();
}

function initDataTable(strURL, aColumns, strIdTable) {
    $(strIdTable).dataTable({
        language: {
            aria: {
                sortAscending: ": activate to sort column ascending",
                sortDescending: ": activate to sort column descending",
            },
            emptyTable: "No data available in table",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries found",
            infoFiltered: "",
            lengthMenu: "_MENU_ entries",
            search: "Search:",
            zeroRecords: "No matching records found",
        },
        ajax: {
            url: strURL,
            type: "post",
            data: function (d) {
                d.idSociete = $("#idSociete").val();
            },
        },
        columns: aColumns,
        processing: true,
        serverSide: true,

        buttons: [],

        responsive: {
            details: {},
        },
        searching: false,
        ordering: false,
        order: [[0, "asc"]],

        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"], // change per page values here
        ],
        // set the initial value
        pageLength: 10,

        dom:
            "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
    });
}
