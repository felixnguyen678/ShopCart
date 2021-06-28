<div class="thumbnail">
    <a href="product_details.html" class="overlay"></a>
    <a class="zoomTool" href="product_details.html" title="add to cart">
        <span class="icon-search"></span> QUICK VIEW</a>
    <?php
        echo ' <a href="product_details.html"><img src="assets/img/'./*$product_data->getImages()[0]*/'sp1.jpg'.'" alt=""></a>'
    ?>

    <div class="caption cntr">
        <p><strong><?= @$product_data->getName() ?></strong></p>
        <p><strong>$<?= @$product_data->getPrice() ?></strong></p>
        <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
    </div>
</div>