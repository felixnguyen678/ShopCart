
<?php

echo '<div class="thumbnail">
    <a href="/index.php?controller=pages&action=product_details&product='.$product_data->getId().'" class="overlay"></a>
    <a class="zoomTool" href="/index.php?controller=pages&action=product_details&product='.$product_data->getId().'" title="add to cart">
        <span class="icon-search"></span> QUICK VIEW</a>

        <a href="/index.php?controller=pages&action=product_details&product='.$product_data->getId().'"><img src="assets/img/'./*$product_data->getImages()[0]*/'sp1_1.jpg'.'" alt=""></a>
    

    <div class="caption cntr">
        <p><strong>'.$product_data->getName().'</strong></p>
        <p><strong>'.$product_data->getPrice(). ' VNĐ </strong></p>
        <form action="/controllers/add_product_to_cart.php" method="POST">
            <input type="hidden" name="id" value="' .$product_data->getId().'">
            <input type="hidden" name="name" value="'.$product_data->getName().'">
            <input type="hidden" name="image" value="'.$product_data->getImages()[0].'">
            <input type="hidden" name="price" value="'.$product_data->getPrice().'">
            <input type="submit" value="Add TO CART" class="addCart" >
        </form>
        
    </div>
</div>

';
        ?>




