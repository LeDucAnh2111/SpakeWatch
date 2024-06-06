<?php
$showProduct = "";
$show_comment = "";
// $user=user_select_id($ma_tk);
foreach ($list_bl as $value) {
    extract($value);
    // print_r($value);
    $user = user_select_id($ma_tk);
    // print_r($user);
    $show_comment .= '
    <div class="row border my-3">
                <div class="col-6 text-secondary ">
                    Người bình luận: <span>
                    ' . $user[0]["taikhoan"] . '
                    </span>
                </div>
                <div class="col-6 text-right text-secondary">
                 <span>
                        ' . $ngay_bl . '
                    </span>
                </div>
                <hr>
                <div class="col-12 m-3 text-secondary">
                Nội dung: <span class="text-dark">
                ' . $noi_dung . '
                    </span>
                </div>
            </div>
    ';
}

if (isset($_SESSION["user"])) {
    $button = '<button class="btn w-75 h-100" name="submit-form">
                Thêm vào giỏ hàng
            </button>';
    $form = ' <form action="index.php?pg=addbl&ma_sp=' . $_GET["idsp"] . '" method="post">
    <textarea name="comment" id="" rows="5" class="w-100 border"></textarea>
    <input type="hidden" name="">
    <button class="btn btn-comment" name="guibl">
        Gửi
    </button>
</form>';
} else {
    $_SESSION['idpro'] = $_GET["idsp"];
    $button = '<a class="btn w-75 h-100 bg-warning"  href="index.php?pg=login&idpro=' . $_GET["idsp"] . '">Vui lòng đăng nhập</a>';
    $form = '<a class=""  href="index.php?pg=login&idpro=' . $_GET["idsp"] . '">Vui lòng đăng nhập</a>';
}

foreach ($product as $value) {
    extract($value);
    if ($ma_dm == 1) {
        $gioitinh = "Nam";
    } else {
        $gioitinh = "Nữ";
    }
    $showProduct .= '
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12 text-center border">
                        <a href="" class="main-img">
                            <img class=" " style="width: 100%;" src="layout-v2/layout/img/product/' . $hinh . '" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 info-chitet-product">
                <div class="header-product">
                ' . $ten_sp . '
                </div>
                <div class="price">
                ' . number_format($gia) . 'đ
                </div>
                <div class="status">
                    Trạng thái: <span>' . $trang_thai . '</span>
                </div>
                <div class="mota">
                ' . $mo_ta . '
                </div>
                <div class="size">
                    <form action="index.php?pg=addToCart&idsp=' . $_GET["idsp"] . '" method="post">
                        <div class="name">
                            Kích thước
                        </div>
                        <div class="watch-emlement d-inline-block">
                            <input type="radio" class="size-data" name="size" id="watch-40mm" value="40MM" checked>
                            <label class=" border px-2 choose" for="watch-40mm">40MM</label>
                        </div>
                        <div class="watch-emlement d-inline-block">
                            <input type="radio" class="size-data" name="size" id="watch-42mm"value="42MM">
                            <label class=" border px-2 choose" for="watch-42mm">42MM</label>
                        </div>
                        <div class="watch-emlement d-inline-block">
                            <input type="radio" class="size-data" name="size" id="watch-44mm"value="44MM">
                            <label class=" border px-2 choose" for="watch-44mm">44MM</label>
                        </div>

                        <div class="color">
                            <div class="color-name">
                                Màu sắc
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="color-data" name="color" id="color-nau" value="nau" checked>
                                <label class=" border px-2 choose-color" for="color-nau">
                                    <i class="fa-solid fa-check"></i>
                                    <div class="note">
                                        Nâu
                                    </div>
                                </label>
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="color-data" name="color" id="color-xam" value="xam">
                                <label class=" border px-2 choose-color" for="color-xam">
                                    <i class="fa-solid fa-check"></i>
                                    <div class="note">
                                        Xám
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="soluong">
                                    <div class="name-sl">
                                        Số lượng
                                    </div>
                                    <div class="minus border btn math">
                                        <i class="fa-solid fa-minus" value="minus"></i>
                                    </div>

                                    <input type="number" name="sl" class="border sl" value="1" min="1" max="10">

                                    <div class="plus border btn math">
                                        <i class="fa-solid fa-plus" value="plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                ' . $button . '
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 100px;">
            <div class="row product-tab">
                <div class="col-12 tabs-title">
                    <div class="d-inline-block  info-detail " id="choosed">Mô tả</div>
                    <div class="d-inline-block  info-detail">Đánh giá</div>
                </div>

                <div class="col-12 infomation-detail table-infomation">
                    <div class="border p-4">
                        <p> ' . $mo_ta . '.</p>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    THƯƠNG HIỆU:
                                </td>
                                <td>
                                    Enicar
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    MÃ SẢN PHẨM:
                                </td>
                                <td>
                                    3168/50/351AA

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    GIỚI TÍNH:
                                </td>
                                <td>
                                ' . $gioitinh . '
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    XUẤT XỨ:
                                </td>
                                <td>
                                    Thụy Sĩ
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    LOẠI ĐỒNG HỒ:
                                </td>
                                <td>
                                    Đồng hồ cơ
                                </td>
                            </tr>
                        </table>
                        <p>Trong quá trình sử dụng, nếu phát hiện bất kỳ hiện tượng không bình thường, Quý khách cần
                            liên hệ hoặc mang đồng hồ đến ngay các Trung tâm kỹ thuật và bảo hành của Công ty để được tư
                            vấn và kiểm tra.

                            Phạm vi bảo hành đồng hồ bao gồm các lỗi kỹ thuật về máy ( như đồng hồ không chạy, chạy
                            không chính xác), độ chịu nước và pin đồng hồ. Các trường hợp không bảo hành đồng hồ gồm các
                            lỗi về vỏ và dây của đồng hồ; các lỗi rơi vỡ, va đập làm xước kính trong quá trình khách
                            hàng sử dụng gây nên; dây da gặp vấn đề; không bảo hành cho trường hợp điều chỉnh, sử dụng
                            không đúng cách của người dùng; không bảo hành cho đồng hồ đã sửa chữa tại những nơi không
                            phải là trung tâm bảo hành của công ty.</p>
                    </div>
                </div>
                <div class="col-12 box-comment">
                ' . $form . '
                </div>
                <div class="col-12">
                    ' . $show_comment . '
                </div>
            </div>
        ';
}
$showSpLienQuan = "";
foreach ($splienquan as $value) {
    extract($value);
    $showSpLienQuan .= '
        <div class="col-md-3 my-3 ">
        <div class="box-product">
            <div class="product-thumbnail">
                <a href=""><img class="w-100" src="layout-v2/layout/img/product/' . $hinh . '" alt=""></a>
            </div>
            <div class="info-product">
                <div class="product-name d-block text-center py-2">
                    <a href="" class=""> ' . $ten_sp . '</a>
                </div>
                <div class="product-price d-block">
                    <div class="special-price text-center text-secondary pb-3">
                    ' . number_format($gia) . '₫
                    </div>
                </div>
                <div class="view-cart text-center">
                    <a href="" class="d-inline-block">
                        <div class="view border rounded-circle">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </a>
                    <a href="" class="d-inline-block">
                        <div class="cart border rounded-circle">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
        ';
    info_user($ma_sp);
}
?>
<div class="container my-5">
    <?php echo $showProduct ?>


</div>
<div class="container">
    <div class="row list-product">
        <div class="col-12 ">
            <div class="row product new-product">

                <?php echo $showSpLienQuan ?>
            </div>
        </div>

    </div>
</div>

</div>