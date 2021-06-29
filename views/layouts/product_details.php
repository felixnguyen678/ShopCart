<div class="well well-small">
    <div class="row-fluid">
        <div class="span5">
            <div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                    <?php
                    for($i= 0; $i<count($model_data->getImages()); $i++){
                        echo '<div class="item';
                        if($i==0)
                            echo ' active';
                        echo '">
                              <a href="#"> <img src="assets/img/'.$model_data->getImages()[0].'" alt="" style="width:100%"></a>
                              </div>';
                    }
                    ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
        </div>
        <div class="span7">
            <h3><?= @$model_data->getName() ?></h3>
            <hr class="soft"/>
                <p><?= @$model_data->getDescription() ?>
                </p>
                    <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
            </form>
        </div>
    </div>
    <hr class="softn clr"/>
</div>
