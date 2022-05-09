         <!-- đăng nhập -->

         <div class="sign_in">
  
  <div class="form_sign_in">
<button class="btn_close js_close" >X</button>
<form id="form-sign-in" method="post">
      <table cellpadding ="5" align = "center">
          <tr>
              <th colspan = "2">ĐĂNG NHẬP</th>
          </tr>
          <tr>
              <td style="width:30%;"> Email </td>
              <td>
                  <input type="email" name="email" size="30" placeholder ="Email đăng nhập">
              </td>
          </tr>
          <tr>
              <td> Mật khẩu</td>
              <td>
                  <input type="password" name="password" size="30" placeholder="Mật khẩu">
              </td>
          </tr>
      <tr> 
              <td colspan = "2" align="center">
                  &nbsp;
                  Ghi nhớ đăng nhập<input type="checkbox" name="remember">
                  <br>
                  <button >Đăng nhập</button>
                  <br>
                  <br>
                  <a href="">Quên mật khẩu?</a>
                  <br>
                  <br>
                  Bạn chưa có tài khoản? <button type="button" class="outline btn-sign-up">Đăng ký</button>   
              </td>
          </tr>
      </table>
</form>

</div>

      </div>

          <!--đăng ký -->

      <div class="sign_up">
              
<div class="form_sign_up">

<button class="btn_close js_close" onclick="close_form_sign_up()">X</button>
<form id="form-sign-up" method="post">
      <table  cellpadding ="5" align = "center">
          <?php if(isset($_GET['erorr'])){
              echo $_GET['erorr'];
          } ?>
          <tr>
              <th colspan = "2"> ĐĂNG KÝ</th>
          </tr>
          <tr>
              <td> Tên của bạn </td>
              <td>
                  <input type="text " name="name" size="30" placeholder ="Tên của bạn">
              </td>
          </tr>
          <tr>
              <td> Email </td>
              <td>
                  <input type="text " name="email" size="30" placeholder ="Email đăng nhập">
              </td>
          </tr>
          <tr>
              <td> Mật khẩu</td>
              <td>
                  <input type="password" name="password" size="30" placeholder="Mật khẩu">
              </td>
          </tr>                   
          <tr>
              <td>Giới tính</td>
              <td>
                  <label>
                      <input type="radio" name="gender" id="boy" value="Nam">Nam
                  </label>
                  <label>
                      <input type="radio" name ="gender" id="nu" value="Nữ">Nữ
                  </label>
              </td>
          </tr>
          <tr>
              <td>Ngày sinh</td>
              <td>
              <input type="date" id="birthday" name="birthday">
              </td>
          </tr>
          <tr>
              <td>Số điện thoại</td>
              <td>
                  <input type="number" name="number_phone" size="30" placeholder ="">
              </td>
          </tr>
          <tr>
              <td>Địa chỉ</td>
              <td>
                  <input type="text" name="adress" >
              </td>
          </tr>
          <tr>
              <td colspan = "2" align="center">
                  &nbsp;
                  <button >Đăng ký</button>
                  <br>
                  <br>
                  Bản đã có tài khoản? <button type="button" class="outline btn-sign-in">Đăng nhập</button>
              </td>
          </tr>

      </table>
      <?php mysqli_close($connect) ?>
</form>

</div>  
      </div>