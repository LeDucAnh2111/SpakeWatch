<?php
$html_dssp = "";
$i = 1;
foreach ($dssp as $sp) {
    extract($sp);
    $html_dssp .= '<tr>
         <td>' . $i . '</td>
         <td><img src="' . IMG_PATH_ADMIN . $hinh . '" alt="' . $ten_sp . '" width="80px"></td>
         <td>' . $ten_sp . '</td>
         <td>' . number_format($gia, 0, ",", ".") . '</td>
         <td>' . $so_luot_xem . '</td>
         <td>
             <a href="index.php?pg=sanphamupdate&ma_sp=' . $ma_sp . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
             <a href="index.php?pg=delproduct&ma_sp=' . $ma_sp . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
         </td>
         </tr>';
    $i++;
}
?>
<div class="main-content">
    <h3 class="title-page">
        Sản phẩm
    </h3>
    <div class="d-flex justify-content-end">
        <a href="index.php?pg=sanphamadd" class="btn btn-primary mb-2">Thêm sản phẩm</a>
    </div>
    <div class="d-flex justify-content-start">
        <form action="index.php?pg=sanphamlist" method="post">

            <input type="text" class="form-comtrol" name="kyw" id="">


            <button type="submit" class="btn btn-primary" name="timkiem">Tìm kiếm</button>
        </form>
    </div>
    <div>
        <!-- <?php
                echo $hienthisotrang;
                ?> -->
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình</th>
                <th>Tên SP</th>
                <th>Gía</th>
                <th>Lượt xem</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <a href="" class="r"></a>
            <?= $html_dssp; ?>


        </tbody>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Hình</th>
                <th>Tên SP</th>
                <th>Gía</th>
                <th>Lượt xem</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
    <div class="d-flex justify-content-center">
        <?php
        echo $hienthisotrang;
        ?>
    </div>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
<script>
    new DataTable('#example');
</script>