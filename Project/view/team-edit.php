<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once "import-header.php" ?>


</head>
<body>
    <?php include_once "navbar.php"?>
    <br><br>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4 custom-table">
                <h3>Available Students</h3>
                <ul class="list-group connectedSortable custom-ul" id="sortable1">
                    <?php echo $table1; ?>
                </ul>
            </div>
            <div class="col-xs-6 col-md-4 custom-table ">
                <h3>Students in team <?php echo $id;?></h3>
                <ul class="list-group connectedSortable custom-ul" id="sortable2">
                    <?php echo $table2; ?>
                </ul>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $(function () {
                $("#sortable1, #sortable2").sortable({
                    connectWith: ".connectedSortable"
                }).disableSelection();
            });
            $("#sortable1").sortable({
                receive: function(e, ui) {
                    console.log("ajax " + ui.item.attr('id'));
                    $.ajax({
                        type: "DELETE",
                        url: "http://localhost:8888/Training-center-project/Project/api/TeamApi.php",
                        data: {
                            team_id: <?php echo $teamId ?>,
                            student_id: ui.item.attr('id')
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
                }
            });
            $("#sortable2").sortable({
                receive: function(e, ui) {
                    console.log("ajax " + ui.item.attr('id'));
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8888/Training-center-project/Project/api/TeamApi.php",
                        data: {
                            team_id: <?php echo $teamId ?>,
                            student_id: ui.item.attr('id')
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
                }

            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#update").click(function (event) {
                console.log($("#title").val());
                // authenticate
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
    </script>


</body>

</html>