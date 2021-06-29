
<!--Header-->
<?php
require_once('views/layouts/header.php');
?>

<!--Body Section-->
<div class="container"  >
    <div class="row">
        <!--sidebar-->
        <?php
        echo $GUI_data['sidebar'];
        ?>


        <div class="span9">
            <?php
            echo $GUI_data['product_details'];
            ?>

        </div>

    </div>
</div>

<!-- footer -->
<?php
require_once('views/layouts/footer.php');
?>