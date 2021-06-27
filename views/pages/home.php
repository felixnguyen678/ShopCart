
<!--Header-->
<?php
require_once('views/layouts/header.php');
?>

<!--Body Section-->
<div class="container"  >
    <div class="row">
        <!--sidebar-->
        <?php
        echo $sidebar;
        ?>


        <div class="span9">

            <?php
            require_once ('views/layouts/banner.php');
                ## products
            echo $products;
            ?>

        </div>

    </div>
</div>

<!-- footer -->
<?php
require_once('views/layouts/footer.php');
?>