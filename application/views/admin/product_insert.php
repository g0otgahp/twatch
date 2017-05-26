  <div class="col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">การจัดการสินค้า</div>
    <?php echo form_open_multipart('admin/product/product_process_save','class="form form-horizontal"'); ?>

    <div class="container" style="padding:15px;">
      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ยี่ห้อ</label>
        </div>
        <div class="col-md-3">
          <select name="product_brand_id" class="form-control" required>
            <option value="">---เลือกยี่ห้อ---</option>
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
          <input required class="form-control" type="text" name="product_name" placeholder="กรอกชื่อสินค้า">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ราคาสินค้า</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="product_price" placeholder="กรอกราคาสินค้า">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">รายละเอียด</label>
        </div>
        <div class="col-md-3">
          <textarea required cols="50" rows="10" class="form-control" name="product_detail" placeholder="กรอกรายละเอียดสินค้า"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">รูปภาพ</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="file" name="product_pic">
        </div>
      </div>
  </div>

    <div class="form-footer">
      <div class="form-group">
        <div class="col-md-9 col-md-offset-4">
          <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <a href="<?php echo site_url('Admin/product')?>"><button type="button" class="btn btn-default">ยกเลิก</button></a>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
