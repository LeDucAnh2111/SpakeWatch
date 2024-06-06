<?php
$html_danhmuclist = showdmadd_admin($danhmuclist);
?>
<div class="main-content">
    <h3 class="title-page">
        Thêm sản phẩm
    </h3>

    <form class="addPro" action="index.php?pg=addproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="img">
            </div>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="iddm" id="iddm" aria-label="Default select example">
                <option selected value="0">Chọn danh mục</option>
                <?= $html_danhmuclist; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea class="form-control" name="detail" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="addproduct" onclick="return checkform()" class="btn btn-primary">Thêm sản phẩm</button>
            <button type="reset" class="btn btn-primary"> Nhập lại</button>
        </div>
    </form>
</div>

<script>
    function checkform() {
        var hinh = document.getElementById("img");

        if (hinh.value == "") {
            alert("Bạn phải thêm hình ảnh");
            hinh.focus();
            return false;
        }
        var ten_sp = document.getElementById("name");
        if (ten_sp.value == "") {
            alert("Bạn nhập tên sản phẩm");
            ten_sp.focus();
            return false;
        }
        var ma_dm = document.getElementById("iddm");
        console.log(ma_dm);
        if (ma_dm.value == 0) {
            alert("Bạn phải chọn danh mục");
            ma_dm.focus();
            return false;
        }
        var gia = document.getElementById("price");
        if ((gia.value == 0) || (gia.value == "")) {
            alert("Bạn phải thêm giá cho sản phẩm");
            gia.focus();
            return false;
        }

        return true;
    }
    // new DataTable('#example');
</script>