  <div class="col-sm-9">
    <div class="panel panel-success">
      <div class="panel-heading">การจัดการสมาชิก</div>
      <div style="padding:15px;"><a href="<?php echo SITE_URL('admin/member/member_insert')?>" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>เพิ่มสมาชิก</a> </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">

          <table class="table table-hover" id="table">
            <thead>
              <tr class="info">
                <th>#</th>
                <th>Username</th>
                <th>ชื่อ-นามสกุล</th>
                <th>เบอร์โทรศัพท์</th>
                <th>E-Mail</th>
                <th>ตัวเลือก</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach ($member as $row): ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['user_username']?></td>
                <td><?php echo $row['user_fname']." ".$row['user_lname']?></td>
                <td><?php echo $row['user_phone']?></td>
                <td><?php echo $row['user_email']?></td>
                <td>
                  <a href="<?php echo SITE_URL('admin/member/member_update/'.$row['user_id'])?>" class="btn btn-warning">แก้ไข</a>
                  <a href="<?php echo SITE_URL('admin/member/member_delete/'.$row['user_id'])?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">X</a>
                </td>
              </tr>
            <?php $i++; endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  </div>
</div>
