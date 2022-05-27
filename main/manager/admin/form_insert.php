<?php

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "select * from admin";
$result = mysqli_query($connect, $sql);
?>

<form action="admin/process_insert.php" method="post" enctype="multipart/form-data">
    <h1>Thêm admin</h1>
    <br>
    <table>
        <tr>
            <td>
                Tên
            </td>
            <td>

                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                Sinh nhật
            </td>
            <td>

                <input type="date" name="birthday">
            </td>
        </tr>
        <tr>
            <td>

                Giới tính
            </td>
            <td>

                <select name="gender">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>

                Địa chỉ
            </td>
            <td>

                <input type="text" name="adress">
            </td>
        </tr>
        <tr>
            <td>
                Số điện thoại
            </td>
            <td>
                <input type="text" name="number_phone">
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>
                Mật khẩu
            </td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
    </table>


    <button>Thêm</button>

</form>