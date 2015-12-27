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
            <h1 class="page-header">Current Projects
            </h1>
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

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Zuzanna & Niels 2015/2016</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#results").load("http://localhost:8888/Training-center-project/Project/api/projectApi/trainer-id/1");  //initial page number to load
        $(".pagination").bootpag({
            total: <?php echo $pages; ?>, // total number of pages
            page: 1, //initial page
            maxVisible: 5 //maximum visible links
        }).on("page", function(e, num){
            e.preventDefault();
            $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
            $("#results").load("fetch_pages.php", {'page':num});
        });
    });
</script>

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
