<style>
h2 {
            color: #DDC35F;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #DDC35F;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #DDC35F;
        }
</style>

<div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Thông tin liên hệ</h2>
                    <form action="index.php?trang=dk" method="post">
                        <label for="">Nhập Tên: </label> <input name="ten" id="ten" value="" type="text"> <br>
                        <label for="so_dien_thoai">Số điện thoại:</label>
                        <input type="tel" id="so_dien_thoai" name="phone" required><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="mail" required><br>
                        <label for="">Nhập nội dung : </label> <input style="height: 100px;" value=""
                            type="text"><br><br>
                        <input type="submit" name="them_user" value="Gửi liên hệ" onclick="return kiemtra()">
                    </form>
                </div>
                <div class="col-6">
                    <ul style="padding-top: 90px;" class="list-unstyled">
                        <li class="my-5">
                            <div class="diachi">
                                <div class="row align-items-center">
                                    <div class="col-2 no-gutters text-center ">
                                        <i class="fa-solid fa-location-dot d-inline-block text-light aligh-center text-center rounded-circle "
                                            style="width: 40px; height: 40px; box-sizing: border-box; padding: 12px 0; background-color: #DDC35F;"></i>
                                    </div>
                                    <div class="col-md-10 " style="padding: 0;">
                                        <div class="row">
                                            <div class="col-12 h6 text-secondary">
                                                Địa chỉ liên hệ
                                            </div>
                                            <div class="col-12 text-secondary">
                                                Ladeco Building, 266 Doi Can Street, Ba Dinh District, Hà Nội,
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                        <li class="my-5">
                            <div class="diachi">
                                <div class="row align-items-center">
                                    <div class="col-2 no-gutters text-center ">
                                        <i class="fa-solid fa-phone d-inline-block text-light aligh-center text-center rounded-circle "
                                            style="width: 40px; height: 40px; box-sizing: border-box; padding: 12px 0; background-color: #DDC35F;"></i>
                                    </div>
                                    <div class="col-md-10 " style="padding: 0;">
                                        <div class="row">
                                            <div class="col-12 h6 text-secondary">
                                                Số điện thoại
                                            </div>
                                            <div class="col-12 h6 text-secondary text-decoration-none">
                                                <a href="">0123456789</a>
                                            </div>
                                            <div class="col-12 text-secondary">
                                                Thứ 2 - Chủ nhật: 9:00 - 18:00
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                        <li class="my-5">
                            <div class="diachi">
                                <div class="row align-items-center">
                                    <div class="col-2 no-gutters text-center ">
                                        <i class="fa-solid fa-envelope d-inline-block text-light aligh-center text-center rounded-circle "
                                            style="width: 40px; height: 40px; box-sizing: border-box; padding: 12px 0; background-color: #DDC35F;"></i>
                                    </div>
                                    <div class="col-md-10 " style="padding: 0;">
                                        <div class="row">
                                            <div class="col-12 h6 text-secondary">
                                                Email
                                            </div>
                                            <div class="col-12 text-secondary">
                                                <a href="">support@sapo.vn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 40px;">
            <div class="map">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=11JaGdf5-L21BTFTe5oUBrO67ewcP5T4&ehbc=2E312"
                    width="100%" height="580"></iframe>
            </div>
        </div>