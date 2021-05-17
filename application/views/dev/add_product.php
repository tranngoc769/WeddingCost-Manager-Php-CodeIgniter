<div class="content-wrapper">
  <div class="container-fluid">
    <?php echo $this->session->flashdata("msg"); ?>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= site_url('dev');?>">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Add Product</li>
    </ol>
    <!-- Example DataTables Card-->
    <?= form_open_multipart('product/add', array('class' => 'form-horizontal', 'id'=>'add-product-form')) ?>
    <div class="card mb-3">
      <div class="card-header">
        Add Product 
      </div>

      <div class="card-body">
        <div class="form-group">
          <?php if(isset($image_error)) {echo $image_error; }?>
          <label class="control-label">Image</label>
          <div class="row">
            <div class="col-md-4">
              <img src="<?= base_url('style/assets/images/no_image.png')?>" id="product_image" name="product_image" class="img-thumbnail">
              <input type="file" id="my_file" onchange="readURL(this);" accept='image/*' name="image_link"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?php if(isset($zip_error)) {echo $zip_error; }?>
          <label class="control-label">ZIP</label>
          <div class="row">
            <div class="col-md-4">
              <input type="file" id="zip_file" accept='image/*' name="zip_link"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <?= form_error('product_name'); ?>
          <label class="control-label">Product Name</label>
          <div>
            <input id="product_name" type="text" class="form-control" name="product_name" value="<?php echo set_value('product_name'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?= form_error('product_price'); ?>
          <label class="control-label">Product Price</label>
          <div>
            <input id="product_price" type="number" step="1000" class="form-control" name="product_price" value="<?php echo set_value('product_price'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?= form_error('product_short_description'); ?>
          <label class="control-label">Product Short Description</label>
          <div>
            <input id="product_short_description" type="text" class="form-control" name="product_short_description" value="<?php echo set_value('product_short_description'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?= form_error('product_long_description'); ?>
          <label class="control-label">Product Long Description</label>
          <div>
            <textarea class="form-control" id="product_long_description" name="product_long_description"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Paid app / Free app</label>
          <div>
            <select id="type_app"  class="form-control" name="type_app">
              <option value="0" selected> Free</option>
              <option value="1" > Paid </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Product Category</label>
          <div>
            <select id="product_category" type="text" class="form-control" name="product_category">
              <?php 
                foreach($categories as $category):
                  foreach($category->subCategory as $subCat):
              ?>
                <option value="<?= $subCat->category_id?>">
                  <?= $category->category_name; ?>: <?= $subCat->category_name; ?>
                </option>
              <?php endforeach; endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" id="draff_product" style="width:100%">Draff</button>
        </div>
        <div class="form-group">
          <input type="submit" value="Add" Class="btn btn-primary form-control">
        </div>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
</div>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<!-- product_id
category_id
seller_id
product_name
price
short_desc
description
add_time
active_flag
cost_app
is_draff
-->
