<?php
# components_controller
require_once('controllers/base_controller.php');

class ComponentsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'components';
    }
    public function header(){}
    public function banner(){}
    public function categories(){}
    public function the_most_bought_recommendation(){}
    public function products(){}
    public function footer(){}
}