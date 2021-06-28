<!--products-->

            <?php
            $product_index = 0;
            $current_page = 1;
            for ($x = 0; $x <3; $x++) {
                echo ' <div class="row-fluid">
                        <ul class="thumbnails">';
                for($y = 0; $y <3; $y++){
                    echo '<li class="span4">';
                    $product_data = $model_data[$product_index];
                    require ('product_thumbnail.php');
                    echo '</li>';
                    $product_index++;
                    if($product_index >= count($model_data))
                        break;
                }
                echo '</ul></div>';
                if($product_index >= count($model_data))
                    break;
            }
            ?>