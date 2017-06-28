<div class="col-sm-9">
  <div class="panel panel-primary">
    <div class="panel-heading">ตะกร้าสินค้า</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <?php if (count($order_temp) == 0): ?>
            <h3>ไม่มีสินค้าในตะกร้า</h3>
          <?php else: ?>
        <table class="table table-hover" id="table">
          <thead>
            <tr class="info">
              <th>#</th>
              <th width="45%">ชื่อสินค้า</th>
              <th>จำนวน</th>
              <th width="15%">ราคาชิ้นละ</th>
              <th width="15%">รวม</th>
              <th>ยกเลิก</th>
            </tr>
          </thead>
          <tbody>

          <?php $i=1; $total=0; foreach ($order_temp as $row): ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['product_name']?></td>
              <td>
                <?php echo form_open('cart/edit'); ?>
                <input type="hidden" name="order_temp_id" value="<?php echo $row['order_temp_id']?>">
                <input type="hidden" name="order_temp_product_id" value="<?php echo $row['order_temp_product_id']?>">
                <input type="text" autocomplete="off" onchange="this.form.submit()" name="order_temp_amount" class="form-control" style="width:75px;" value="<?php echo $row['order_temp_amount']?>">
                <?php echo form_close(); ?>
              </td>
              <td><?php echo number_format($row['order_temp_price_per'])?> .-</td>
              <?php $result = $row['order_temp_price_per']*$row['order_temp_amount'];?>
              <td align="right"><?php echo number_format($result)?> .-</td>
              <td align="center">
                <a href="<?php echo SITE_URL('cart/delete/'.$row['order_temp_id'])?>" class="btn btn-danger btn-xs" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">X</a>
              </td>
            </tr>
          <?php $i++; $total += $result; endforeach; ?>

          <tr class="warning">
            <td colspan="3">
            </td>
            <td>
              รวม
            </td>
            <td align="right">
              <?php echo number_format($total);?>.-
            </td>
            <td>
            </td>
          </tr>
          </tbody>
        </table>
        <?php echo form_open('cart/accept'); ?>
          <div class="row" style="margin-top:50px;">
            <div class="col-md-offset-3 col-md-6">
              <h3 align="center">ที่อยู่ที่ต้องการให้จัดส่ง</h3>
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['USER_ID']?>">
              <textarea name="order_detail_address" class="form-control" cols="50" ros="7"><?php echo $_SESSION['ADD']?></textarea>
              <br>
              <p align="center"><button type="submit" class="btn btn-success btn-lg">ยืนยันการสั่งซื้อ</button></p>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>
</div>
</div>
