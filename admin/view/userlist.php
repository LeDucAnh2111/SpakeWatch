<?php
    $html_userlist=showuser_admin($userlist);
?>
<div class="main-content">
                <h3 class="title-page">
                    Sản phẩm
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=sanphamadd" class="btn btn-primary mb-2">Thêm sản phẩm</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?=$html_userlist;?>
                        
                        
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
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