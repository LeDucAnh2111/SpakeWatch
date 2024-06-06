<?php
// session_start();
// ob_start();
// if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))&&(count($_SESSION['user'])>0)){
//     $admin=$_SESSION['user'];
// }else{
//     header('location: login.php');
// }

include "../dao/pdo.php";
include "../dao/binh-luan.php";
include "../dao/danhmuc.php";
include "../dao/giohang.php";
include "../dao/sanpham.php";
include "../dao/global.php";
include "../dao/bill.php";
include "../dao/khach-hang.php";
include "view/header.php";

$dm = get_all_dm();
$listUser = user_select_all();
$count_tv = count_tv();
$count_sp = count_sp();
$count_dm = count_dm();
$count_dh = count_dh();
if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    switch ($pg) {
        case 'userslist':
            $userlist = get_ds_user(100);
            include "view/userlist.php";
            break;
            //user

        case 'updateuser';
            if (isset($_POST['submit'])) {
                $ho_ten = $_POST['name'];
                $mat_khau = $_POST['pass'];
                $email = $_POST['email'];
                $dia_chi = $_POST['diachi'];
                $ma_tk = $_POST['id'];
                update_user_admin($ho_ten, $mat_khau, $email, $dia_chi, $ma_tk);
            }
            $userlist = get_ds_user(100);
            include "view/userlist.php";
            break;
            //user
        case 'userupdate':
            if (isset($_GET['ma_tk']) && ($_GET['ma_tk'] > 0)) {
                $ma_tk = $_GET['ma_tk'];
                $us = user_select_id($ma_tk);
            }

            include "view/userupdate.php";
            break;
            // xóa user     
        case 'deluser':
            if (isset($_GET['ma_tk']) && ($_GET['ma_tk'] > 0)) {
                $ma_tk = $_GET['ma_tk'];
                user_delete($ma_tk);
            }
            $userlist = get_ds_user(100);
            include "view/userlist.php";
            break;
            //donhang
        case 'donhang':
            $dhlist = don_hang_select_all();
            include "view/donhanglist.php";
            break;
            //updatedh
        case 'updatedh':
            if (isset($_POST['submit'])) {
                $ma_don = $_POST['id']; // nó bị lỗi chỗ này nè
                $trang_thai = $_POST['trangthai'];
                var_dump($trang_thai);
                print_r($trang_thai);
                update_dh($trang_thai, $ma_don);
            }
            $dhlist = don_hang_select_all();
            include "view/donhanglist.php";
            break;
        case 'dhupdate':
            if (isset($_GET['ma_don']) && ($_GET['ma_don'] > 0)) {
                $ma_don = $_GET['ma_don'];
                $dh = don_hang_select_id($ma_don);
            }
            $ttlist = showttdh();
            include "view/dhupdate.php";
            break;
            //binhluan
        case 'commentlist':
            $cmtlist = binh_luan_select_all();
            include "view/commentlist.php";
            break;
            //delbl
        case 'delcmt':
            if (isset($_GET['ma_bl']) && ($_GET['ma_bl'] > 0)) {
                $ma_bl = $_GET['ma_bl'];
                binh_luan_delete($ma_bl);
            }
            $cmtlist = binh_luan_select_all();
            include "view/commentlist.php";
            break;
            //trangdanhmuc
        case 'danhmuc_update':
            include "view/danhmuc_add.php";
            break;
            //danhmuc_add
        case 'danhmuc_add':

            if (isset($_POST['btnadd'])) {
                $ten_dm = $_POST['name'];
                danhmuc_insert($ten_dm);
                $tb = "Bạn đã thêm thành công";
                header("location: index.php?pg=catalog");
            }
            include "view/danhmuc_add.php";

            break;
            // sản phẩm list
        case 'sanphamlist':
            if (isset($_POST['timkiem'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $soluongsp = 5;
            $dssp = get_dssp_admin($kyw, $page, $soluongsp);
            $tongsosp = get_dssp_all();
            $hienthisotrang = hien_thi_so_trang($tongsosp, $soluongsp);
            include "view/sanphamlist.php";
            break;
        case 'updateproduct':
            // kiểm tra và lấy dữ liệu
            if (isset($_POST['updateproduct'])) {
                //lấy dữ liệu về
                $ten_sp = $_POST['name'];
                $gia = $_POST['price'];
                $ma_dm = $_POST['ma_dm'];
                $ma_sp = $_POST['id'];
                $hinh = $_FILES['img']['name'];
                $mota = $_POST['detail'];
                if ($hinh != "") {
                    //upload hinh anh
                    $target_file = IMG_PATH_ADMIN . $hinh;
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                } else {
                    $hinh = "";
                }
                // insert into
                sanpham_update($ten_sp, $hinh, $gia, $ma_dm, $mota, $ma_sp,);
            }


            $sanphamlist = get_sp_new(100);
            header('location:index.php?pg=sanphamlist');
            break;
            // show sản phẩm update
        case 'sanphamupdate':
            if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                $ma_sp = $_GET['ma_sp'];
                $sp = get_sanpham_chitiet($ma_sp);
            }
            // trở về trang dssp
            $danhmuclist = danhmuc_all();
            // print_r($danhmuclist);
            include "view/sanphamupdate.php";
            break;
            // xóa sản phẩm
        case 'delproduct':
            if (isset($_GET['ma_sp']) && ($_GET['ma_sp'] > 0)) {
                $ma_sp = $_GET['ma_sp'];
                sanpham_delete($ma_sp);
                $hinh = IMG_PATH_ADMIN . get_img($ma_sp);
                if (is_file($hinh)) {
                    unlink($hinh);
                }
                try {
                    sanpham_delete($ma_sp);
                } catch (\Throwable $th) {
                    echo "Sản phẩm đã có trên giỏ hàng! Không được quyền xóa";
                }
            }
            // trở về trang dssp
            $sanphamlist = get_sp_new(100);
            header("location: index.php?pg=sanphamlist");
            break;
            // trang sản phẩm
        case 'sanphamadd':
            $danhmuclist = danhmuc_all();
            include "view/sanphamadd.php";
            break;
            // thêm sản phẩm
        case 'addproduct':
            if (isset($_POST['addproduct'])) {
                //lấy dữ liệu về
                $ten_sp = $_POST['name'];
                $gia = $_POST['price'];
                $ma_dm = $_POST['iddm'];
                $hinh = $_FILES['img']['name'];
                $mota = $_POST['detail'];
                // insert into
                sanpham_insert($ten_sp, $hinh, $gia, $ma_dm, $mota);
                //upload hinh anh
                $target_file = IMG_PATH_ADMIN . $hinh;
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                // trở vể trang dssp
                $sanphamlist = get_sp_new(100);

                header("location: index.php?pg=sanphamlist");
            } else {
                $danhmuclist = danhmuc_all();
                header("location: index.php?pg=sanphamadd");
            }
            break;
            // user list


            // case 'users':
            //     include "view/users.php";
            //     break;
        case 'deldm':
            if (isset($_GET['ma_dm']) && ($_GET['ma_dm'] > 0)) {
                $ma_dm = $_GET['ma_dm'];
                danhmuc_delete($ma_dm);
            }
            $dsdm = danhmuc_all();
            include "view/catalog.php";
            break;
        case 'catalog':
            $dsdm = danhmuc_all();
            include "view/catalog.php";
            break;
        case 'qldh':
            $count_tv = count_tv();
            $dm = get_all_dm();
            $listUser = user_select_all();
            include "view/home.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
