<div class="col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">การจัดการสมาชิก</div>
    <?php echo form_open('admin/member/member_process_update','class="form form-horizontal"'); ?>

    <div class="container" style="padding:15px;">

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ชื่อ</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_fname" placeholder="กรอกชื่อ" value="<?php echo $member[0]['user_fname']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">นามสกุล</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_lname" placeholder="กรอกชื่อนามสกุล" value="<?php echo $member[0]['user_lname']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">เบอร์โทรศัพท์</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_phone" placeholder="กรอกเบอร์โทรศัพท์" value="<?php echo $member[0]['user_phone']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">E-mail</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_email" placeholder="กรอกE-mail" value="<?php echo $member[0]['user_email']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ที่อยู่</label>
        </div>
        <div class="col-md-3">
          <textarea name="user_address" required class="form-control" style="margin-top:20px;" cols="50" rows="4"><?php echo $member[0]['user_address']?></textarea>
        </div>
      </div>

    <div class="form-footer">
      <div class="form-group">
        <div class="col-md-9 col-md-offset-4">
          <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <input type="hidden" name="user_id" value="<?php echo $member[0]['user_id']?>">
          <a href="<?php echo site_url('Admin/member')?>"><button type="button" class="btn btn-default">ยกเลิก</button></a>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
