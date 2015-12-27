/**
 * Created by nillernoels on 26/12/15.
 */

$(document).ready(function () {
    // Get data from server when click on pagination
    $("#page").click(function (event) {
        var page = $(this).find('a.value');
        //console.log(page);
        $.ajax({
            // HTTP mthod
            type: "GET",
            url: "http://localhost:8888/Training-center-project/Project/api/projectApi/trainer-id/1/page/1",
            // return type
            dataType: "json",
            // error processing
            // xhr is the related XMLHttpRequest object
            error: function (xhr, string) {
                var msg = (xhr.status == 404)
                    ? "Person  <?= $id ?> not found"
                    : "Error : " + xhr.status + " " + xhr.statusText;
                $("#message").html(msg);
            },
            // success processing (when 200,201, 204 etc)
            success: function (data) {
                var i = 0;
                console.log(data.currentPage);
                console.log(data.totalProjects);

                $.each(data, function(key, element) {

                    if(i > 3){
                        return;
                    }
                });
                //$(".results").val(data.title);
                //$("#message").html("Person <?= $id ?> loaded")
            }
        });
    });
})