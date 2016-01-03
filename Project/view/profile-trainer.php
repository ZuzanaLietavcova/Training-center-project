<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once "import-header.php" ?>

</head>

<body>
<?php include_once "navbar.php"?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $trainer_name?>
            </h1>
            <h3>Current Projects
            </h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row results">

        <?php echo $content ?>

    </div>

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <?php echo $pagination  ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Projects Row -->
    <div class="row text-center">
        <div class="col-lg-12">
            <a href="create-team" class="btn btn-success" role="button">Create new project</a>
        </div>
    </div>


    <hr>

    <!-- Footer -->
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

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
