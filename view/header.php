<?php
if (!isset($_SESSION["user"])) {

    // thêm người dùng vào database
    $client = '
        <div class="login pl-4 ">
        <a href="index.php?pg=login" class="text-dark"> <i class="fa-solid fa-user pr-2"></i>Đăng Nhập</a>
    </div>
    <hr>
    <div class="dangky pl-4 ">
        <a href="index.php?pg=dangky" class="text-dark"><i class="fa-solid fa-user-plus pr-2"></i>Đăng
            Ký</a>
    </div>
        ';

    $cart = '
    <a href="" class="alight-center h-100 " data-toggle="modal" data-target="#warning-toggle" >
    <i class="fa-solid fa-cart-shopping fa-lg"></i>
    </a>
';
} else {
    $client = '
    <div class="login pl-4 ">
    <a href="index.php?pg=infoUser" class="text-dark"> <i class="fa-solid fa-user pr-2"></i>' . $_SESSION["user"][0]["taikhoan"] . '</a>
</div>
<hr>
<div class="dangky pl-4 ">
    <a href="index.php?pg=delete_user" class="text-danger"><i class="fa-solid fa-right-from-bracket pr-2 text-danger"></i></i>Đăng Xuất</a>
</div>
    ';
    $cart = '
    <a href="index.php?pg=cart" class="alight-center h-100">
    <i class="fa-solid fa-cart-shopping fa-lg"></i>
    </a>
    ';
}
$listDm = showdmuser();
$dm = show($listDm);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- reset -->
    <link rel="stylesheet" href="layout-v2/layout/css/reset.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="layout-v2/layout/bootstrap_4/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Owl -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom -->
    <link rel="stylesheet" href="layout-v2/layout/css/custom.css">
</head>



<div class="modal fade" id="warning-toggle">
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


<body>

    <div class="container">
        <div class="row">
            <!-- Welcome  -->
            <div class="col-md-4 text-left py-4">
                Chào mừng bạn đến với SPARKLE WATCH!
            </div>
            <!-- Logo -->
            <div class="col-md-4 py-4 text-center logo">
                <img class="w-75" src="layout-v2/layout/img/logo 1.png" alt="">
            </div>
            <!-- info user -->
            <div class="col-md-4">
                <div class="row h-100 justify-content-end">
                    <div class=" info-user">
                        <ul class="list-unstyled list-inline text-right h-100 cart-info ">
                            <li class="h-100 form-search">
                                <div class=" text-right search shadow-sm rounded-pill border border-secondary">

                                    <form action="index.php?pg=sanpham" method="post" class="h-100">
                                        <input type="text" class=" pl-3 w-100 rounded-pill" name="ndtimkiem" id="" placeholder="Search...">
                                        <button name="timkiem" class="btn">
                                            <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                        </button>
                                    </form>

                                </div>

                                <i class="fa-solid fa-magnifying-glass fa-lg"></i>

                            </li>
                            <li class="h-100">
                                <?php echo $cart ?>
                            </li>
                            <li class="h-100 info">
                                <!-- <a href="index.php?pg=login" class="alight-center h-100"> -->
                                <i class="fa-solid fa-user"></i>
                                <!-- </a> -->
                                <div class="user border py-2 shadow-sm ">
                                    <?php echo $client ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="nav">
        <div class="container">
            <div class="row justify-content-center">
                <div class="box-menuHeader w-100">
                    <ul class="menuHeader list-unstyled list-inline text-center my-0">
                        <li class="py-4"><a href="index.php">Trang chủ </a></li>
                        <li class="py-4 mainMenu">
                            <a href="index.php?pg=sanpham" class="d-inline-block">Sản phẩm<i class="fa-solid fa-chevron-down fa-2xs"></i></a>
                            <ul class="subMenu position-absolute border text-left shadow rounded">
                                <?php echo $dm ?>
                            </ul>
                        </li>
                        <li class="py-4"><a href="">Giới thiệu</a></li>
                        <li class="py-4"><a href="">Tin tức</a></li>
                        <li class="py-4"><a href="index.php?pg=lienhe">Liên hệ</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>