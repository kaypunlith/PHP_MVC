<?php 
   include("../model/product.php");
   include("../handle/Redirect.php");
 class PorductController{
    public function store($text,$price,$qty,$image){
       $pro=new Product();
       $pro->text=$text;
       $pro->price=$price;
       $pro->qty=$qty;
       $pro->image=$image;
       $pro->save();
       return Redirect("main.php");
    }   
    public function index(){
      $pro=new Product();
      $allproduct=$pro->all();
      return $allproduct;
    }
    public function Delete($id){
        $pro=new Product();
        $pro->setid($id);
        //delete image form database
        $row=$pro->edit($id); //select data and finde image for compar
        $image=$row['prodcut_image'];
        $image_dir="../public/image/$image";
        if(file_exists($image_dir)){  
          unlink($image_dir);
        }
        $pro->distroy();
        return Redirect("main.php");

    }
    public function selectByid($id){
        $pro=new Product();
        $data=$pro->edit($id);
        return $data;
    }
    public function Update($id,$text,$price,$qty,$profile){
        $pro=new Product();
        $pro->text=$text;
        $pro->price=$price;
        $pro->qty=$qty;
        $pro->image=$profile;
        $pro->setid($id);
        $pro->Update();
         return Redirect("main.php");

    }
  }
?>