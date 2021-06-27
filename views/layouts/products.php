<!--products-->

            <?php
            for ($x = 0; $x <3; $x++) {
                echo ' <div class="row-fluid">
                        <ul class="thumbnails">';
                for($y = 0; $y <3; $y++){
                    echo '<li class="span4">';
                    require ('product_thumbnail.php');
                    echo '</li>';
                }
                echo '</ul></div>';
            }
            ?>