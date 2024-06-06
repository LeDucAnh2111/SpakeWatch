<?php
$product_new = "";
foreach ($listProductNew as $value) {
    extract($value);
    $product_new .= '
        <div class="col-md-3 my-3 ">
                    <div class="box-product">
                        <div class="product-thumbnail">
                            <a href="?pg=chitietsp&idsp=' . $ma_sp . '"><img class="w-100" src="layout-v2/layout/img/product/' . $hinh . '" alt=""></a>
                        </div>
                        <div class="info-product">
                            <div class="product-name d-block text-center py-2">
                                <a href="" class=""> ' . $ten_sp . '</a>
                            </div>
                            <div class="product-price d-block">
                                <div class="special-price text-center text-secondary pb-3">
                                ' . number_format($gia) . 'đ
                                </div>
                            </div>
                            <div class="view-cart text-center">
                                <a href="index.php?pg=chitietsp&idsp=' . $ma_sp . '" class="d-inline-block">
                                    <div class="view border rounded-circle">
                                        <i class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                ' .  info_user($ma_sp) . '
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="modal fade" id="hinh' . $ma_sp . '">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <h5> Thông báo</h5>
                            </div>
                            <button class="close" data-dismiss="modal"><span><i class="fa-solid fa-xmark"></i></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="container_fluid">
                                <div class="row">
                                    <div class="col-4">
                                        <img class="w-100" src="layout-v2/layout/img/product/' . $hinh . '" alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="info-product_modal">
                                            <div class="header">
                                                <h5>' . $ten_sp . '</h5>
                                            </div>
                                            <div class="price">
                                                <strong>' . number_format($gia) . 'đ</strong>
                                            </div>
                                        </div>
                                        <form action="index.php?pg=addToCart&idsp=' . $ma_sp . '" method="post">
                                        <div>
                                        <label for="sl"> Số lượng</label>
                                        <input type="number" name="sl" class="border sl" value="1" min="1" max="10">
                                        </div>
                                        <div class="color">
                                        <div class="watch-emlement d-inline-block">
                            <input type="radio" class="" name="size" id="w' . $ma_sp . '-40mm" value="40MM" checked>
                            <label class=" border px-2 choose" for="w' . $ma_sp . '-40mm">40MM</label>
                            
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="" name="size" id="w' . $ma_sp . '-42mm"value="42MM">
                                <label class=" border px-2 choose" for="w' . $ma_sp . '-42mm">42MM</label>
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="" name="size" id="w' . $ma_sp . '-44mm"value="44MM">
                                <label class=" border px-2 choose" for="w' . $ma_sp . '-44mm">44MM</label>
                            </div>


                            <div class="cl-name">
                                Màu sắc
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="" name="color" id="cl' . $ma_sp . '-nau" value="nau" checked>
                                <label class=" border px-2 choose-color" for="cl' . $ma_sp . '-nau">
                                        Nâu
                                </label>
                            </div>
                            <div class="watch-emlement d-inline-block">
                                <input type="radio" class="" name="color" id="cl' . $ma_sp . '-xam" value="xam">
                                <label class=" border px-2 choose-color" for="cl' . $ma_sp . '-xam">
                                        Xám
                                </label>
                            </div>
                        </div>
                                        <button class="btn btn-danger" name="submit-form">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">
                                Đóng
                            </button>
                        </div>
                    </div>
                </div>
            </div> 
                
        ';
}
$product_view = "";
foreach ($listProductView as $value) {
    extract($value);
    $product_view .= '
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
                                ' . number_format($gia) . 'đ
                                </div>
                            </div>
                            <div class="view-cart text-center">
                            <a href="index.php?pg=chitietsp&idsp=' . $ma_sp . '" class="d-inline-block">
                            <div class="view border rounded-circle">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </a>
                                ' .  info_user($ma_sp) . '
                            </div>
                        </div>
                    </div>
                </div>
                
        ';
}

$listDm = showdmuser();
$dm = show_block_dm($listDm)
?>



