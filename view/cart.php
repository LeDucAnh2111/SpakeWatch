<?php
$show_list_pro = "";
$total = 0;
$slgh = 0;
foreach ($list_pro as $value) {
    extract($value);
    $slgh++;
    // $total_pro=0;
    $product = chitietsp($ma_sp);
    $show_list_pro .= '
        <div class="col-12 my-2">
        <div class="row item">

        <div class="col-2 text-center">
            <img src="layout-v2/layout/img/product/' . $product[0]["hinh"] . '" class="w-75" alt="">
        </div>
        <div class="col-3 text-center ">' . $product[0]["ten_sp"] . '</div>
        <div class="col-3 text-center">
        <form action="index.php?pg=update_cart" method="post" class="d-flex justify-content-center">
            <input type="number" name="soluong" value="' . $sl . '" class="w-25 sl" >
            <input type="hidden" name="ma_sp" value="' . $ma_sp . '" class="" >
            <button class="btn w-50 ml-1 btn-warning " name="submit_update" id="tdsl" disabled> Lưu</button>
        </form>
        
        </div>
        <div class="col-3 text-center price_pro" value="' . $product[0]["gia"] . '">' . number_format($product[0]["gia"]) . '</div>
        <div class="col-1 text-center">
            <a href="index.php?pg=delete_cart&idsp=' . $product[0]["ma_sp"] . '" class="btn "><i class="fa-regular fa-trash-can"></i></a>
        </div>
    </div>
    <hr>
    </div>';
    // 
}
?>
<button></button>


<div class="container cart ">
    <div class="row box mt-3">
        <div class="left col-8 h6">
            <a href="index.php" class="text-decoration-none d-block text-dark">
                <i class="fa-solid fa-chevron-left"></i>
                Tiếp tục mua sắm
            </a>
            <hr>
            <div class=" header">
                Giỏ hàng
                <span class="d-block number text-secondary"> Có <span><?php echo $slgh ?></span> sản phẩm trong giỏ</span>
            </div>
            <?php if (!empty($list_pro)) { ?>
                <div class="row ">
                    <div class="col-2 text-center">
                        Ảnh
                    </div>
                    <div class="col-3 text-center">Tên</div>
                    <div class="col-3 text-center">Số lượng</div>
                    <div class="col-3 text-center">Giá(VND)</div>
                    <div class="col-1 text-center">Xóa</div>
                </div>

                <div class="row mt-4  border rounded py-1">
                    <?php echo $show_list_pro ?>
                </div>
            <?php }; ?>

        </div>
        <div class="right col-4">
            <div class="row justify-content-center ">
                <div class="col-10 border p-3 rounded ">
                    <div class="row">
                        <div class="col-12 header-right h5 text-center">
                            Thông tin giỏ hàng
                        </div>
                        <!-- <div class="col-12 mt-3">Sản phẩm muốn thanh toán</div> -->
                        <!-- List sản phẩm muốn thanh toán -->
                        <div class="row justify-content-center list-pay">
                            <div class="col-10 ">
                                <form action="index.php?pg=donhang" method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="hidden" name="id" value="2">
                                    <div class="row summary">
                                        <ul class="list-unstyled text-secondary">
                                            <li>ĐỔI HÀNG MIỄN PHÍ - Tại tất cả cửa hàng trong 15 ngày</li>
                                            <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                                        </ul>
                                    </div>
                                    <div class="total_all h5 py-4">
                                        Tổng : <span></span>
                                        <input type="hidden" name="total" id="input-total" value=>
                                    </div>
                                    <button class="btn btn-danger w-100" name="submit"> Thanh toán</button>
                                </form>
                            </div>
                        </div>
                        <!-- end list -->
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>