//Date range picker
$("#reportrange").daterangepicker();

var reportRange = $("#reportrange").val().split(" - ");

var _start = reportRange[0];
var _end = reportRange[1];

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$.ajax({
    url: `/tech_reports/reports`,
    type: "POST",
    dataType: "json",
    data: {
        start: _start,
        end: _end,
    },
    success: function (response) {
        $(".onloadTbl").html(response.data);
        $("#reporttbl").DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    },
    error: function (error) {
        console.log(error);
    },
});

$("#reportrange").on("change", function (e) {
    e.preventDefault();

    let reportRange = $("#reportrange").val().split(" - ");

    let _start = reportRange[0];
    let _end = reportRange[1];

    $.ajax({
        url: `/tech_reports/reports`,
        type: "POST",
        dataType: "json",
        data: {
            start: _start,
            end: _end,
        },
        success: function (response) {
            $(".onloadTbl").html(response.data);
            $("#reporttbl").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$(".search").on("keyup", function () {
    let search_query = $(".search").val().trim();

    $.ajax({
        url: "/tech_reports/search",
        type: "GET",
        dataType: "json",
        data: {
            query: search_query,
        },
        success: function (response) {
            $(".onloadTbl").html(response.data);
            $("#searchtbl").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$("body").on("change", ":checkbox", function () {
    let _id = $(this).data("id");

    $.ajax({
        url: "/tech_reports/charge",
        method: "GET",
        dataType: "json",
        data: {
            id: _id,
        },
        success: function (data) {
            // console.log(data);
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$("body").on("click", ".detail", function () {
    let _id = $(this).data("id");
    $(".btnEdit").attr("href", `/tech_reports/${_id}/edit`);

    $.ajax({
        url: `/tech_reports/details`,
        type: "GET",
        dataType: "json",
        data: {
            id: _id,
        },
        success: function (response) {
            $(".modal-body").html(response.data);
            $("#modal-details").modal("show");
            // console.log(response);
        },
        error: function (error) {
            console.log(error);
        },
    });
});
