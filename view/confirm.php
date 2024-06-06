<?php

$kq = "";
$sp = "";

foreach ($idbill as $value) {
    $ctsp = "";
    extract($value);
    $ctdh = get_ctdh_ma_bill($ma_don);
    foreach ($ctdh as $product) {
        extract($product);
        $ctspdb = chitietsp($product['ma_sp']);
        $ctsp .= '
            <div class="row">
            <div class="col-2 ">
                <img class="w-100" src="layout-v2/layout/img/product/' . $ctspdb[0]["hinh"] . '" alt="">
            </div>
            <div class="col-4 ">
                ' . $ctspdb[0]["ten_sp"] . '
            </div>
            <div class="col-3 ">
                ' . number_format($ctspdb[0]["gia"]) . 'đ
            </div>
            <div class="col-3 ">
                ' . $product['so_luong_sp'] . '
            </div>
            </div>';
    }
    $info_bill = get_all_madh($ma_don);
    if ($info_bill[0]['trang_thai'] == "phe-duyet") {
        // print_r($info_bill[0]['trang_thai']);
        $trangthai = '
            <div class="modal fade" id="warningtoggle' . $info_bill[0]['ma_don'] . '">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5> Thông báo</h5>
                        </div>
                        <button class="close" data-dismiss="modal"><span><i class="fa-solid fa-xmark"></i></span></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc muốn xóa đơn hàng này không
                    </div>
                    <div class="modal-footer">
                    <form action="index.php?pg=deletebill&ma_don=' . $info_bill[0]['ma_don'] . '" method="post">
                        <button class="btn btn-primary" name="submit">
                            Có
                        </button>
                    </form>
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
            ';
    } else {
        $trangthai = '
            <div class="modal fade" id="warningtoggle' . $info_bill[0]['ma_don'] . '">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5> Thông báo</h5>
                        </div>
                        <button class="close" data-dismiss="modal"><span><i class="fa-solid fa-xmark"></i></span></button>
                    </div>
                    <div class="modal-body">
                       Đơn hàng đã được xác nhận không thể xóa được
                        
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
    // print_r($info_bill[0]['ma_don']);
    $kq .= '
    <div class="col-4 my-5 border rounded">


            <div class="row mt-2">
                <div class="col-12 text-right ">
                <a href="" data-toggle="modal" data-target="#warningtoggle' . $info_bill[0]['ma_don'] . '" class="d-inline-block" >
                <div class=" text-dark">
                <i class="fa-solid fa-xmark"></i>
                </div>
                </a>  
                </div>
                <div class="col-12 ">
                    Ngày mua : <span>' . $info_bill[0]['ngay_mua'] . '</span>
                </div>
                <div class="col-12 ">
                    Tổng tiền : <span>' . number_format($info_bill[0]['tong_tien']) . 'đ</span>
                </div>
                <div class="col-12 mb-3 ">
                    Trạng thái : <span class="btn-warning">' . $info_bill[0]['trang_thai'] . '</span>
                </div>
            </div>

            ' . $ctsp . '
        </div>
        ' . $trangthai . '
    ';
}


?>


<img src="" alt="">
<div class="container">
    <div class="row">
        <a href="index.php?pg=infoUser" class="text-dark text-decoration-none">
            < Quay lại trang thông tin </a>
                <div class="col-12 my-3">
                    <h4 class="text-center ">Thông tin đơn hàng</h4>
                </div>
                <!-- <h5 class="text-center"> Thông tin sản phẩm </h5> -->
                <?php echo $kq ?>



    </div>
</div>
</div>