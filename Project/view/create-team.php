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
        <h1>Create a new team </h1>
    </div>
    <div class="row">
        <div class="form-group col-md-8 ">
            <form method="POST" action="create-team">
                <div class="form-group">
                    <label>Summary</label>
                    <input class="form-control" type="text" name="summary" placeholder="write an optional summary">
                </div>
                <div class="form-group">
                    <label>Choose project</label>
                    <select class="form-control" name="project_id">
                        <option value="" selected disabled>Please select</option>
                        <?= $projects ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block btn-lg" type="submit">Create new Team</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row custom-bottom-margin">
        <hr>
        <a href="home-student"><button type="button" class="btn btn-default btn-lg" aria-label="Left Align">
                Go back to home
            </button></a>
    </div>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Zuzana & Niels 2015/2016</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>
</div>

<script>
    $( document ).ready(function() {
        $(function () {
            $("#sortable1, #sortable2").sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        });
    });
</script>

</body>

</html>