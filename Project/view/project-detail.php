<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once "import-header.php" ?>

</head>
<?php include_once "navbar.php"?>

<!-- Page Content -->
<div class="container">

	 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<?php echo $project['title'] ?>
            </h1>
        </div>
    </div>

    <!-- Project Details -->
    <div class="row">
    	<div class="col-md-2">
      		Subject
    	</div>
		<div class="col-md-4">
			<?php echo $project['subject'] ?>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Creation time
    	</div>
		<div class="col-md-4">
			<?php echo $project['creation_time'] ?>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Deadline
    	</div>
		<div class="col-md-4">
			<?php echo $project['deadline'] ?>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Trainer
    	</div>
		<div class="col-md-4">
			<a href="trainer-id-<?= $project['trainer_id'] ?>"> <?php echo $project['trainer'] ?> </a>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Class
    	</div>
		<div class="col-md-4">
			<?php echo $project['class'] ?>
		</div>
	</div>
	<p>	
		<div class="row">
    		<div class="col-md-2">
      			Teams
    		</div>
			<div class="col-md-4">
				<p>	<?= $content ?> </p>
			</div>
		</div>
	</p>
	<p>
		<div class="row">
    		<div class="col-md-2">
      			Students not in a team
    		</div>
			<div class="col-md-4">
				<p>	<?= $content_students ?> </p>
			</div>
		</div>
	</p>
	<?= $edit_button ?>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>