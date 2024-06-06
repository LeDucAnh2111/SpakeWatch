<?php

$show_sp_gh = "";
foreach ($gio_hang as $value) {
    extract($value);
    $sp = chitietsp($ma_sp);
    $show_sp_gh .= '
            <div class="row justify-content-center my-2">
                <div class="col-2">
                    <img class="w-100" src="layout-v2/layout/img/product/' . $sp[0]["hinh"] . '" alt="">
                </div>
                <div class="col-4">
                ' . $sp[0]["ten_sp"] . '
                </div>
                <div class="col-1">
                ' . $sl . '
                </div>
                <div class="col-4">
                ' . number_format($sp[0]["gia"]) . 'đ
                </div>
            </div>

        ';
}
$user = "";
foreach ($info as $value) {
    extract($value);
    $user = '
        <div class="col-6">
        <form id="updateUser" action="index.php?pg=updateUser&link='.$tong_tien.'" method="post">
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
    </div>';
}

?>



<div class="container">
    <div class="row">
        <div class="col-12 text-center h2 mb-3">
            Trang đơn hàng
        </div>

    </div>
    <hr>
    <div class="row">
        
        <?php echo $user ?>
        <div class="col-6">
            <div class="text-center h5">Thông tin đơn hàng</div>
            <div class="list-product-bill">
                <div class="col-12 my-3 text-center">
                    <div class="row justify-content-center">
                        <div class="col-2">
                            Hình
                        </div>
                        <div class="col-4">
                            Tên sản phẩm
                        </div>
                        <div class="col-1">
                            sl
                        </div>
                        <div class="col-4">
                            Giá (đ)
                        </div>
                    </div>

                </div>
                <div class="col-12  border text-center">
                    <?php echo $show_sp_gh ?>

                </div>
            </div>
            <div class="">
                Tổng : <strong><?php echo number_format($tong_tien)  ?>đ</strong>
            </div>
        </div>
    </div>
    <div class="by my-5">
        <form action="index.php?pg=addbill" method="post">
            <input type="hidden" name="total" value="<?php echo $tong_tien ?>">
            <button class="btn btn-danger btn-block" name="submit"> Mua ngay</button>
        </form>
    </div>
</div>