<?php

echo '<div class="thumbnail">
    <a href="/index.php?controller=pages&action=product_details&product='.$product_data->getId().'" class="overlay"></a>
    <a class="zoomTool" href="/index.php?controller=pages&action=product_details&product=<?= @$product_data->getId() ?>" title="add to cart">
        <span class="icon-search"></span> QUICK VIEW</a>

        <a href="/index.php?controller=pages&action=product_details&product='.$product_data->getId().'"><img src="assets/img/'./*$product_data->getImages()[0]*/'sp1_1.jpg'.'" alt=""></a>
    

    <div class="caption cntr">
        <p><strong>'.$product_data->getName().'></strong></p>
        <p><strong>'.$product_data->getPrice().' VNĐ </strong></p>
        <h4><a class="shopBtn" href="/index.php?controller=pages&action=product_details&product=<?= @$product_data->getId() ?>" title="add to cart"> Add to cart </a></h4>
    </div>
</div>';