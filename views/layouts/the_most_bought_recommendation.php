
<a class="shopBtn btn-block" href="#">Các sản phẩm bán chạy nhất <br><small>Click để xem</small></a>
<br>
<br>
<ul class="nav nav-list promowrapper">
    <?php
    for($x = 0; $x<2; $x++){
        echo '<li>';
        require ('product_thumbnail.php');
        echo '</li>';
    }
    ?>
</ul>