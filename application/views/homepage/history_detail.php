<div class="col-sm-9 blog-main">
  <div class="panel panel-default">
      <div class="panel-heading">บิลหมายเลข T00<?php echo $order['Order_detail'][0]['order_detail_id']?></div>
      <div class="panel-body">
        <div class="row">

          <div class="panel-body">
            <div class="row">
              <div class="col-sm-5" align="center">
                <img class="img-responsive" src="<?php echo BASE_URL('uploads/order_detail/'.$order['Order_detail'][0]['order_detail_pic'])?>">
              </div>
              <div class="col-sm-7">
                <span align="center">
                <?php if ($order['Order_detail'][0]['order_detail_status'] == 1): ?>
                  <h3 style="color:gray;">ยังไม่ยืนยัน</h3>
                <?php elseif($order['Order_detail'][0]['order_detail_status'] == 2): ?>
                  <h3 style="color:orange;">รอการยืนยัน</h3>
                <?php elseif($order['Order_detail'][0]['order_detail_status'] == 3): ?>
                  <h3 style="color:blue;">ผ่านการยืนยันแล้ว</h3>
                <?php elseif($order['Order_detail'][0]['order_detail_status'] == 4): ?>
                  <h3 style="color:blue;">กำลังจัดส่งสินค้า</h3>
                <?php elseif($order['Order_detail'][0]['order_detail_status'] == 5): ?>
                  <h3 style="color:green;">การสั่งซื้อเสร็จสิ้น</h3>
                <?php else: ?>
                  <h3 style="color:red;">ยกเลิกใบสั่งซื้อ</h3>
                <?php endif; ?>
              </span>
                <dl class="dl-horizontal">
                  <dt>วันที่สั่งซื้อ</dt>
                  <dd><?php echo $order['Order_detail'][0]['order_detail_date']?></dd>
                  <dt>สถานที่ส่งสินค้า</dt>
                  <dd><?php echo $order['Order_detail'][0]['order_detail_address']?></dd>
                </dl>
                <div align="center">
                <?php if ($order['Order_detail'][0]['order_detail_status'] == 1 || $order['Order_detail'][0]['order_detail_status'] == 2 ): ?>
                  <a href="<?php echo SITE_URL('history/cancel/'.$order['Order_detail'][0]['order_detail_id'])?>" class="btn btn-danger btn-md" onClick="javascript:return confirm('คุณต้องการยกเลิกรายการสั่งซื้อใช่หรือไม่?');">ยกเลิกการสั่งซื้อ</a>
                <?php endif; ?>
                </div>
                <hr>
                <span align="center">
                <?php if ($order['Order_detail'][0]['order_detail_status'] == 1 || $order['Order_detail'][0]['order_detail_status'] == 2 ): ?>
                <?php echo form_open_multipart('history/uploads')?>
                <p><input required class="form-control" type="file" name="order_detail_pic"></p>
                <p><input class="form-control" type="hidden" name="order_detail_id" value="<?php echo $order['Order_detail'][0]['order_detail_id']?>"></p>
                <button type="submit" class="btn btn-success" style="margin-left:5px;padding:5px;">อัปโหลดรูปหลักฐาน</button>
                <?php echo form_close();?>
                <?php endif; ?>
                </span>
              </div>
            </div>
            <div class="row" style="font-size: 14px;">
              <div class="col-sm-12">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="#" onclick="return false;">รายการสินค้า</a></li>
                </ul>
                <div class="col-md-12 col-sm-12">

                  <table class="table table-hover" id="table">
                    <thead>
                      <tr class="info">
                        <th>#</th>
                        <th width="45%">ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th width="15%">ราคาชิ้นละ</th>
                        <th width="15%">รวมราคา</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php $i=1; $total=0; foreach ($order['Order'] as $row): ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['product_name']?></td>
                        <td><?php echo $row['order_amount']?></td>
                        <td><?php echo number_format($row['order_price_per'])?> .-</td>
                        <?php $result = $row['order_price_per']*$row['order_amount'];?>
                        <td align="right"><?php echo number_format($result)?> .-</td>
                      </tr>
                    <?php $i++; $total += $result; endforeach; ?>

                    <tr class="warning">
                      <td colspan="3">
                      </td>
                      <td align="right">
                        รวม
                      </td>
                      <td align="right">
                        <?php echo number_format($total);?>.-
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
