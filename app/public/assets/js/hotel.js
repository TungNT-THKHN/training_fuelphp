$(document).ready(function () {
    $(".btn-delete").on('click', function () {
        let id = $(this).siblings("input[name=id]").val();

        $.ajax({
            url: "/hotel/delete/" + id,
            type: "POST",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = "/hotel/index";
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert("Error!");
            }
        });
    });
});
