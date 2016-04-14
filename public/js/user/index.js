$(function() {

	$(document).on("click", ".action-delete", function() {
		var id = $(this).attr("entity_id");
		ajaxDelete(id);
	});

	$('.resultados table').dataTable( {
		"bProcessing": true,
		"bAutoWidth": false,
		"iDisplayLength": 25,
		"aaSorting": [[1,'asc']],
		"bJQueryUI": true,
		"oLanguage": {
			"sUrl": root+"js/dataTables.spanish.txt"
		},
		//"aoColumns": [
		//             {"bSortable": true}, // Ordenar por esta columna
		//             {"sType": "date-euro"} // Ordenar por fecha bien
        //            ],
		"sPaginationType": "full_numbers",
		"sAjaxSource": root+'user/ajaxGetAll'
	});
});



function ajaxDelete(id) {
	var popupContent = "<p>¿Está seguro de que desea elmininar este elemento?</p>";
	elimina_elemento(({
		id: id,
		message: popupContent,
		elemento: "User",
		dir: "user/ajaxDelete",
	}));
}