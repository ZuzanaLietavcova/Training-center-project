<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once "import-header.php" ?>

</head>
<?php include_once "navbar.php"?>

<!-- Page Content -->

<body>
<div class="container">
  <h1>Edit <?= $project['title'] ?> </h1>
  <hr>
	<div class="row">
                
    <!-- edit form column -->
    <div class="col-md-9 personal-info">
        
      <h3>Team details </h3>
      
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Title:</label>
          <div class="col-lg-8">
            <input class="form-control" id="title" type="text" name="title" value="<?= $project['title']?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Subject:</label>
          <div class="col-lg-8">
            <input class="form-control" id="name" type="text" name="subject" value=<?= $project['subject'] ?>>
          </div>
        </div>
        <div class="form-group">
        	<label class="col-lg-3 control-label">Deadline:</label>
        	<div class='col-md-8'>
            <div class="input-group date">
              <input type="text" class="form-control" id="deadline" name="deadline" value="<?= $project['deadline']?>"/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar">
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" name="project_id" value=<?= $project['project_id'] ?>>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input id="update" type="submit" class="btn btn-primary" value="Save Changes"
              formaction='Controller/ProjectEditController.php' formmethod='post'>
            <span></span>
            <input type="reset" class="btn btn-default" value="Cancel">
          </div>
        </div>                                
      </form>
    </div>
  </div>
</div>

<!-- /.container -->

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

<script>
$(document).ready(function () {
    // DateTime picker for Dates
    $("#startDate").datetimepicker();
});
</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<!---->
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!--<script type="text/javascript" src="js/transition.js"></script>-->
<!--<script type="text/javascript" src="js/collapse.js"></script>-->
<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>

</body>

</html>