<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once "import-header.php" ?>


</head>
<body>
    <?php include_once "navbar.php"?>
    <!-- Page Content -->
    <div class="container">
        <div class="row ">
            <h1>Edit Team </h1>
        </div>
        <div class="row">
            <div class="form-group col-md-8 ">
                <h3>Summary</h3>
                <textarea class="form-control" id="summary-text" rows="5"><?= $summary ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="msgUpdate" class="alert alert-success hidden" role="alert">Summary has been updated</div>
                <button id="update-summary" class="btn btn-success btn-lg">Update Summary</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <p>Drag & drop the students below, to change the team members:</p>
            <div class="col-xs-6 col-md-4 custom-table ">
                <h3>Available Students</h3>
                <ul class="list-group connectedSortable custom-ul" id="sortable1">
                    <?= $table1 ?>
                </ul>
            </div>
            <div class="col-xs-6 col-md-4 custom-table ">
                <h3>Students in team <?= $teamId ?></h3>
                <ul class="list-group connectedSortable custom-ul" id="sortable2">
                    <?= $table2 ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            $("#update-summary").click(function(event){
                $summary = $('#summary-text').val();
                if($summary != "" && $summary != null){
                    $.ajax({
                        type: "PUT",
                        url: "http://localhost:8888/Training-center-project/Project/api/TeamApi.php",
                        data: {
                            summary: $summary,
                            team_id: <?= $teamId ?>
                        },
                        // Error processing
                        error: function (xhr, string) {
                            $("#msgUpdate").html("Error : " + xhr.status
                                + " " + xhr.statusText);
                        },
                        // Ok processing
                        success: function (xml) {
                            $("#msgUpdate").html("Summary has been updated");
                            $("#msgUpdate").removeClass("hidden");
                            setTimeout(function() { $("#msgUpdate").addClass("hidden"); }, 1500);
                        }
                    });
                }
                else{
                    alert("Summary is empty");
                }
            });
        });
    </script>


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
                            team_id: <?= $teamId ?>,
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
                            team_id: <?= $teamId ?>,
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

</body>

</html>