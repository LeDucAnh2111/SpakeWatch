<?php
session_start();
ob_start();
// nhúng kết nối csdl
include "dao/pdo.php";
// include "dao/danhmuc.php";
include "dao/sanpham.php";
include "dao/khach-hang.php";
include "dao/danhmuc.php";
include "dao/giohang.php";
include "dao/bill.php";
include "dao/binh-luan.php";
include "view/header.php";

// $listbook=get_dssp_conban(1,10);
$listProductNew = get_sp_new(8);
$listProductView = get_sp_view(8);
// print_r($listProduct);
// $listDm=showdmuser();

// $listuser_bongban=user_by_clb(1);

if (!isset($_GET['pg'])) {

    include "view/home.php";
} else {
    switch ($_GET['pg']) {
        case 'chitietsp':
            if (isset($_SESSION['idpro'])) {
                unset($_SESSION['idpro']);
            }
            $ma_sp = $_GET["idsp"];
            $product = chitietsp($ma_sp);
            $madm = $product[0]["ma_dm"];
            $splienquan = get_sp_lienquan($madm, $ma_sp, 4);
            // print_r ($splienquan);
            $list_bl = binh_luan_select_all();
            include "view/chitietsp.php";
            break;

        case "filter_price":
            if (isset($_POST["submit"])) {
                $price = $_POST["filter_price"];
                header("location: index.php?pg=sanpham&wprice=" . $price . "");
            }

            break;
        case 'sanpham':

            $listProduct = get_sp_all();
            if (isset($_GET["lsp"])) {
                $loaisp = $_GET["lsp"];
                $listProduct = get_sp_loai($loaisp);
            }
            if (isset($_GET["wprice"])) {
                $price = $_GET["wprice"];
                $listProduct = get_sp_price($price);
            }
            if (isset($_POST["timkiem"])) {
                $kw = $_POST["ndtimkiem"];
                $listProduct = get_sp_search($kw);
            }
            $spnoibat = get_sp_view(6);
            // print_r($listProduct);
            include "view/product.php";
            break;
        case 'login':
            $loi = "";

            include "view/dangnhap.php";
            break;
        case 'adduser':
            if (isset($_POST["dangky"])) {
                $username = $_POST["tk"];
                $email = $_POST["email"];
                $pass = $_POST["mk"];
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
                $a = check_user($username);
                if ($a) {
                    user_insert($username, $email, $pass);
                    //qua trang đăng nhập
                    header("Location:index.php?pg=login");
                } else {
                    $loi = "Tài khoản đã tồn tại từ trước";
                    include "view/dangky.php";
                }
            }

            break;
        case "checkLogin":
            if (isset($_POST["dangnhap"])) {
                $username = $_POST["tkdangnhap"];
                $pass = $_POST["tmdangnhap"];
                $check = check_login($username, $pass);
                if ($check) {
                    $loi = "Tài khoản không tồn tại hoặc nhập sai";
                    include "view/dangnhap.php";
                } else {
                    $userOfDatabase = user_select_one($username);
                    print_r($userOfDatabase);

                    $_SESSION["user"] = $userOfDatabase;

                    if (isset($_SESSION['idpro'])) {
                        header('Location:index.php?pg=chitietsp&idsp=' . $_SESSION['idpro'] . '');
                    } else {
                        header('Location:index.php');
                    }

                    // $_SESSION["user"] = $userOfDatabase;
                    // // print_r($_SESSION["user"]);

                }
            }
            break;
        case 'admin':
            header("location: admin/index.php ");
            break;
        case 'dangky':
            $loi = "";
            include "view/dangky.php";
            break;

        case 'cart':
            $iduser = $_SESSION["user"][0]["ma_tk"];
            // print_r($iduser);
            // kiem tra nguoi dung co gio hang chua 
            if (kt_gh($iduser)) {
                $list_pro = [];
            } else {
                $ma_gh = get_magh_iduser($iduser)[0]["ma_gh"];

                $list_pro = get_ctgh_all($ma_gh);
            }

            include "view/cart.php";
            break;

        case 'addToCart':
            if (isset($_POST["submit-form"])) {
                $iduser = $_SESSION["user"][0]["ma_tk"];
                $ma_sp = $_GET["idsp"];
                $kich_thuoc = $_POST["size"];
                $sl = $_POST["sl"];
                $mau = $_POST["color"];
                $ngay_them = date("Y-m-d");
                check_cart($iduser, $ma_sp, $kich_thuoc, $sl, $mau, $ngay_them);
                // lấy tất cả các sản phaamt ừ giỏ hàng của người dùng 
                $ma_gh = get_magh_iduser($iduser)[0]["ma_gh"];
                $gio_hang = get_ctgh_all($ma_gh);
                $so_sp_gh = 0;
                // print_r($gio_hang);
                foreach ($gio_hang as $value) {
                    $so_sp_gh++;
                }
                update_slsp_gh($so_sp_gh, $ma_gh);
                header("Location:index.php?pg=cart");
            };
            break;

        case 'delete_cart':
            $ma_sp = $_GET["idsp"];
            hang_hoa_delete($ma_sp);
            header("Location:index.php?pg=cart");
            break;

        case 'update_cart':
            if (isset($_POST["submit_update"])) {
                $sl = $_POST["soluong"];
                // print_r ($sl);
                $ma_sp = $_POST["ma_sp"];
                update_slsp_idpro($sl, $ma_sp);
                header("Location:index.php?pg=cart");
            }
            break;
        case 'delete_user':
            unset($_SESSION['user']);
            header("Location:index.php");
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;

        case 'infoUser':
            $ma_tk = $_SESSION["user"][0]["ma_tk"];
            $info = user_select_id($ma_tk);
            include "view/infoUser.php";
            break;

        case 'updateUser':
            print_r($_GET["link"]);
            $ma_tk = $_SESSION["user"][0]["ma_tk"];
            $ho_ten = $_POST["username"];
            $tk = $_POST["tk"];
            $mk = $_POST["mk"];
            $total = $_GET['link'];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            update_user($ma_tk, $ho_ten, $tk, $mk, $email, $address, $phone);
            if (isset($_GET["link"])) {
                header("Location:index.php?pg=donhang&tt=" . $total . "");
            } else {
                header("Location:index.php?pg=infoUser");
            }

            break;

        case "addbill":
            if (isset($_POST["submit"])) {
                $ngay_mua = date("Y-m-d");
                $tong_tien = $_POST["total"];
                $trang_thai = "phe-duyet";
                $ma_tk = $_SESSION["user"][0]["ma_tk"];
                // print_r($ma_tk);
                add_bill($ngay_mua, $tong_tien, $trang_thai, $ma_tk);
                // lấy id_bill từ mã tài khoản 
                $ma_don = get_idbill_new($ma_tk)[0]["ma_don"];

                print_r($ma_don);
                // // Lấy mã giỏ hàng từ mã tài khoản 
                $ma_gh = get_magh_iduser($ma_tk)[0]["ma_gh"];

                // print_r($ma_gh);
                // // lấy tất cả các sản phẩm từ bảng chi tiết giỏ hàng theo mã giỏ hàng
                $gio_hang = get_ctgh_all($ma_gh);
                // print_r($gio_hang);
                foreach ($gio_hang as $value) {
                    extract($value);
                    add_ct_bill($sl, $ma_sp, $mau, $kich_thuoc, $ma_don);
                }
                delete_cart($ma_gh);
                $so_sp_gh = 0;
                update_slsp_gh($so_sp_gh, $ma_gh);
                header("Location:index.php?pg=thongtindonhang");
            }
            // print_r($ma_don);
            break;
        case 'donhang':
            // if(isset($_POST["submit"])){
            $ma_tk = $_SESSION["user"][0]["ma_tk"];
            $info = user_select_id($ma_tk);
            if (isset($_GET['tt'])) {
                $tong_tien = $_GET['tt'];
            } else {
                $tong_tien = $_POST["total"];
            }

            $ma_tk = $_SESSION["user"][0]["ma_tk"];
            $ma_gh = get_magh_iduser($ma_tk)[0]["ma_gh"];
            $gio_hang = get_ctgh_all($ma_gh);
            // print_r ($gio_hang);
            include "view/thanhToan.php";
            // };


            break;
        case 'thongtindonhang':
            // lấy user người dùng
            $ma_tk = $_SESSION["user"][0]["ma_tk"];
            // lấy bill có mã khách hàng ở data base
            $list_bill = get_all($ma_tk);
            //lấy mã 
            $idbill = get_idbill($ma_tk);

            include "view/confirm.php";
            break;

        case 'addbl':
            if (isset($_POST['guibl'])) {
                $ma_sp = $_GET['ma_sp'];
                print_r($ma_sp);
                $ma_tk = $_SESSION["user"][0]["ma_tk"];
                $noi_dung = $_POST['comment'];
                $ngay_bl = date("Y-m-d");
                binh_luan_insert($ma_sp, $ma_tk, $noi_dung, $ngay_bl);
                header("location: index.php?pg=chitietsp&idsp=" . $ma_sp . "");
            }
            break;

        case 'deletebill':
            if (isset($_POST["submit"])) {
                $ma_don = $_GET["ma_don"];
                delete_ct_bill($ma_don);
                delete_bill($ma_don);
                header("location: index.php?pg=thongtindonhang");
            }
            break;

        case 'updatePass':
            $warning = "";
            include "view/updatePass.php";
            break;

        case 'checkUpdatePass':

            if (isset($_POST["submit"])) {
                $id_user = $_SESSION['user'][0]["ma_tk"];
                $oldpass = pass_select_id($id_user);
                $input_old_pass = $_POST["oldpass"];
                $input_new_pass = $_POST["newpass"];
                // $warning = "";
                // print_r($oldpass);
                // print_r($input_old_pass);

                if ($oldpass[0]["mat_khau"] == $input_old_pass) {
                    update_password($id_user, $input_new_pass);
                    $warning = "Bạn đã cập nhận thành công <a href=' index.php?pg=infoUser' > Quay về trang thông tin tài khoản </a>";
                    header("location: index.php?pg=infoUser");
                } else {
                    $warning = "Bạn nhập không đúng mật khẩu hiện tại";
                    include "view/updatePass.php";
                }
            }
            break;


        default:
            include "view/home.php";
            break;
    }
}

include "view/footer.php";
