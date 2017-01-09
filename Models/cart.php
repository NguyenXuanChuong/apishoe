<?php
require_once("Database/connection.php");
require_once(dirname(__FILE__).'/helper.php');
class Cart{
    private $con;
    public function __construct()
    {
        $temp=new DBConnection();
        $this->con=$temp->Connection();
    }

    function getCartByUserId($user_id){

        try{
            $sql = "SELECT  P.product_name,PD.product_detail_id,P.description,PD.size,PD.color,P.price,C.count,P.image_name FROM carts C JOIN product_detail PD on C.product_detail_id = PD.product_detail_id JOIN products P on P.product_id = PD.product_id WHERE user_id=:user_id";
//            $sql = "SELECT * FROM carts";
            $temp = $this->con->prepare($sql);
            $temp->bindParam('user_id',$user_id,PDO::PARAM_STR);
            $temp->execute();
            $list = $temp->fetchAll(PDO::FETCH_BOTH);
            Helper::Disconnection($this->con);

            return $list;
        }
        catch (Exception $e){

            return $e->getMessage();
        }
    }
    function  addOneProductToCart($data){

        $product_detail_id = $data['product_detail_id'];
        $user_id = $data['user_id'];

        try
        {
            $select = 'SELECT * FROM carts WHERE user_id=:user_id AND product_detail_id=:product_detail_id';
            $temp=$this->con->prepare($select);
            $temp->bindParam('user_id',$user_id,PDO::PARAM_STR);
            $temp->bindParam('product_detail_id',$product_detail_id,PDO::PARAM_STR);
            $temp->execute();
            $list = $temp->fetchAll(PDO::FETCH_BOTH);


            if(count($list) == 0){
                try
                {
                    $sql = "INSERT INTO carts (product_detail_id,count,user_id)". "VALUES ( '$product_detail_id','1','$user_id')";
                    $temp1 = $this->con->prepare($sql);
                    $temp1->execute();
                    Helper::Disconnection($this->con);
                    return 1;
                }
                catch(Exception $e)
                {
                    return $e->getMessage();
                }
                
            }
            else{
                //cần chỉnh sửa param của count
                try
                {
                    $numcount = $list['0']['count'] + 1;

                    $sql = "UPDATE carts SET count=:numcount WHERE user_id=:user_id AND product_detail_id=:product_detail_id";
                    $temp1 = $this->con->prepare($sql);
                    $temp1->bindParam('numcount',$numcount,PDO::PARAM_INT);
                    $temp1->bindParam('user_id',$user_id,PDO::PARAM_STR);
                    $temp1->bindParam('product_detail_id',$product_detail_id,PDO::PARAM_STR);

                    $temp1->execute();
                    Helper::Disconnection($this->con);
                    return 1;
                }
                catch(Exception $e)
                {
                    return $e->getMessage();
                }
                
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
       
    }

    function deleteCarts($data){
        $user_id=$data["user_id"];
        $product_detail_id=$data["product_detail_id"];
        try{
            $sql = "DELETE  FROM carts WHERE user_id=:user_id AND product_detail_id=:product_detail_id ";

            $temp=$this->con->prepare($sql);
            $temp->bindParam('user_id',$user_id,PDO::PARAM_INT);
            $temp->bindParam('product_detail_id',$product_detail_id,PDO::PARAM_INT);
            $temp->execute();
            return "Xóa thành công";
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
}
?>