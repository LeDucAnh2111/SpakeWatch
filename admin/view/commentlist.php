<?php
    $html_cmtlist=showbl($cmtlist);
?>
<div class="main-content">
                <h3 class="title-page">
                    Bình luận
                </h3>
                
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Nội dung</th>
                            
                            <th>Ngày bình luận</th>
                            <th>Mã sản phẩm</th>
                            <th>Mã tài khoản</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?=$html_cmtlist;?>
                        
                        
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>STT</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Mã sản phẩm</th>
                            <th>Mã tài khoản</th>
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