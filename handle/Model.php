<?php 

 function ModelDetelete(){
    ?>
    <!-- Button trigger modal -->
    

        <!-- Modal -->
        <div class="modal fade" id="Model_del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="product_id" value=""class="product_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="delete_yes" class="btn btn-primary">Yes</button>
                </div>
                </div>
                
            </form>
        </div>
</div>
    <?php
 }
?>