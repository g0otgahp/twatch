<!doctype html>
<html language="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php //echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL('assets/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL('assets/bootstrap/css/bootstrap-theme.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL('assets/css/blog.css')?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL('assets/css/dataTables.bootstrap.min.css')?>">

    </head>
    <?php @session_start();?>
    <body>
      <?php if (@$_SESSION['ADMIN'] == ''): ?>
      <div class="blog-masthead">
        <div class="container">
          <nav class="blog-nav">
            <a class="blog-nav-item active" href="<?php echo SITE_URL('Home')?>">หน้าหลัก</a>
            <?php if (@$_SESSION['USER_ID'] != ''): ?>
            <a class="blog-nav-item active" href="<?php echo SITE_URL('cart/order/'.$_SESSION['USER_ID'])?>">ตะกร้าสินค้า</a>
            <?php endif; ?>
            <a class="blog-nav-item active" href="<?php echo SITE_URL('howtopay')?>">วิธีซื้อสินค้า</a>
            <a class="blog-nav-item active" href="<?php echo SITE_URL('abountus')?>">เกี่ยวกับเรา</a>
          </nav>
        </div>
      </div>
    <?php endif; ?>

      <div class="container" style="width:80%;">
            <div class="blog-header">
              <?php if (@$_SESSION['ADMIN'] == ''): ?>
              <h1 class="blog-title">T-Watch</h1>
              <p class="lead blog-description">สั่งซื้อนาฬิกาข้อมือออนไลน์ สะดวกในการซื้อ ประหยัดในทุกการใช้จ่าย ปลอดภัยในทุกขั้นตอน</p>
              <?php else: ?>
                <!-- <div class="panel panel-default">
                  <div class="panel-body"> -->
              <img src="<?php echo BASE_URL('uploads/admin/admin.png')?>" style="width:100%; height:150px;">
            <!-- </div>
          </div> -->
              <?php endif; ?>
            </div>
            <div class="row">

            <div class="col-sm-3 blog-sidebar">
              <div class="panel panel-primary">
                <div class="panel-heading">ค้นหา</div>
              <?php echo form_open('product/product_find');?>
              <span><input type="text" class="form-control" name="find" placeholder="กรอกชื่อสินค้าที่ต้องการค้นหา" onchange="this.form.submit()" value="<?php echo @$find?>"></span>
              <?php echo form_close();?>
              </div>
              <!-- Login รหัส Admin -->
              <?php if (@$_SESSION['ADMIN'] != ''): ?>
                <div class="panel panel-success">
                  <div class="panel-heading">เข้าสู่ระบบด้วยรหัส : Admin</div>
                  <table style="margin:20px;">
                    <tr><td>เมนูการจัดการ</td></tr>
                    <!-- <tr><td><a href="<?php echo SITE_URL('admin/dashboard')?>" class="btn"><span class="glyphicon glyphicon-signal"></span> สรุปภาพรวม</a></td></tr> -->
                    <tr><td><a href="<?php echo SITE_URL('admin/member')?>" class="btn"><span class="glyphicon glyphicon-user"></span> การจัดการสมาชิก</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('admin/product')?>" class="btn"><span class="glyphicon glyphicon-gift"></span> การจัดการสินค้า</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('admin/brand')?>" class="btn"><span class="glyphicon glyphicon-tag"></span> การจัดการยี่ห้อ</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('admin/order')?>" class="btn"><span class="glyphicon glyphicon-inbox"></span> ใบสั่งซื้อ</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('Home/logout')?>" class="btn"><span class="glyphicon glyphicon-off"></span> ออกจากระบบ</a></td></tr>
                  </table>
                </div>

                <!-- Login รหัส User -->
              <?php elseif (@$_SESSION['USER_ID'] != ''): ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">บัญชี : <?php echo @$_SESSION['USER_NAME']?></div>
                  <table style="margin:20px;">
                    <tr><td>ยินดีต้อนรับ</td></tr>
                    <tr><td>คุณ : <b><?php echo @$_SESSION['FNAME']." ".@$_SESSION['LNAME']?></b></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><a href="<?php echo SITE_URL('cart/order/'.$_SESSION['USER_ID'])?>" class="btn"><span class="glyphicon glyphicon-shopping-cart"></span> ตะกร้าสินค้า</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('history/order/'.$_SESSION['USER_ID'])?>" class="btn"><span class="glyphicon glyphicon-calendar"></span> สถานะการสั่งซื้อ</a></td></tr>
                    <tr><td>
                      <a href="" data-toggle="modal" data-target="#Edit" class="btn"><span class="glyphicon glyphicon-user"></span> แก้ไขข้อมูลส่วนตัว</a></td></tr>
                    <tr><td><a href="<?php echo SITE_URL('Home/logout')?>" class="btn"><span class="glyphicon glyphicon-off"></span> ออกจากระบบ</a></td></tr>
                  </table>
                </div>

                <!-- ยังไม่ Login -->
              <?php else: ?>
              <div class="panel panel-primary">
                <div class="panel-heading">เข้าสู่ระบบ</div>
                <?php echo form_open('Home/login')?>
                <table style="margin:20px;">
                  <tr><td>Username : </td></tr>
                  <tr><td><input name="LoginUser" autocomplete="off" type="text" class="form-control" placeholder="กรอกชื่อบัญชีของคุณ" required></td></tr>
                  <tr><td>Password : </td></tr>
                  <tr><td><input name="LoginPwd" autocomplete="off" type="password" class="form-control" placeholder="กรอกรหัสผ่าน" required></td></tr>
                  <tr>
                    <td>
                      <button type"submit" class="btn btn-success btn-sm" style="margin-top:10px;">เข้าสู่ระบบ</button>
                      <button type="button" class="btn btn-warning btn-sm" style="margin-top:10px;" data-toggle="modal" data-target="#Register">สมัครสมาชิก</button>
                     </td>
                  </tr>
                </table>
              </div>
                <?php echo form_close()?>
            <?php endif; ?>

            <?php if (@$_SESSION['ADMIN'] == ''): ?>
              <div class="panel panel-primary">
                <div class="panel-heading">ยี่ห้อสินค้า</div>
                <ul class="list-group">
                  <li class="list-block"><a href="<?php echo SITE_URL('home')?>">ทุกยี่ห้อ</a></li>
                </ul>
                <?php foreach ($brand as $row): ?>
                <ul class="list-group">
                  <li class="list-block"><a href="<?php echo SITE_URL('product/brand/'.$row['brand_id'])?>"><?php echo $row['brand_name'] ?></a></li>
                </ul>
              <?php endforeach; ?>
              </div>
              <?php else: ?>
                <div class="panel panel-success">
                  <div class="panel-heading">แสดงตัวอย่างสินค้า</div>
                  <ul class="list-group">
                    <li class="list-block"><a href="<?php echo SITE_URL('home')?>">ทุกยี่ห้อ</a></li>
                  </ul>
                  <?php foreach ($brand as $row): ?>
                  <ul class="list-group">
                    <li class="list-block"><a href="<?php echo SITE_URL('product/brand/'.$row['brand_id'])?>"><?php echo $row['brand_name'] ?></a></li>
                  </ul>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            </div>
