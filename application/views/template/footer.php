</div>


            <?php echo form_open('Home/register')?>
            <!-- Modal -->
            <div id="Register" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">สมัครสมาชิก</h4>
                  </div>
                  <div class="modal-body">
                    <center>
                    <table>
                      <tr >
                        <td>ชื่อ : &nbsp;</td>
                        <td><input name="user_fname" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกชื่อของคุณ" required></td>
                      </tr>

                      <tr>
                        <td>นามสกุล : &nbsp;</td>
                        <td><input name="user_lname" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกนามสกุลของคุณ" required></td>
                      </tr>

                      <tr>
                        <td>เบอร์โทรศัพท์ : &nbsp;</td>
                        <td><input name="user_phone" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกเบอร์โทรศัพท์ของคุณ" required></td>
                      </tr>

                      <tr>
                        <td>E-Mail : &nbsp;</td>
                        <td><input name="user_email" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกอีเมลของคุณ" required></td>
                      </tr>

                      <tr>
                        <td>ที่อยู่ : &nbsp;</td>
                        <td>
                          <textarea name="user_address" required class="form-control" style="margin-top:20px;" cols="50" rows="4"></textarea>
                        </td>
                      </tr>

                      <tr>
                        <td><b>Username</b> : &nbsp;</td>
                        <td><input name="user_username" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกชื่อบัญชีของคุณ" required></td>
                      </tr>

                      <tr>
                        <td><b>Password</b> : &nbsp;</td>
                        <td><input name="user_pwd" type="password" required class="form-control" style="margin-top:20px;" placeholder="กรอกรหัสผ่านของคุณ" required></td>
                      </tr>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type"submit" class="btn btn-success btn-sm">ยืนยัน</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close()?>

            <?php echo form_open('Home/Edit')?>
            <!-- Modal -->
            <div id="Edit" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
                  </div>
                  <div class="modal-body">
                    <center>
                      <input name="user_id" type="hidden" value="<?php echo $_SESSION['USER_ID'];?>">
                    <table>
                      <tr >
                        <td>ชื่อ : &nbsp;</td>
                        <td><input name="user_fname" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกชื่อของคุณ" value="<?php echo $_SESSION['FNAME']?>"></td>
                      </tr>

                      <tr>
                        <td>นามสกุล : &nbsp;</td>
                        <td><input name="user_lname" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกนามสกุลของคุณ" value="<?php echo $_SESSION['LNAME']?>"></td>
                      </tr>

                      <tr>
                        <td>เบอร์โทรศัพท์ : &nbsp;</td>
                        <td><input name="user_phone" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกเบอร์โทรศัพท์ของคุณ" value="<?php echo $_SESSION['PHONE']?>"></td>
                      </tr>

                      <tr>
                        <td>E-Mail : &nbsp;</td>
                        <td><input name="user_email" type="text" required class="form-control" style="margin-top:20px;" placeholder="กรอกอีเมลของคุณ" value="<?php echo $_SESSION['EMAIL']?>"></td>
                      </tr>

                      <tr>
                        <td>ที่อยู่ : &nbsp;</td>
                        <td>
                          <textarea name="user_address" required class="form-control" style="margin-top:20px;" cols="50" rows="4"><?php echo $_SESSION['ADD']?></textarea>
                        </td>
                      </tr>

                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type"submit" class="btn btn-success btn-sm">ยืนยัน</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close()?>

<div class="blog-footer">
  <p>© 2560 <a href="http://www.itoffside.com">itoffside.com</a></p>
  <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p></div>

</body>
<footer>

  <script type="text/javascript" src="<?php echo BASE_URL('assets/js/jquery.1.11.1.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL('assets/jss/jquery-ui.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL('assets/js/jquery.dataTables.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL('assets/js/dataTables.bootstrap.min.js')?>"></script>



<script>
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
</footer>
</html>
