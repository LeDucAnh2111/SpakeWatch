<?php
    if(is_array($us) && (count($us))>0){
        extract($us);
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Cập nhập sản phẩm
                </h3>
                
                <form class="addPro" action="index.php?pg=updateuser" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" name="name" value="" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="name">Mật khẩu</label>
                        <input type="text" class="form-control" name="pass" value="" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" name="email" value="" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" value="" placeholder="Nhập địa chỉ">
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$ma_tk?>" >
                        <button type="submit" name="submit" class="btn btn-primary">Cập nhập thông tin</button>
                    </div>
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>