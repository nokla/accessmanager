function DeleteRecord(strURL) {
    if (confirm("Confirmer la suppression ?")) {
      var oForm = document.getElementById("frmDelete");
      oForm.setAttribute("action", strURL);
      oForm.submit();
    }
}