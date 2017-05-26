  <div class="col-sm-9 blog-main">
    <div class="panel panel-default">
    <div class="panel-heading">สินค้าทั้งหมด</div>
      <div class="panel-body">
        <div class="row" style="margin-top:20px;">
          <?php foreach ($product as $row): ?>
          <div class="col-sm-6 col-md-4" align="center">
            <div style="height: 375px!important;">
              <img id="0" style="width:150px;" class="img-thumnail" src="<?php echo BASE_URL('uploads/product/'.$row['product_pic'])?>">
              <div class="caption"><a href="<?php echo SITE_URL('product/product_detail/'.$row['product_id'])?>" style="font-size: 13px;"><?php echo $row['product_name']?></a>
                <p style="font-size: 13px;font-weight: bold;color: red;">ราคา : <?php echo number_format($row['product_price'])?> บาท</p>
                <p style="font-size: 13px;">ยี่ห้อ : <?php echo $row['brand_name']?></p>
                <a href="<?php echo SITE_URL('product/product_detail/'.$row['product_id'])?>" class="btn btn-default" style="margin-left:5px; padding:5px;">รายละเอียด</a>
                <?php if (@$_SESSION['USER_ID'] != ''): ?>
                <a href="<?php echo SITE_URL('cart/insert/'.$row['product_id']."/".$_SESSION['USER_ID'])?>" class="btn btn-success" style="margin-left:5px;padding:5px;">หยิบใส่ตะกร้า</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
        </div>
      </div>
    </div>
