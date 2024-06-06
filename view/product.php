<?php
$show_listProduct = "";
foreach ($listProduct as $value) {
    extract($value);
    $show_listProduct .= '     
        <div class="col-4 my-3">
                        <div class="box-product">
                            <div class="product-thumbnail">
                                <a href="index.php?pg=chitietsp&idsp=' . $ma_sp . '"><img class="w-100" src="layout-v2/layout/img/product/' . $hinh . '" alt=""></a>
                            </div>
                            <div class="info-product">
                                <div class="product-name d-block text-center py-2">
                                    <a href="" class="index.php?pg=chitietsp&idsp=' . $ma_sp . '"> ' . $ten_sp . '</a>
                                </div>
                                <div class="product-price d-block">
                                    <div class="special-price text-center text-secondary pb-3">
                                    ' . number_format($gia) . '₫
                                    </div>
                                </div>
                                <div class="view-cart text-center">
                                <a href="index.php?pg=chitietsp&idsp=' . $ma_sp . '" class="d-inline-block">
                                <div class="view border rounded-circle">
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </a>
                                    ' . info_user($ma_sp) . '
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
                                    <div class="col-3">
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
};

$show_spnnoibat = "";
foreach ($spnoibat as $value) {
    extract($value);
    $show_spnnoibat .= '
        
        <li class="list-item">
                                <a href="index.php?pg=chitietsp&idsp=' . $ma_sp . '" class="d-block ">
                                    <div class="row">
                                        <div class="col-5">
                                            <img src="layout-v2/layout/img/product/' . $hinh . '" class="w-100" alt="">
                                        </div>
                                        <div class="col-7 boc py-2">
                                            <div class="name-pro py-2">
                                            ' . $ten_sp . '
                                            </div>
                                            <div class="price">
                                            ' . number_format($gia) . '
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </li>';
};

?>


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
<div class="page-product">
    <div class="slide-show">
        <div class="container">
            <div class="row bread-crumb py-5">
                <div class="col-md-12 title text-center">
                    Đồng hồ dress
                </div>
                <div class="col-md-12 text-center duongdan">
                    <a href="" class="text-decoration-none">Trang chủ</a>/
                    <div class="d-inline-block">Sản phẩm</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="row left-box">
                    <div class="col-12">

                        <div class="header-menu h5 px-3 py-2">
                            Danh mục
                        </div>
                        <ul class="left-menu list-unstyled">
                            <li class="menu-item py-2"><a href="">Trang chủ</a></li>
                            <li class="menu-item h-sub-menu py-2">
                                <a href="">Sản phẩm</a>
                                <span class="d-inline-block down-pg-product">
                                    <i class="fa-solid fa-chevron-down text-secondary"></i>
                                </span>
                                <ul class="sub-menu-left">
                                    <li class="menu-item py-2">
                                        <a href="">Đồng hồ nam</a>
                                    </li>
                                    <li class="menu-item py-2">
                                        <a href="">Đồng hồ nữ</a>
                                    </li>
                                    <li class="menu-item py-2">
                                        <a href="">Sản phẩm nỗi bật</a>
                                    </li>
                                    <li class="menu-item py-2">
                                        <a href="">Sản phẩm khuyến mãi</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item py-2"><a href="">Giới thiệu</a></li>
                            <li class="menu-item py-2"><a href="">Tin tức</a></li>
                            <li class="menu-item py-2"><a href="">Liên hệ</a></li>
                        </ul>

                    </div>
                    <div class="col-12">
                        <div class="header-menu h5 px-3 py-2">
                            Sản phẩm nỗi bật
                        </div>
                        <form action="index.php?pg=filter_price" method="post">
                            <input type="range" name="filter_price" id="filter_price" class="form-control bg-dark" min="0" max="30000000" value="0" style="accent-color: #ffc107;  color: silver; " id="">
                            <div id="show_price" class="my-2"> Giá dưới: <span>0</span>đ</div>
                            <button name="submit" class="btn btn-warning btn-block">Lọc giá</button>
                        </form>
                        <ul class="list-pro-highlight list-unstyled">
                            <?php echo $show_spnnoibat ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row list-product">
                    <?php echo $show_listProduct ?>

                </div>
            </div>
        </div>
    </div>
</div>