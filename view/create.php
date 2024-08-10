<?php include('components/header.php')?>
 <div class="container shadow p-5">
    <?php 
       session_start();
       if(isset($_SESSION['error'])=='error'){
           ?>
             <div class="alert text-light bg-danger alert-dismissible fade show" role="alert">
               <strong>Error faile</strong> Please Enter all faile ...
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           <?php
           session_destroy();
       }   
    ?>
 <div class="d-flex justify-content-between mt-3">

             <h3>Product</h3>
             <a href="main.php" class="btn btn-danger rounded-0">Back</a>
          </div>
     <form method="post" enctype="multipart/form-data">
        <div class="form-group">
             <label for="" class="form-label">product Title</label>
             <input type="text" name="text" class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Price</label>
             <input type="number" name="price" class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Qty</label>
             <input type="number" name="qty" class="form-control shadow-none">
        </div>
        <div class="form-group">
             <label for="" class="form-label">product Image</label>
             <input type="file" name="image" class="form-control shadow-none">
        </div>
        <div class="form-button mt-3">
            <button name="save" type="submit" class="btn btn-primary rounded-0">Add prodcut</button>
            <a href="" class="btn btn-danger rounded-0">Back</a>
        </div>
       
     </form>
     <?php 
         if(isset($_POST['save'])){
            include("../controller/PorductController.php");
            $obj=new PorductController();
            $text=$_POST['text'];
            $price=$_POST['price'];
            $qty  =$_POST['qty'];
            $file_name=$_FILES['image']['name'];
            $file_tmp=$_FILES['image']['tmp_name'];
            $image_dir="../public/image/$file_name";
            move_uploaded_file($file_tmp,$image_dir); 
            if(empty($text) && empty($price) && empty($qty)){
               $_SESSION['error']='error';
               header('Location:create.php');
            }else{
               $obj->store($text,$price,$qty,$file_name);
               $_SESSION['success']='success';
               header('Location:main.php');
               
            }
     
         }
       
        
     ?>
 </div>
<?php include('components/footer.php')?>