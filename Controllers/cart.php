<?php
    require_once("Models/cart.php");
    require_once(dirname(__FILE__)."/helper.php");
    class Cart_Controller
    {
        private $model;
        public function __construct()
        {
            $this->model=new Cart(); 
        }
        public function getCartByUserId($user_id)
        {
            if(Helper_Controller::isValuable($user_id))
            {
                return $this->model->getCartByUserId($user_id);
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
        public function addOneProductToCart($data)
        {
//            die('1234');
            $product_detail_id =$data["product_detail_id"];
            $user_id = $data["user_id"];
//            echo $product_detail_id;
//            die();
            if(Helper_Controller::isValuable($product_detail_id) && Helper_Controller::isValuable($user_id))
            {

                return $this->model->addOneProductToCart($data);
            }
            else
            {
                return "Lỗi dữ liệu Null hoặc không hợp lệ";
            }
//            $this->model->addOneProductToCart($data);
        }
        public function deleteCarts($data)
        {
            if(Helper_Controller::isValuable($data["user_id"]) && Helper_Controller::isValuable($data["product_detail_id"]))
            {
                return $this->model->deleteCarts($data);
            }
            else
            {
                return "Lỗi dữ liệu Null hoặc không hợp lệ";
            }
        }
    }
?>