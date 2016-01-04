<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Nice page">
    <meta name="author" content="Zuzana - Niels">

    <title>Signin Template for Bootstrap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="../js/jquery.bootpag.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

        <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <form action="login" class="form-signin" method="POST">
        <?= $error ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">User-id</label>
        <input type="text" id="inputEmail" name="user-id" class="form-control" placeholder="User-ID" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="p_wd" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is-trainer" value="true"> I am trainer
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

</body>
</html>



