<div class="col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">การจัดการสมาชิก</div>
    <?php echo form_open('admin/member/member_process_save','class="form form-horizontal"'); ?>

    <div class="container" style="padding:15px;">

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ชื่อ</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_fname" placeholder="กรอกชื่อ">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">นามสกุล</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_lname" placeholder="กรอกชื่อนามสกุล">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">เบอร์โทรศัพท์</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_phone" placeholder="กรอกเบอร์โทรศัพท์">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">E-mail</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_email" placeholder="กรอกE-mail">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Username</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="text" name="user_username" placeholder="กรอกชื่อบัญชี">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Password</label>
        </div>
        <div class="col-md-3">
          <input required class="form-control" type="password" name="user_pwd" placeholder="กรอกรหัสผ่าน">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">ที่อยู่</label>
        </div>
        <div class="col-md-3">
          <textarea name="user_address" required class="form-control" style="margin-top:20px;" cols="50" rows="4"></textarea>
        </div>
      </div>

    <div class="form-footer">
      <div class="form-group">
        <div class="col-md-9 col-md-offset-4">
          <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          <a href="<?php echo site_url('Admin/member')?>"><button type="button" class="btn btn-default">ยกเลิก</button></a>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
