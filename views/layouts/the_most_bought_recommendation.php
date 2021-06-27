
<a class="shopBtn btn-block" href="#">BÊN DƯỚI LÀ CÁC SẢN PHẨM BÁN CHẠY NHẤT <br><small>Click để xem thêm</small></a>
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