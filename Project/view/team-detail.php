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
            	Team <?php echo $team['team_id'] ?>
            </h1>
        </div>
    </div>

    <!-- Project Details -->
    <div class="row">
    	<div class="col-md-2">
      		Summary
    	</div>
		<div class="col-md-4">
			<?php echo $team['summary'] ?>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Creation time
    	</div>
		<div class="col-md-4">
			<?php echo $team['creation_time'] ?>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Project
    	</div>
		<div class="col-md-4">
			<a href="project-id-<?= $team['project_id'] ?>"> <?php echo $team['project'] ?> </a>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-2">
      		Creator
    	</div>
		<div class="col-md-4">
			<a href="student-id/<?= $team['creator_id'] ?>"> <?php echo $team['creator'] ?> </a>
		</div>
	</div>
	<p>
		<div class="row">
    		<div class="col-md-2">
      			Members
    		</div>
			<div class="col-md-4">
				<p>	<?= $content ?> </p>
			</div>
		</div>
	</p>
	<?= $edit_button ?>

	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Copyright &copy; Zuzana & Niels 2015/2016</p>
			</div>
		</div>
		<!-- /.row -->
	</footer>
</div>
<!-- /.container -->


</body>

</html>