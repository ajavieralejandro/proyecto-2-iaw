$(function() {
    var table = $(".data-table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "https://proyecto2-jaa.herokuapp.com/docentesTables",
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex" },
            { data: "name", name: "name" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });
});

//Dinamic button clicked on Jquery!!
$(document).on("click", ".delete", function(event) {
    //console.log("el elemento clickead es : ");
    //console.log(event.target.value);
    aux = $(".delete").val();
    //console.log("El id es : ", aux);
    toDelete = confirm(
        "Are you sure you want to Delete : " + event.target.name
    );
    if (toDelete) {
        $.ajax({
            url: "https://proyecto2-jaa.herokuapp.com/deleteDocente",
            type: "DELETE",
            data: {
                id: event.target.value,
                _token: $("meta[name='csrf-token']").attr("content")
            },
            success: function(response) {
                location.reload(true);
            }
        });
    }
});
