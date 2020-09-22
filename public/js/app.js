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
