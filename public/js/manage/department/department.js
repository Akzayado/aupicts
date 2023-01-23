$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $(".create").css("display", "none");
    $.ajax({
        url: `/manage/department/list`,
        method: "GET",
        dataType: "json",
        success: function (response) {
            $("#table_department").append(response.data);
            $("#department").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: true,
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$("body").on("click", "#table_department>tr", function () {
    $(".create").css("display", "block");
    $(".formTitle").html("Edit");
    $("#departmentBtn").html("Update");
    $("#departmentBtn").removeClass("btn-primary");
    $("#departmentBtn").removeClass("store");
    $("#departmentBtn").addClass("updateBtn");
    $("#departmentBtn").addClass("btn-success");
    $(".account_codeError").html("");
    $(".departmentError").html("");
    currentRow = $(this).closest("tr");

    row1 = currentRow.find("td:eq(0)").text();
    row2 = currentRow.find("td:eq(1)").text();
    $(".department_id").val($(this).data("id"));

    $("#account_code").val(row1);
    $("#department_name").val(row2);
});

$(".create").on("click", function () {
    $(".account_code").val("");
    $(".formTitle").html("Create");
    $(".department_name").val("");
    $("#departmentBtn").html("Create New");
    $("#departmentBtn").removeClass("updateBtn");
    $("#departmentBtn").addClass("store");
    $("#departmentBtn").removeClass("btn-success");
    $("#departmentBtn").addClass("btn-primary");
    $(".create").css("display", "none");
});

$("body").on("click", ".store", function (e) {
    e.preventDefault();
    $(".department_id").val("");
    let account_code = $(".account_code").val();
    let department_name = $(".department_name").val();

    $.ajax({
        url: `/manage/department/create`,
        method: "POST",
        dataType: "json",
        data: {
            account_code: account_code,
            department: department_name,
        },
        success: function (response) {
            $(".account_codeError").html("");
            $(".departmentError").html("");
            $("#account_code").val("");
            $("#department_name").val("");

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500,
            });
            window.location.reload();
        },
        error: function (error) {
            $(".account_codeError").html("");
            $(".departmentError").html("");

            $.each(error.responseJSON.errors, function (key, value) {
                $("." + key + "Error").html(value);
            });
        },
    });
});

$("body").on("click", ".updateBtn", function (e) {
    e.preventDefault();

    let _id = $(".department_id").val();
    let account_code = $(".account_code").val();
    let department_name = $(".department_name").val();

    $.ajax({
        url: `/manage/department/${_id}/update`,
        method: "PUT",
        dataType: "json",
        data: {
            account_code: account_code,
            department: department_name,
        },
        success: function (response) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Data has been updated.",
                showConfirmButton: false,
                timer: 1500,
            });
            window.location.reload();
        },
        error: function (error) {
            console.log(error);
        },
    });
});
