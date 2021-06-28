<?php
# components_controller
require_once('controllers/base_controller.php');
require_once('models/product.php');

class LayoutsController extends BaseController
{

    public function __construct()
    {
        $this->folder = 'layouts';
    }
    public function sidebar(){
        $recommendation = array(
            'the_most_bought_recommendation' => $this->the_most_bought_recommendation()
        );
        return $this->render('sidebar', $recommendation);
    }
    public function the_most_bought_recommendation(){
        // con sua lai
        return $this->render('the_most_bought_recommendation');
    }
    public function allProducts(){
        $products_data = Product::findAll();
        return $this->render('products',array(), $products_data);
    }
    public function categoryProduct(){
        $products_data = Product::findByCategory($_GET['category']);
        return $this->render('products',array(), $products_data);
    }
}