$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".department").select2();

$(".tsrf").on("input", function (value) {
    this.value = this.value
        .replace(/[^0-9.]/g, "")
        .replace(/(\..*?)\..*/g, "$1");
});

$(".saveReport").on("click", function () {
    let tsrf_no = $(".tsrf").val();
    let department = $(".department").val();
    let reported_by = $(".reportedBy").val();
    let date_reported = $(".dateReported").val();
    let equipment_no = $(".equipment_no").val();
    let date_purchased = $(".date_purchased").val();
    let problem_findings = $(".findings").val();
    let work_done = $(".work_done").val();
    let user_signed = $(".user_signed").val();
    let tod = $(".tod").val();
    let recommendation = $(".recommendation").val();
    let date_signed = $(".date_signed").val();
    let problem_reported = $('input[type="checkbox"]:checked')
        .map(function () {
            return $(this).val();
        })
        .get()
        .join(",");

    $.ajax({
        url: `/tech_reports/report/store`,
        method: "POST",
        dataType: "json",
        data: {
            tsrf_no: tsrf_no,
            department: department,
            reportedBy: reported_by,
            dateReported: date_reported,
            problemReported: problem_reported,
            equipmentNo: equipment_no,
            datePurchase: date_purchased,
            problemFindings: problem_findings,
            workDone: work_done,
            recommendation: recommendation,
            userSigned: user_signed,
            technician: tod,
            dateSigned: date_signed,
        },
        success: function (response) {
            $(".department").val("").trigger("change");
            $(".tod").val("").trigger("change");
            $(".dateReported").val("");
            $(".date_signed").val("");
            $(".tsrf_noError").html("");
            $(".tsrf").val("");
            $(".reportedBy").val("");
            $(".dateReported").val("");
            $(".equipment_no").val("");
            $(".date_purchased").val("");
            $(".findings").val("");
            $(".work_done").val("");
            $(".user_signed").val("");
            $(".recommendation").val("");
            $('input[type="checkbox"]:checked').removeAttr("checked");

            $.each(response.data, function (key, value) {
                $("." + key + "Error").html("");
            });

            Swal.fire(
                `${response.reference_no}`,
                "Generated Reference No.",
                "success"
            );

            console.log(response);
        },
        error: function (error) {
            $.each(error.responseJSON.errors, function (key, value) {
                console.log(key + "-" + value);
                $("." + key + "Error").html(value);
            });
        },
    });
});
