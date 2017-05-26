<div class="col-sm-9 blog-main">
  <div class="panel panel-default">
      <div class="panel-heading">สินค้ายี่ห้อ <?php echo @$product[0]['brand_name']?></div>
      <div class="panel-body">
        <div class="row">

          <div class="panel-body">
            <div class="row">
              <div class="col-sm-5" align="center">
                <img class="img-responsive" src="<?php echo BASE_URL('uploads/product/'.$product[0]['product_pic'])?>">
              </div>
              <div class="col-sm-7">
                <h3><?php echo $product[0]['product_name']?></h3>
                <dl class="dl-horizontal">
                  <dt>ยี่ห้อ</dt>
                  <dd><?php echo $product[0]['brand_name']?></dd>
                  <dt>ราคา</dt>
                  <dd><?php echo number_format($product[0]['product_price'])?> บาท</dd>
                </dl>
                <hr>

                <?php if (@$_SESSION['USER_ID'] != ''): ?>
                <a href="<?php echo SITE_URL('cart/insert/'.$product[0]['product_id']."/".$_SESSION['USER_ID'])?>" class="btn btn-success" style="margin-left:5px;padding:5px;">หยิบใส่ตะกร้า</a>
                <?php else: ?>
                <div align="center" style="color:red;">เข้าสู่ระบบเพื่อสั่่งซื้อ</div>
                <?php endif; ?>

              </div>
            </div>
            <div class="row" style="font-size: 14px;">
              <div class="col-sm-12">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="#" onclick="return false;">รายละเอียด</a></li>
                </ul>
                <div class="col-md-12 col-sm-12" style="padding:10px;">
                  <div><?php echo $product[0]['product_detail']?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
