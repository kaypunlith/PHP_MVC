<?php 
  include('../database/Database.php');
  class Product extends Database{
      private $id;
      public $text;
      public $price;
      public $qty;
      public $image;
      public function setid($id){
       $this->id=$id;
      }
      public function save(){
        $sql="INSERT INTO `products`(`product_title`, `product_price`,`prodcut_qty`,`prodcut_image`) 
        VALUES ('{$this->text}','{$this->price}','{$this->qty}','{$this->image}')";
        mysqli_query($this->conn,$sql);
      }
      public function all(){
          $sql="SELECT * FROM `products` ORDER BY product_id DESC";
          $result=mysqli_query($this->conn,$sql);
          $data=[];
          while($row=$result->fetch_array()){
            $data[]=[
              'product_id'=>$row[0],
              'product_title'=>$row[1],
              'product_price'=>$row[2],
              'product_qty'=>$row[3],
              'product_image'=>$row[4]
            ];
          }
          return $data;

      }
      public function distroy(){
        $sql="DELETE FROM `products` WHERE `product_id`={$this->id}" ;
        mysqli_query($this->conn,$sql);
          
      }
      public function edit($id){
          $sql="SELECT * FROM `products` WHERE  `product_id`=$id";
          $result=mysqli_query($this->conn,$sql);
          $row=$result->fetch_array();
          return $row;
      }
      public function Update(){
        $sql="UPDATE `products` SET `product_title`='{$this->text}',`product_price`='{$this->price}',`prodcut_qty`='{$this->qty}',`prodcut_image`='{$this->image}' WHERE `product_id`={$this->id}";
        mysqli_query($this->conn,$sql);
      }
  }

?>