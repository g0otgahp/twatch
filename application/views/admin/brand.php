  <div class="col-sm-9">
    <div class="panel panel-success">
      <div class="panel-heading">การจัดการยี่ห้อ</div>
      <div style="padding:15px;"><a href="<?php echo SITE_URL('admin/brand/brand_insert')?>" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>เพิ่มยี่ห้อ</a> </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
          <table class="table table-hover" id="table">
            <thead>
              <tr class="info">
                <th>#</th>
                <th>ยี่ห้อ</th>
                <th>ตัวเลือก</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach ($brand as $row): ?>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['brand_name']?></td>
                <td>
                  <a href="<?php echo SITE_URL('admin/brand/brand_update/'.$row['brand_id'])?>" class="btn btn-warning">แก้ไข</a>
                  <a href="<?php echo SITE_URL('admin/brand/brand_delete/'.$row['brand_id'])?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">X</a>
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
