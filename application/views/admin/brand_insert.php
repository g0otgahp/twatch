<div class="col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">การจัดการยี่ห้อ</div>
    <?php echo form_open('admin/brand/brand_process_save','class="form form-horizontal"'); ?>

    <div class="container" style="padding:15px;">

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ชื่อยี่ห้อ</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="brand_name" placeholder="กรอกชื่อยี่ห้อ">
        </div>
      </div>

    <div class="form-footer">
      <div class="form-group">
        <div class="col-md-9 col-md-offset-4">
          <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <a href="<?php echo site_url('Admin/brand')?>"><button type="button" class="btn btn-default">ยกเลิก</button></a>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
