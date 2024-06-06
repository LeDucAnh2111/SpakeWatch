<?php
$html_counttv = "";
if (isset($count_tv) && is_array($count_tv)) {
    // extract($tv);

    $html_counttv .= '
        <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers">' . $count_tv[0][0] . '</span>
                            </div>
        ';
} else {
    echo "Không có dữ liệu";
}
$bill = "";
$bill1 = "";
if (is_array($dm) && !empty($dm)) {
    foreach ($dm as $value) {
        extract($value);
        $bill .= '
        <tr>
                            <td>' . $ma_don . '</td>
                            <td>' . $ma_tk . '</td>
                            <td>' . $tong_tien . '</td>
                        </tr>
        ';
        $bill1 .= '
        <tr>
                            <td>' . $ma_don . '</td>
                            <td>' . $trang_thai . '</td>
                        </tr>
        ';
    }
}

$user = "";
if (is_array($listUser) && !empty($dm)) {
    foreach ($listUser as $value) {
        extract($value);
        $user .= '
        <tr>
        <td>' . $ma_tk  . '</td>
        <td>' . $taikhoan  . '</td>
    </tr>
        ';
    }
}


?>


<div class="main-content">
    <h3 class="title-page">
        Dashboards
    </h3>
    <section class="statistics row">
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="index.php?pg=sanphamlist">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng sản phẩm
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $count_sp[0][0] ?></span>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="index.php?pg=catalog">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng danh mục
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $count_dm[0][0] ?></span>
                </div>
            </a>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="index.php?pg=donhang">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng đơn hàng
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $count_dh[0][0] ?></span>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="index.php?pg=userslist">
                <div class="card mb-3 widget-chart">
                    <?= $html_counttv; ?>
                    <!-- <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers">3M</span>
                            </div> -->
            </a>
        </div>

    </section>
    <section class="row">
        <div class="col-sm-12 col-md-6 col xl-6">
            <div class="card chart">
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                        <span class="input-group-text">Đến ngày</span>
                        <input type="date" class="form-control" placeholder="Server" aria-label="Server">
                        <button type="button" class="btn btn-primary">Xem</button>
                    </div>
                </form>
                <p>Tổng doanh thu: <span>100.000.000 VND</span></p>
                <table class="revenue table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Mã đơn hàng</th>
                        <th>Doanh thu</th>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td>GIA001</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>GIA002</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>GIA003</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>GIA004</td>
                            <td>100.000</td>
                        </tr> -->
                        <?php echo $bill ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <div class="card chart">
                <h4>Đơn hàng mới</h4>
                <table class="revenue table table-hover">
                    <thead>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                    </thead>
                    <tbody>
                        <?php echo $bill1 ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <div class="card chart">
                <h4>Khách hàng mới</h4>
                <table class="revenue table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Username</th>
                    </thead>
                    <tbody>

                        <?php echo $user ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
<script>
    new DataTable('#example');
</script>