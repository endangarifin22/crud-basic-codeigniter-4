<?php
/**
 * Add New Undangan
 * @Packpage Undangan
 **/
 
 ?>
 <div class="container">
   <div class="row">
     <div class="col-12">
   <h4>Tambah Undangan Pernikahan Baru</h2>
  <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

  <div class="form-group mt-3">
    <label>Name
      </label>
      <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>" required>
    </div>
    
  <div class="form-group mt-3">
    <label>Thumbnail
      </label>
      <input type="file" class="form-control" name="thumbnail" accept="image/*" value="<?= set_value('thumbnail') ?>" required>
    </div>
  <div class="form-group mt-3">
    <label>Description
      </label>
      <textarea class="form-control" name="description"><?= set_value('description') ?></textarea>
    </div>

    <div class="mt-3">
    <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
    </form>
   </div>
   </div>
   </div>
   