<div class="container mt-3">
  <div class="row">
    <div class="col-12">
      <h4 class="text-center">List Product </h4>
         </div>
    <div class="col-12">
      <a class="btn btn-primary btn-sm" href="<?= base_url('product/add') ?>">Add Product</a>
      </div>
      <div class="col-12">
      <?php if (session()->getFlashdata('success')): ?> <div class="alert-success text-center mt-3 py-2">
          <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        <?php if (! $product): ?>
        <div class="alert-danger text-center mt-3 py-3">
          Product Not Found
          </div>
        <?php else: ?>

         <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
         	<?php foreach($product as $key => $val): ?>
			  <tr>
              <th scope="row"><?= $key + 1 ?></th>
              <td><?= $val['name'] ?></td>
              <td>
                <a href="<?= base_url('product/detail/'.$val['id']) ?>" class="btn btn-sm btn-info mt-2">Detail</a>
                <a href="<?= base_url('product/edit/'.$val['id']) ?>" class="btn btn-sm btn-primary mt-2">Edit</a>
                <a href="#" id="btn-remove" class="btn btn-sm btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#removeProduct" data-idp="<?= $val['id'] ?>" data-namep="<?= $val['name'] ?>">Remove</a>
                </td>
              
              </tr>
			  <?php endforeach;  ?>
       </tbody>
    </table>

  </div>
    <?php
  $previous = $page - 1;
  $next = $page + 1;
  
  ?>

</button>
  <div class="col-12">
  <div id="pagination" class="container">
   <?php if($page > 1 && $page <= $total_page): ?>
 <div class="pagination-left">
 <a class="page-link" href="?page=<?= $previous ?>"; } ?>Previous</a>
 </div>
 <?php endif; ?>
 
   <?php if($page >= 1 && $page < $total_page): ?>
 <div class="pagination-left">
 <a class="page-link" href="?page=<?= $next ?>">Next</a>
 </div>
 <?php endif; ?>

</div>
</div>
  </div>
  </div>
  
  <?php endif; ?>
  
<!-- Modal -->
<div class="modal fade" id="removeProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('product/remove') ?>" method="POST">
      
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">What You Remove Product <b id="namep"></b>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <input type="hidden" id="idproduct" name="idproduct">
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Remove</button>
      </div>
    </div>
    </form>
  </div>
</div>