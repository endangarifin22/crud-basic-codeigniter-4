<div class="container">
  <div class="row justify-content-center">
    <div class="col-7 mt-3 text-center">
      <a class="btn btn-primary" href="<?= base_url('product') ?>">Back to Product</a>
      </div>
    <div class="col-md-8 mt-3">
            <?php if (session()->getFlashdata('success')): ?> <div class="alert-success text-center mt-3 py-2">
          <?= session()->getFlashdata('success') ?>
          </div>
          <?php endif; ?>
      </div>
    <div class="col-md-5 mt-3">
      <img class="w-100" src="<?= base_url($dir.$product['thumbnail']) ?>">
      </div>
    <div class="col-md-9 mt-3">
      <h1 class="fs-5 text-center"><?= $product['name'] ?></h1>
      </div>
    <div class="col-md-9 mt-3">
      <?= $product['description'] ?>
      </div>
   </div>
 </div>