<div class="box">
    <div class="owl-carousel owl-theme" style="margin: 0;">
        <div class="item">
            <img src="layout-v2/layout/img/banner.jpg" alt="">
        </div>
        <div class="item">
            <img src="layout-v2/layout/img/banner.jpg" alt="">
        </div>

    </div>
</div>


<div class="modal fade" id="report-toggle">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5> Thông báo</h5>
                </div>
                <button class="close" data-dismiss="modal"><span><i class="fa-solid fa-xmark"></i></span></button>
            </div>
            <div class="modal-body">
                Bạn hiện giờ chưa đăng nhập tài khoản, vui lòng đăng nhập tài khoản để tiếp tục !! <br>
                <a href="index.php?pg=login">Đăng nhập</a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</div>



<div class="container  " style="margin-bottom: 60px;">
    <div class="row d-flex justify-content-center">
        <?php echo $dm ?>
        <!-- <div class="banner col-4">
            <div class="img">
                <img class="w-100" src="layout-v2/layout/img/banner_1.webp" alt="">
            </div>
            <div class="content">
                <div class="name">Đồng hồ Nam</div>
                <a href="" class="btn">Mua ngay</a>
            </div>
        </div> -->
        <!-- <div class="banner col-4">
            <div class="img">
                <img class="w-100" src="layout-v2/layout/img/banner_1.webp" alt="">
            </div>
            <div class="content">
                <div class="name">Mua ngay 60%</div>
                <a href="" class="btn">Mua ngay</a>
            </div>
        </div> -->
        <!-- <div class="banner col-4">
            <div class="img">
                <img class="w-100" src="layout-v2/layout/img/banner_1.webp" alt="">
            </div>
            <div class="content">
                <div class="name">Đồng Hồ Nữ</div>
                <a href="" class="btn">Mua ngay</a>
            </div>
        </div> -->
    </div>
</div>
<div class="container">
    <div class="row list-product">
        <div class="col-md-12 box-title">
            <div class="title d-block text-center">
                <a href="">Sản phẩm</a>
            </div>
            <hr>
            <div class="style-product text-center">
                <div class="text-decoration-none mx-2">Sản phẩm mới</div>
                <div class="text-decoration-none mx-2">Sản phẩm bán chạy</div>
                <!-- <div class="text-decoration-none mx-2">Sản phẩm giảm giá</div> -->
            </div>
        </div>
        <div class="row product new-product">
            <?php echo $product_new ?>

        </div>
        <div class="row product discount-product ">
            <?php echo $product_view ?>

        </div>
        <div class="row product popular-product ">
            <div class="col-md-3 my-3 ">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                12.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
            <div class="col-md-3 my-3">
                <div class="box-product">
                    <div class="product-thumbnail">
                        <a href=""><img class="w-100" src="layout-v2/layout/img/product/pro-1.webp" alt=""></a>
                    </div>
                    <div class="info-product">
                        <div class="product-name d-block text-center py-2">
                            <a href="" class=""> Đồng hồ dress</a>
                        </div>
                        <div class="product-price d-block">
                            <div class="special-price text-center text-secondary pb-3">
                                14.000.000₫
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
        </div>

    </div>
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <div class="xemthem d-inline-block ">
                <a href="index.php?pg=sanpham" class="d-block text-decoration-none">xem thêm</a>
            </div>
        </div>
    </div>
