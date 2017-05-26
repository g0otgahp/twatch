<div class="col-sm-9">
  <div class="panel panel-primary">
    <div class="panel-heading">ประวัติการสั่งซื้อ</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12 col-md-12">
        <table class="table table-hover" id="table">
          <thead>
            <tr class="info">
              <th>#</th>
              <th>รหัสบิล</th>
              <th width="30%">วันที่ - เวลา</th>
              <th width="50%">สถานที่จัดส่ง</th>
              <th width="20%">สถานะ</th>
              <th>ตัวเลือก</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1; foreach ($order_detail as $row): ?>
            <tr>
              <td><?php echo $i ?></td>
              <td>T00<?php echo $row['order_detail_id']?></td>
              <td><?php echo $row['order_detail_date']?></td>
              <td><?php echo $row['order_detail_address']?></td>
              <?php if ($row['order_detail_status'] == 1): ?>
                <td style="color:gray;">ยังไม่ยืนยัน</td>
              <?php elseif($row['order_detail_status'] == 2): ?>
                <td style="color:orange;">รอการยืนยัน</td>
              <?php elseif($row['order_detail_status'] == 3): ?>
                <td style="color:blue;">ผ่านการยืนยันแล้ว</td>
              <?php elseif($row['order_detail_status'] == 4): ?>
                <td style="color:blue;">กำลังจัดส่งสินค้า</td>
              <?php elseif($row['order_detail_status'] == 5): ?>
                <td style="color:green;">การสั่งซื้อเสร็จสิ้น</td>
              <?php else: ?>
                <td style="color:red;">ยกเลิกใบสั่งซื้อ</td>
              <?php endif; ?>
              <td align="center">
                <a href="<?php echo SITE_URL('history/detail/'.$row['order_detail_id'])?>" class="btn btn-primary btn-sm">รายละเอียด</a>
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
