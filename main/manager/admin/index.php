
<h1>
    Quản lý Admin
</h1>
<h3>
    <button>
        <a href="?statistical=admin_insert">
            Thêm Admin
        </a>
    </button>
</h3>
<table border="1" width="100%">
    <tr>
        <th>Mã</th>
        <th>Tên  </th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Xóa</th>
    </tr>
    <?php   foreach ($result as $each) : ?>
    <tr>
        <td>
            <?php echo $each['id'] ?>
        </td>
        <td>
            <?php echo $each['name'] ?>
        </td>
        <td>
            <?php echo $each['gender'] ?>
        </td>
        <td>
            <?php echo $each['birthday'] ?>
        </td>
        <td>
            <?php echo $each['number_phone'] ?>
        </td>
        <td>
            <?php echo $each['email'] ?>
        </td>
        <td>
            <?php echo $each['adress'] ?>
        </td>
        <td>
            <a href="?statistical=admin_delete&id=<?php echo $each['id'] ?>">
                Xóa
            </a>
        </td>
        <?php endforeach  ?>
    </tr>

</table>