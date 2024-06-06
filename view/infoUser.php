<?php

$user = "";
foreach ($info as $value) {
    extract($value);
    if ($vai_tro == 1) {
        $admin = '<a class="btn btn-block border  " href="index.php?pg=admin"><i class="fa-solid fa-user-tie pr-2"></i> Chuyển trang admin </a>';
    } else {
        $admin = "";
    }
    $user = '
        <div class="col-3 ">
        <div class="row">
            <div class="col-12 list_func">
            
        <a class="btn btn-block border  " href="index.php?pg=infoUser"><i class="fa-solid fa-user pr-2"></i> Thông tin của bạn </a>
        <a class="btn btn-block border  " href="index.php?pg=updatePass"><i class="fa-solid fa-lock pr-2"></i>Thay đổi mật khẩu </a>
        <a class="btn btn-block border  " href="index.php?pg=thongtindonhang"> <i class="fa-solid fa-cart-shopping pr-2"></i>Đơn hàng của bạn </a>
        ' . $admin . '
            </div>
        </div>
        
        </div>
        <div class="col-5">
        <form id="updateUser" action="index.php?pg=updateUser" method="post">
            <div class="form-group">
                <label for="username">Họ Tên</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Họ tên"value="' . $ho_ten . '">
            </div>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="tk" name="tk" placeholder="' . $taikhoan . '"value="' . $taikhoan . '" readonly>
            </div>
            <div class="form-group">
                <label for="username">Mật Khẩu</label>
                <input type="password" class="form-control" id="mk" name="mk" placeholder="" value="' . $mat_khau . '" readonly>
            </div>
            <div class="form-group">
                <label for="username">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"value="' . $email . '">
            </div>
            <div class="form-group">
                <label for="username">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ"value="' . $dia_chi . '">
            </div>
            <div class="form-group">
                <label for="username">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại "value="' . $phone . '">
            </div>
            <div class="text-danger" id="error">

            </div>
            <button class="btn btn-warning btn-block" style="color: white;">Cập nhật thông tin</button>
        </form>
    </div>
    <div class="col-4 ">
        <div class="info-Client w-100 pt-3 border rounded">
            <h5 class="text-center ">Thông tin của bạn</h5>
            <div class="Client">
                Tên : <strong>' . $ho_ten . '</strong>
            </div>
            <div class="Client">
                User Name : <strong>' . $taikhoan . '</strong>
            </div>
            <div class="Client">
                
            </div>
            <div class="Client">
                email: <strong>' . $email . '</strong>
            </div>
            <div class="Client">
                Địa chỉ: <strong>' . $dia_chi . '</strong>
            </div>
            <div class="Client">
                Số điện thoại : <strong>' . $phone . '</strong>
            </div>
        </div>
        
    </div>
        ';
}


?>
<!-- // Mật khẩu : <strong>'.$mat_khau.'</strong> -->

<body class="infoClient">
    <div class="container my-5">
        <div class="row">
            <?php echo $user ?>
        </div>
    </div>