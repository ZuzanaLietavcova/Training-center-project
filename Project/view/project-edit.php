<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once "import-header.php" ?>

</head>
<?php include_once "navbar.php"?>

<!-- Page Content -->

<div class="container">
    <h1>Edit Team <?= $project['project_id'] ?> </h1>
  	<hr>
	<div class="row">
                
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Team details </h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Title:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=<?= $project['title'] ?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Subject:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=<?= $project['subject'] ?>>
            </div>
          </div>
          <div class="form-group">
          		<label class="col-lg-3 control-label">Deadline:</label>
          		<div class='col-md-8'>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          </div>
          <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</div>

<!-- /.container -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/moment.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/transition.js"></script>
<script type="text/javascript" src="../js/collapse.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>

</body>

</html>