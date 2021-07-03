
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
    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/ico/favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?= @$content?>
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/shop.js"></script>
</body>
</html>