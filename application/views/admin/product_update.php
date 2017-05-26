<div class="col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">การจัดการสินค้า</div>
    <?php echo form_open_multipart('admin/product/product_process_update','class="form form-horizontal"'); ?>

    <div class="container" style="padding:15px;">
      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ยี่ห้อ</label>
        </div>
        <div class="col-md-3">
          <select name="product_brand_id" class="form-control" required>
            <option value="<?php echo $product[0]['brand_id']?>"><?php echo $product[0]['brand_name']?></option>
            <?php foreach ($brand as $row): ?>
              <option value="<?php echo $row['brand_id']?>"><?php echo $row['brand_name']?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ชื่อสินค้า</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="product_name" value="<?php echo $product[0]['product_name']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ราคาสินค้า</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="product_price" value="<?php echo $product[0]['product_price']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">รายละเอียด</label>
        </div>
        <div class="col-md-3">
          <textarea required cols="50" rows="10" class="form-control" name="product_detail" placeholder="กรอกรายละเอียดสินค้า"><?php echo $product[0]['product_detail']?></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">รูปภาพ</label>
        </div>
        <div class="col-md-3">
          <input class="form-control" type="file" name="product_pic">
          <img src="<?php echo BASE_URL('uploads/product/'.$product[0]['product_pic'])?>" style="width:200px;">
        </div>
      </div>

  </div>

    <div class="form-footer">
      <div class="form-group">
        <div class="col-md-9 col-md-offset-4">
          <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <input type="hidden" name="product_id" value="<?php echo $product[0]['product_id']?>">
          <a href="<?php echo site_url('Admin/product')?>"><button type="button" class="btn btn-default">ยกเลิก</button></a>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
