<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <form action="index.php?pg=checkUpdatePass" method="post" id="updatePass">
                <div class="form-group">
                    <label for="old-pass">Mật khẩu cũ</label>
                    <input type="text" class="form-control" id="old-pass" name="oldpass">
                </div>
                <div class="form-group">
                    <label for="old-pass">Mật khẩu mới</label>
                    <input type="text" class="form-control" id="newpass" name="newpass">
                </div>
                <div class="form-group">
                    <label for="old-pass">Xác nhận mật khẩu mới</label>
                    <input type="text" class="form-control" id="repeatnewpass" name="repeatnewpass">
                </div>
                <div id="error" class=" text-danger"><?php echo $warning ?></div>
                <button class="btn btn-warning text-light btn-block" name="submit"> Thay đổi mật khẩu </button>
            </form>
        </div>
    </div>
</div>