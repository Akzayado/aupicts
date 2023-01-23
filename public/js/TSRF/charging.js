//Date range picker
$("#reportrange").daterangepicker();

var dt = $(".reportrange").val().split("-");
var startDate = dt[0];
var endDate = dt[1];

report();

function report() {
    $.ajax({
        url: `/tech_reports/charging/charges`,
        method: "GET",
        dataType: "json",
        data: {
            start: startDate,
            end: endDate,
        },
        success: function (response) {
            $(".reporttbl").html(response.data);

            $("#charging-table")
                .DataTable({
                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                    buttons: [
                        // "copy",
                        // "csv",
                        "excel",
                        // "pdf",
                        // "print",
                        "colvis",
                    ],
                })
                .buttons()
                .container()
                .appendTo("#charging-table_wrapper .col-md-6:eq(0)");
        },
        error: function (error) {
            console.log(error);
        },
    });
}

$(".reportrange").on("change", function (e) {
    e.preventDefault();
    let dt = $(".reportrange").val().split("-");
    let startDate = dt[0];
    let endDate = dt[1];
    $.ajax({
        url: `/tech_reports/charging/charges`,
        method: "GET",
        dataType: "json",
        data: {
            start: startDate,
            end: endDate,
        },
        success: function (response) {
            $(".reporttbl").html(response.data);

            $("#charging-table")
                .DataTable({
                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                    buttons: [
                        // "copy",
                        // "csv",
                        "excel",
                        // "pdf",
                        // "print",
                        "colvis",
                    ],
                })
                .buttons()
                .container()
                .appendTo("#charging-table_wrapper .col-md-6:eq(0)");
        },
        error: function (error) {
            console.log(error);
        },
    });
});
