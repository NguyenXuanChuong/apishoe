<?php
    require_once("Models/product.php");
    require_once(dirname(__FILE__)."/helper.php");

    class Product_Controller
    {
        private $model;
        public function __construct()
        {
            $this->model=new Product();
        }
        public function getAllProduct()
        {
            return $this->model->getAllProduct();
        }
        public function getProductById($product_id)
        {
            if(Helper_Controller::isValuable($product_id))
            {
                return ($this->model->getProductById($product_id));
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
        public function getProductByName($product_name)
        {
            if(Helper_Controller::isValuable($product_name))
            {
                return ($this->model->getProductByName($product_name));
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }

        public function addProduct($data)
        {
            if(Helper_Controller::isValuable($data["name"]) && Helper_Controller::isValuable($data["description"]) && Helper_Controller::isValuable($data["type"]) && Helper_Controller::isValuable($data["price"]) && Helper_Controller::isValuable($data["image_name"]) && Helper_Controller::isValuable($data["count"]))
            {
                if(Helper_Controller::Check_number_string($data["price"]) && Helper_Controller::Check_number_string($data["count"]))
                {
                    return $this->model->addProduct($data);
                }
                return "Lỗi dữ liệu Null hoặc không hợp lệ";
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
        public function deleteProduct($product_id)
        {
            if(Helper_Controller::isValuable($product_id))
            {
                return $this->model->deleteProduct($product_id);
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
    }

?>