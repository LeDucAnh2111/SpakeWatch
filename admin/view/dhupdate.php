<?php
if (is_array($dh) && (count($dh)) > 0) {
    extract($dh);
}
?>
<div class="main-content">
    <h3 class="title-page">
        Cập nhập trạng thái đơn hàng
    </h3>

    <form class="addPro" action="index.php?pg=updatedh" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label for="categories">Trạng thái:</label>
            <select class="form-select" name="trangthai" aria-label="Default select example">
                <option selected>Chọn trạng thái</option>
                <option value="phe-duyet">Phê duyệt</option>
                <option value="xac-nhan">Xác nhận</option>
                <option value="dang-giao">Đang giao</option>
                <option value="da-giao">Đã giao </option>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $ma_don; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Cập nhập trạng thái</button>
        </div>
    </form>
</div>

<script>
    new DataTable('#example');
</script>