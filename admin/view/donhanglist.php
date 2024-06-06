<?php
$html_dhlist = showdh($dhlist);
?>
<div class="main-content">
    <h3 class="title-page">
        Bình luận
    </h3>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ngày mua</th>
                <th>Tổng tiền</th>
                <th>Trạng thái
                <th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?= $html_dhlist; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Ngày mua</th>
                <th>Tổng tiền</th>
                <th>Trạng thái
                <th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
<script>
    new DataTable('#example');
</script>