</div>
<div class="box-size">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 size text-center">
                <div class="title-size d-inline-block">
                    <a href="">Sản phẩm đặc biệt</a>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 content-size">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-content-size text-secondary mb-3">
                            sản phẩm chúng tôi rất đặt biệt có một không hai trên thị trường
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <div class="col-md-6 img-size">
                                <img class="w-100" src="layout-v2/layout/img/size/size1.webp" alt="">
                            </div>
                            <div class="col-md-6 number-size">
                                <div>
                                    Nhỏ
                                </div>
                                <div class="number">
                                    QL-31mm
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <div class="col-md-6 img-size">
                                <img class="w-100" src="layout-v2/layout/img/size/2.webp" alt="">
                            </div>
                            <div class="col-md-6 number-size">
                                <div>
                                    Vừa
                                </div>
                                <div class="number">
                                    QL-31mm
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 img-size">
                                <img class="w-100" src="layout-v2/layout/img/size/3.webp" alt="">
                            </div>
                            <div class="col-md-6 number-size">
                                <div>
                                    Lớn
                                </div>
                                <div class="number">
                                    QL-31mm
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 img-size">
                                <img class="w-100" src="layout-v2/layout/img/size/4.webp" alt="">
                            </div>
                            <div class="col-md-6 number-size">
                                <div>
                                    Lớn nhất
                                </div>
                                <div class="number">
                                    QL-31mm
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img class="w-100" src="layout-v2/layout/img/size/5.webp" alt="">
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row producer mb-5">
        <div class="owl-carousel owl-theme" style="margin: 0;">
            <div class="col-md-12 producer text-center item">
                <div class="img d-inline-block">
                    <img class="w-100 rounded-circle" src="layout-v2/layout/img/producer/1.webp" alt="">
                </div>
                <div class="info-producer">
                    <div class="name h6 pt-4">Nguyễn Hữ Tứ</div>
                    <div class="content text-secondary">
                        Là một trong số rất ít các nhà sản xuất trên thế giới mà thực sự sản xuất đồng hồ cơ khí tại
                        các cơ sở sản xuất riêng của mình , và là một trong những nhà sản xuất đồng hồ hiện dài nhất
                        của Nhật Bản
                    </div>
                    <div class="w-25 d-inline-block">
                        <hr class="my-1">
                    </div>
                    <div class="text">
                        Chúng tôi luôn tin tưởng shop
                    </div>
                </div>
            </div>
            <div class="col-md-12 producer text-center item">
                <div class="img d-inline-block">
                    <img class="w-100 rounded-circle" src="layout-v2/layout/img/producer/2.webp" alt="">
                </div>
                <div class="info-producer">
                    <div class="name h6 pt-4">Nguyễn Xuân Mai</div>
                    <div class="content text-secondary">
                        Là một trong số rất ít các nhà sản xuất trên thế giới mà thực sự sản xuất đồng hồ cơ khí tại
                        các cơ sở sản xuất riêng của mình , và là một trong những nhà sản xuất đồng hồ hiện dài nhất
                        của Nhật Bản
                    </div>
                    <div class="w-25 d-inline-block">
                        <hr class="my-1">
                    </div>
                    <div class="text">
                        Chúng tôi luôn tin tưởng shop
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 news ">
            <div class="title-news text-center">
                <a href="" class="">
                    Tin mới Nhất
                </a>
            </div>
            <hr>
            <div class="row mb-5">
                <div class="owl-carousel owl-theme" style="margin: 0;">
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/1.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Chiêm ngưỡng Citizen NP1026-86A
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/2.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Thay pin đồng hồ như thế nào?
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/3.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Đồng hồ nữ dây da trắng đẹp mắt
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/4.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Tuyệt phẩm đồng hồ Hamilton
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/5.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Hamilton lộ máy đẹp tuyệt sắc
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="" class="news-item">
                            <div class="news-img">
                                <img class="w-100" src="layout-v2/layout/img/news/6.webp" alt="">
                                <div class="name-title">
                                    <div class="date">
                                        16/12/2018
                                    </div>
                                    <div class="name">
                                        Kiến thức về đồng hồ ORIENT
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row my-3 brand">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme" style="margin: 0;">
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand1.webp" alt="">
                    </div>
                </div>
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand2.webp" alt="">
                    </div>
                </div>
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand3.webp" alt="">
                    </div>
                </div>
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand4.webp" alt="">
                    </div>
                </div>
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand5.webp" alt="">
                    </div>
                </div>
                <div class="item text-center">
                    <div class="col-md-8 d-inline-block">
                        <img src="layout-v2/layout/img/brand/brand6.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>