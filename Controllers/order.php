<?php
    require_once("Models/order.php");
    require_once(dirname(__FILE__)."/helper.php");
    class Order_Controller
    {
        private $model;
        public function __construct()
        {
            $this->model=new Order();
        }
        public function getAllOrder()
        {
            return $this->model->getAllOrder();
        }
        public function getOrderById($order_id)
        {
            if(Helper_Controller::isValuable($order_id))
            {
                return $this->model->getOrderById($order_id);
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
        public function addOrder($data)
        {
            if(Helper_Controller::isValuable($data["user_id"]) && Helper_Controller::isValuable($data["total_money"]) && Helper_Controller::isValuable($data["name"]) && Helper_Controller::isValuable($data["address"]) && Helper_Controller::isValuable($data["phone"]) && Helper_Controller::isValuable($data["email"]))
            {
                if(Helper_Controller::Check_number_string($data["total_money"]) && Helper_Controller::Check_phone_string($data["phone"]) && Helper_Controller::Check_email_string($data["email"]))
                {
                    return $this->model->addOrder($data);
                }
                return "Lỗi dữ liệu Null hoặc không hợp lệ";
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }
        public function deleteOrder($order_id)
        {
            if(Helper_Controller::isValuable($order_id))
            {
                return $this->model->deleteOrder($order_id);
            }
            return "Lỗi dữ liệu Null hoặc không hợp lệ";
        }

}
?>