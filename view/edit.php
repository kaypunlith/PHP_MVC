<?php
 include('components/header.php');
 include('../controller/PorductController.php');
 ?>

 <div class="container shadow p-5">

    <?php 
 
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        $obj=new PorductController();
        $product=$obj->selectByid($id);
      
        
      }
    
    
    ?>
 <div class="d-flex justify-content-between mt-3">

             <h3>Product</h3>
             <a href="main.php" class="btn btn-danger rounded-0">Back</a>
          </div>
     <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
             <input type="hidden" name="id" value="<?php echo $product['product_id']?>">
             <label for="" class="form-label">product Title</label>
             <input type="text" name="text" value="<?php echo $product['product_title']?>" class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Price</label>
             <input type="number" name="price" value="<?php echo $product['product_price']?>"  class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Qty</label>
             <input type="number" name="qty" value="<?php echo $product['prodcut_qty']?>"  class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Image</label>
             <input type="file" name="image" class="form-control shadow-none">
             <input type="text" name="old_profile" value="<?php echo $product['prodcut_image']?>">

        </div>
        <img width="100px" class="mt-2" height="100px" src="../public/image/<?php echo $product['prodcut_image']?>" alt="">
        <div class="form-button mt-3">
            <button name="update" type="submit" class="btn btn-primary rounded-0">Edit prodcut</button>
            <a href="" class="btn btn-danger rounded-0">Back</a>
        </div>
       
     </form>
     <?php 
      if(isset($_POST['update'])){
          $id=$_POST['id'];
          $title=$_POST['text'];
          $price=$_POST['price'];
          $qty=$_POST['qty'];
          $profile='';
          if(!empty($_FILES['image'])){
               $file_name=$_FILES['image']['name'];
               $file_tmp=$_FILES['image']['tmp_name'];
               $image_dir="../public/image/$file_name";
               move_uploaded_file($file_tmp,$image_dir); 
               $profile=$file_name;
          }
           else{
               $profile=$_POST['old_profile'];
           }
           
          $obj->Update($id,$title,$price,$qty,$profile);
          $_SESSION['success']='success';
      }

     ?>
    
 </div>
<?php include('components/footer.php')?>