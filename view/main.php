<?php 
include('components/header.php');
include('../handle/Model.php');
?>

    <div class="container mt-3">
    <?php 
       session_start();
       if(isset($_SESSION['success'])=='success'){
           ?>
             <div class="alert text-light bg-success alert-dismissible fade show" role="alert">
               <strong>Input success</strong>You added product successfully
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           <?php
           session_destroy();
       }else if(isset($_SESSION['delete'])=='delete'){
         ?>
         <div class="alert text-light bg-success alert-dismissible fade show" role="alert">
           <strong>Delete success</strong>You Delte product successfully
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
       <?php
         session_destroy();
       }   
      
    ?>
          <div class="d-flex justify-content-between mt-3">
             <h3>Product</h3>
             <a href="create.php" class="btn btn-primary rounded-0">Add product</a>
          </div>
         <?php ModelDetelete()?>
        
          <table class="table mt-3 align-middle">
              <tr class="table table-dark">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th class="text-center">Action</th>
              </tr>
             
              <?php 
              include("../controller/PorductController.php");
              $control=new PorductController();
             $products=$control->index();
               foreach($products as $pro){
                  ?>
                  <tr>
                  <td><?php echo $pro['product_id']?></td>
                  <td>
                    <img src="../public/image/<?php echo $pro['product_image']?>" width="80px" style="border:2px solid gray;object-fit:cover" height="80px" alt="">
                  </td>
                  <td><?php echo $pro['product_title']?></td>
                  <td><?php echo $pro['product_price']?> $</td>
                  <td><?php echo $pro['product_qty']?> in stock</td>
                  <td class="text-center">
                      <a href="edit.php?id=<?php echo $pro['product_id'] ?>" class="btn btn-success rounded-0">Edit</a>
                      <button onclick="DeleteProduct(<?php echo $pro['product_id']?>)" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#Model_del">Delete</button>
                  </td>
                </tr>
                <?php 
               }
          ?>
          </table>
          <?php 
             if(isset($_POST['delete_yes'])){
                $id=$_POST['product_id'];
                $control->Delete($id);
                $_SESSION['delete']='delete';
             }
          ?>
         
    </div>
   
<?php include('components/footer.php')?>