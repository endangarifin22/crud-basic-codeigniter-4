 <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-8">
   <h4>Tambah Undangan Pernikahan Baru</h2>
  <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

  <div class="form-group mt-3">
    <label>Name
      </label>
      <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>" required>
    </div>
  <div class="form-group mt-3">
    <label>Url
      </label>
      <input type="text" class="form-control" name="slug" value="<?= $product['slug'] ?>" required>
    </div>
    
  <div class="form-group mt-3">
    <label>Thumbnail
      </label>
      <img class="w-50 text-center" src="<?= base_url($dir.$product['thumbnail']) ?>"/>
      <input type="file" class="form-control" name="thumbnail" accept="image/*" value="<?= $product['thumbnail'] ?>">
    </div>
  <div class="form-group mt-3">
    <label>Description
      </label>
      <textarea class="form-control" name="description"><?= $product['description'] ?></textarea>
    </div>

    <div class="mt-3">
    <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
    </form>
   </div>
   </div>
   </div>
   