  <div class="col-sm-9">
    <div class="panel panel-success">
      <div class="panel-heading">การจัดการสินค้า</div>
      <div style="padding:15px;"><a href="<?php echo SITE_URL('admin/product/product_insert')?>" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>เพิ่มสินค้า</a> </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
          <table class="table table-hover" id="table">
            <thead>
              <tr class="info">
                <th>#</th>
                <th>ยี่ห้อ</th>
                <th width="40%">ชื่อรุ่น</th>
                <th>ราคา</th>
                <th>คงเหลือ</th>
                <th>ตัวเลือก</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach ($product as $row): ?>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['brand_name']?></td>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo number_format($row['product_price'])?></td>
                <?php if ($row['product_stock'] < 10): ?>
                <td style="color:red"><?php echo number_format($row['product_stock'])?></td>
                <?php else: ?>
                <td><?php echo number_format($row['product_stock'])?></td>
                <?php endif; ?>
                <td>
                  <a href="<?php echo SITE_URL('admin/product/product_update/'.$row['product_id'])?>" class="btn btn-warning">แก้ไข</a>
                  <a href="<?php echo SITE_URL('admin/product/product_delete/'.$row['product_id'])?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">X</a>
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
