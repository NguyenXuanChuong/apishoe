<?php
require_once("Database/connection.php");
require_once(dirname(__FILE__)."/helper.php");

class Product{
    private $con;
    public function __construct()
    {
        $temp=new DBConnection();
        $this->con=$temp->Connection();
    }
    function getAllProduct(){
        try{
            $sql = "SELECT * FROM products";
            $temp=$this->con->prepare($sql);
            $temp->execute();
            $list = $temp->fetchAll(PDO::FETCH_BOTH);
            Helper::Disconnection($this->con);

            return $list;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
    function getProductById($product_id){
        try{
            $sql = "SELECT * FROM products P JOIN product_detail PD on P.product_id = PD.product_id WHERE P.product_id=:product_id";

            $temp=$this->con->prepare($sql);
            $temp->bindParam('product_id',$product_id,PDO::PARAM_STR);
            $temp->execute();
            $list = $temp->fetchAll(PDO::FETCH_BOTH);
            Helper::Disconnection($this->con);
//            $result = [0=> ['product_name'=>'','product_detail_id'=>'','product_name'=>'','type'=>'',]];

//            echo json_encode($list);
//            die();
//            echo "<pre>";
//            print_r($list);
//            die();
            return $list;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
    function getProductByName($product_name){
        try{
            $sql = "SELECT * FROM products P JOIN product_detail PD on P.product_id = PD.product_id WHERE P.product_name=:product_name";

            $temp=$this->con->prepare($sql);
            $temp->bindParam('product_name',$product_name,PDO::PARAM_STR);
            $temp->execute();
            $list = $temp->fetchAll(PDO::FETCH_BOTH);
            Helper::Disconnection($this->con);
//            $result = [0=> ['product_name'=>'','product_detail_id'=>'','product_name'=>'','type'=>'',]];

//            echo json_encode($list);
//            die();
//            echo "<pre>";
//            print_r($list);
//            die();
            return $list;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
    /* data = object(
     *       name
     *       description
     *       type
     *       price
     *       image_name
     *       count
     *       product = array(
     *          0 => { size, color,count}
     *          1 => { size, color,count}
     *
     *          )
     *      )
     */
    function  addProduct($data){
        $productId = -1;
        $name = $data['name'];
        $description = $data['description'];
        $type = $data['type'];
        $price = $data['price'];
        $image_name = $data['image_name'];
        $count = $data['count'];
        $created_day    = Date('Y-m-d H:i:s');
        try
        {
            $sqlProduct = "INSERT INTO products (product_name,description,type,price,created_day,image_name,count)". "VALUES ( '$name','$description','$type','$price','$created_day','$image_name','$count')";
            $temp=$this->con->prepare($sqlProduct);
            $temp->execute();
        }
         catch(Exception $e)
        {
            return $e->getMessage();
        }

        try
        {
            $sqlSelect = "SELECT * FROM products WHERE created_day=:created_day AND product_name=:name";
            $temp1=$this->con->prepare($sqlSelect);
            $temp1->bindParam('created_day',$created_day);
            $temp1->bindParam('name',$name);
            $temp1->execute();
            //lấy product_id từ temp1;
            $list = $temp1->fetchAll(PDO::FETCH_BOTH);

            $productId = $list[0]['product_id'];
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }

        //lấy danh sách product cùng mã product_id nhưng khác nhau về màu sắc,size....    
        $listProductDetail = $data['product_detail'];

        foreach ($listProductDetail as $item){
            $size = $item['0'];
            $color = $item['1'];
            $countDetail = $item['2'];
            try
            {
                $sqlProductDetail = "INSERT INTO product_detail (product_id,size,color,count)"."VALUES ('$productId','$size','$color','$countDetail')";
                $temp2 = $this->con->prepare($sqlProductDetail);
                $temp2->execute();
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
           
        }

    }

    function deleteProduct($product_id){
        try{
            $sql = "DELETE  FROM products WHERE product_id=:product_id";

            $temp=$this->con->prepare($sql);
            $temp->bindParam('product_id',$product_id);
            $temp->excute();
            
            Helper::Disconnection($this->con);
            return "Xóa thành công";
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }
}
?>