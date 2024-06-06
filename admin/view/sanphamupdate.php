<?php

if (is_array($sp) && (count($sp)) > 0) {
    extract($sp);
    $idupdate = $ma_sp;
    $imgpath = IMG_PATH_ADMIN . $hinh;
    if (is_file($imgpath)) {
        $hinh = '<img src="' . $imgpath . '" width="80px"';
    }
}
// print_r($danhmuclist);
$html_danhmuclist = showdmup_admin($danhmuclist, $ma_dm);
?>
<div class="main-content">
    <h3 class="title-page">
        Cập nhập sản phẩm
    </h3>

    <form class="addPro" action="index.php?pg=updateproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
            </div>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" value="<?= ($ten_sp != "") ? $ten_sp : ""; ?>" id="name" placeholder="Nhập tên sả phẩm">
            <?= $hinh; ?>
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="ma_dm" aria-label="Default select example">
                <option selected>Chọn danh mục</option>
                <?= $html_danhmuclist; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" value="<?= ($gia > 0) ? $gia : 0; ?>" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea class="form-control" name="detail" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $idupdate; ?>">
            <button type="submit" name="updateproduct" class="btn btn-primary">Cập nhập sản phẩm</button>
        </div>
    </form>
</div>

<script>
    new DataTable('#example');
</script>