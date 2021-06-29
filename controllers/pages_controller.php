

<?php
# controllers/pages_controller.php
require_once('controllers/base_controller.php');
require_once ('controllers/layouts_controller.php');

class PagesController extends BaseController
{
    private $app_path = 'views/application.php';
    public function __construct()
    {
        $this->folder = 'pages';
    }
    public function home()
    {
        $layoutsController = new LayoutsController();
        $GUI_data = array(
            'sidebar' => $layoutsController->sidebar(),
            'products' => $layoutsController->allProducts()
        );
        $content = $this->render('home', $GUI_data);
        require_once ($this->app_path);
    }

    public function products(){

        if (isset($_GET['category'])) {
            $layoutsController = new LayoutsController();
            $GUI_data = array(
                'sidebar' => $layoutsController->sidebar(),
                'products' => $layoutsController->categoryProduct()
            );
            $content = $this->render('products', $GUI_data);
            require_once($this->app_path);
        }else{
            $this->error();
        }
    }
    public function product_details(){
        if( isset($_GET['product'])){
            $layoutsController = new LayoutsController();
            $GUI_data = array(
                'sidebar' => $layoutsController->sidebar(),
                'product_details' => $layoutsController->productDetails()
            );
            $content = $this->render('product_details', $GUI_data);
            require_once($this->app_path);
        }
        else{
            $this->error();
        }
    }
    public function login(){
        $layoutsController = new LayoutsController();
        $GUI_data = array(
            'login_form' => $layoutsController->loginForm()
        );
        $content = $this->render('login', $GUI_data);
        require_once($this->app_path);
    }

    public function error()
    {
        $content = $this->render('error');
        require_once ($this->app_path);
    }
}