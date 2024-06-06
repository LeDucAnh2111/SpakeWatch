<div class="main-content">
                <h3 class="title-page">
                    Thêm danh mục
                </h3>
                
                <form class="addPro" action="index.php?pg=danhmuc_add" method="post" >
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="btnadd" class="btn btn-primary">Thêm danh mục</button>
                        <?php
                            if(isset($tb)&&($tb!="")){echo $tb;}
                        ?>
                    </div>
                </form>
            </div>