/**
 * Created by nillernoels on 26/12/15.
 */

$(document).ready(function () {
    $("#update").click(function (event) {
        $.ajax({
            type: "PUT",
            url: "http://localhost:8888/Training-center-project/Project/api/projectApi",
            data: {
                title: $("#title").val()
            },
            // Error processing
            error: function (xhr, string) {
                $("#message").html("Error : " + xhr.status
                    + " " + xhr.statusText);
            },
            // Ok processing
            success: function (xml) {
                $("#message").html("Person  <?= $id ?> updated");
            }
        });
    });
});