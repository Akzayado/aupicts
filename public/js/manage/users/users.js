$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var idEdit = "";

$("#userTable").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
});

$(".btnCreate").on("click", function () {
    $(".userm").modal({
        backdrop: "static",
        keyboard: false,
    });
    $(".modal-title ").html("Create New User");
    $("#userBtn").html("Save");
    $("#userBtn").addClass("btn-primary");
    $("#userBtn").addClass("saveUser");
});

$(".btnEdit").on("click", function () {
    let id = $(this).data("id");
    $(".userm").modal({
        backdrop: "static",
        keyboard: false,
    });
    $(".modal-title").html("Edit User");
    $("#userBtn").html("Update");
    $(".div-pass").css("display", "none");
    $("#userBtn").removeClass("btn-primary");
    $("#userBtn").addClass("btn-success");
    $("#userBtn").removeClass("saveUser");
    $("#userBtn").addClass("updateUser");

    $.ajax({
        url: `/manage/users/${id}/edit`,
        method: "GET",
        dataType: "json",
        data: { id: id },
        success: function (response) {
            let name = response.data["name"].split(", ");
            $(".fname").val(name[1]);
            $(".lname").val(name[0]);
            $(".email").val(response.data["email"]);
            $(".username").val(response.data["username"]);
            $(".role").val(response.data["role_id"]).change();
            $(".auth_lvl").val(response.data["auth_level"]).change();

            idEdit = response.data["id"];
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$("body").on("click", ".saveUser", function (e) {
    e.preventDefault();

    let firstname = $(".fname").val();
    let lastname = $(".lname").val();
    let name = "";
    if (firstname !== "" && lastname !== "") {
        name = `${lastname}, ${firstname}`;
    }
    let username = $(".username").val();
    let _email = $(".email").val();
    let _role = $(".role").val();
    let _auth_lvl = $(".auth_lvl").val();
    let pass = $(".password").val();

    $.ajax({
        url: `/manage/users/create`,
        method: "POST",
        dataType: "json",
        data: {
            name: name,
            username: username,
            email: _email,
            role: _role,
            auth_lvl: _auth_lvl,
            password: pass,
        },
        success: function (response) {
            $(".modal").modal("hide");
            clearFormData(response);
            Swal.fire({
                title: "Good job!",
                text: "Data has been added!",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        },
        error: function (error) {
            console.log(error);

            $.each(error.responseJSON.errors, function (key, value) {
                $("." + key + "Error").html(value);
            });
        },
    });
});

$("body").on("click", ".updateUser", function (e) {
    e.preventDefault();

    let firstname = $(".fname").val();
    let lastname = $(".lname").val();
    let name = "";
    if (firstname !== "" && lastname !== "") {
        name = `${lastname}, ${firstname}`;
    }
    let email = $(".email").val();
    let username = $(".username").val();
    let role = $(".role").val();
    let auth_lvl = $(".auth_lvl").val();

    $.ajax({
        url: `/manage/users/${idEdit}/update`,
        method: "POST",
        dataType: "json",
        data: {
            name: name,
            username: username,
            email: email,
            role: role,
            auth_lvl: auth_lvl,
        },
        success: function (response) {
            console.log(response);
            $(".modal").modal("hide");

            Swal.fire({
                title: "Success!",
                text: "Data has been updated!",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        },
        error: function (error) {
            console.log(error);

            $.each(error.responseJSON.errors, function (key, value) {
                $("." + key + "Error").html(value);
            });
        },
    });
});

$(".btnDelete").on("click", function () {
    let dlt_id = $(this).data("id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/manage/users/${dlt_id}/delete`,
                method: "delete",
                dataType: "json",
                data: {
                    id: dlt_id,
                },
                success: function (response) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Data has been deleted!",
                        icon: "success",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
            // Swal.fire("Deleted!", `${$(this).data("id")}`, "success");
        }
    });
});

$("body").on("click", ".resetBtn", function () {
    $(".reset").modal({
        backdrop: "static",
        keyboard: false,
    });
    $(".reset").modal("show");

    $(".reset_id").val($(this).data("id"));
});

$("#reset").on("click", function (e) {
    e.preventDefault();
    let _id = $(".reset_id").val();
    let password = $(".reset-password").val();

    $.ajax({
        url: `/manage/users/reset-password`,
        method: "POST",
        dataType: "json",
        data: {
            id: _id,
            password: password,
        },
        success: function (response) {
            console.log(response.data);
            Swal.fire({
                title: "Success!",
                text: "Password has been resetted!",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        },
        error: function (error) {
            let len = error.responseJSON.errors;

            // console.log(len.password[0]);

            let error_list = "<ul style='list-style:none; padding: 0%;'>";
            for (let index = 0; index < len.password.length; index++) {
                error_list +=
                    '<li><span class="text-danger text-sm">' +
                    len.password[index] +
                    "</span></li>";
            }
            error_list += "</ul>";
            $(".reset_errors").html(error_list);
        },
    });
});

$(".reset-cancel").on("click", function () {
    $(".reset_id").val("");
    $(".reset-password").val("");
    $(".reset_errors").html("");
});

$("body").on("click", ".cancel", function () {
    $(".fname").val("");
    $(".lname").val("");
    $(".email").val("");
    $(".role").val("");
    $(".auth_lvl").val("");
});

function clearFormData(res) {
    $(".fname").val("");
    $(".lname").val("");
    $(".email").val("");
    $(".role").val("");
    $(".auth_lvl").val("");
    $.each(res.data, function (key) {
        $("." + key + "Error").html("");
    });
}
