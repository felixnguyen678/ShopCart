
<!-- # views/layouts/application.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="/assets/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
</head>
<body>
<!--Header-->
<?php
    require_once('header.php');
?>
<div class="container">

    <!--Body Section-->
    <div class="row">
        <!--categories-->
        <?php
        require_once ('categories.php');
        ?>

        <!--products-->
        <?php
        require_once('products.php');
        ?>
        </div>
</div>
<!-- footer -->
<?php
    require_once ('footer.php');
?>
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/shop.js"></script>
</body>
</html>