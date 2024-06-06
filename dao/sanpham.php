<?php
require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

// function get_dssp_new($limi){
//     $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
// function get_dssp_best($limi){
//     $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
function get_dssp_conban($trangthai, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE trangthai=? ORDER BY id limit " . $limi;
    return pdo_query($sql, $trangthai);
}

function get_dssp_tl($trangthai, $theloai, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE trangthai=? AND theloai=? ORDER BY id limit " . $limi;
    return pdo_query($sql, $trangthai, $theloai);
}

function get_sp_price($price)
{
    $sql = " SELECT * FROM san_pham WHERE gia<=?";
    return pdo_query($sql, $price);
}

function count_sp()
{
    $sql = "SELECT COUNT(*) AS so_luong_sp FROM san_pham";
    return pdo_query($sql);
}

// function get_dssp($iddm,$limi){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     $sql .= " ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }

function get_sp_all()
{
    $sql = "SELECT * FROM san_pham";
    return pdo_query($sql);
}

function get_sp_new($limi)
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC limit " . $limi;
    return pdo_query($sql);
}

function get_sp_loai($loaisp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_dm = $loaisp ";
    return pdo_query($sql);
}

function get_sp_search($kw)
{
    $sql = "SELECT * FROM san_pham WHERE ten_sp like '%$kw%' ";
    return pdo_query($sql);
}

function get_sp_view($limi)
{
    $sql = "SELECT * FROM san_pham ORDER BY so_luot_xem DESC limit " . $limi;
    return pdo_query($sql);
}

function chitietsp($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp = $ma_sp";
    return pdo_query($sql);
}

function get_sp_lienquan($madm, $ma_sp, $limi)
{
    $sql = "SELECT * FROM san_pham WHERE ma_dm = $madm AND ma_sp<>$ma_sp limit " . $limi;
    return pdo_query($sql);
}
// ADMIN
function get_sanpham_chitiet($ma_sp)
{
    $sql = "SELECT * FROM san_pham WHERE ma_sp=?";
    return pdo_query_one($sql, $ma_sp);
}

// function  get_img($ma_sp) {
//     $sql = "SELECT img FROM san_pham WHERE ma_sp=?";
//     $getimg=pdo_query_one($sql, $ma_sp);
//     return $getimg['img'];
// }

function showsp_admin($dssp)
{
    $html_dssp = '';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        $html_dssp .= '<tr>
        <td>' . $i . '</td>
        <td><img src="' . IMG_PATH_ADMIN . $hinh . '" alt="' . $ten_sp . '" width="80px"></td>
        <td>' . $ten_sp . '</td>
        <td>' . $gia . '</td>
        <td>' . $so_luot_xem . '</td>
        <td>
            <a href="index.php?pg=sanphamupdate&ma_sp=' . $ma_sp . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
            <a href="index.php?pg=delproduct&ma_sp=' . $ma_sp . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
        </td>
        </tr>';
        $i++;
    }
    return $html_dssp;
}
function sanpham_insert($ten_sp, $hinh, $gia, $ma_dm, $mota)
{
    $sql = "INSERT INTO san_pham(ten_sp, hinh, gia, ma_dm, mo_ta) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $ten_sp, $hinh, $gia, $ma_dm, $mota);
}

function sanpham_delete($ma_sp)
{
    $sql = "DELETE FROM san_pham WHERE  ma_sp=?";
    
    pdo_execute($sql, $ma_sp);
    
}
function  get_img($ma_sp)
{
    $sql = "SELECT hinh FROM san_pham WHERE ma_sp=?";
    $getimg = pdo_query_one($sql, $ma_sp);
    return $getimg['hinh'];
}

function sanpham_update($ten_sp, $hinh, $gia, $ma_dm, $mota, $ma_sp)
{
    print_r("a");
    if ($hinh != "") {
        $sql = "UPDATE san_pham SET ten_sp=?,hinh=?,gia=?,ma_dm=? ,mo_ta=? WHERE ma_sp=?";
        pdo_execute($sql, $ten_sp, $hinh, $gia, $ma_dm, $mota, $ma_sp);
    } else {
        $sql = "UPDATE san_pham SET ten_sp=?,gia=?,ma_dm=?,mo_ta=? WHERE ma_sp=?";
        pdo_execute($sql, $ten_sp, $gia, $ma_dm, $mota, $ma_sp);
    }
}
function hien_thi_so_trang($dssp, $soluongsp)
{
    $tongsp = count($dssp);
    $sotrang = ceil($tongsp / $soluongsp);
    $html_sotrang = "";
    for ($i = 1; $i <= $sotrang; $i++) {
        $html_sotrang .= '<a class=" page text-decoration-none mx-3 my-2 px-2 border rounded-circle d-inline-block " href="index.php?pg=sanphamlist&page=' . $i . '">' . $i . '</a> ';
    }
    return $html_sotrang;
}
function get_dssp_all()
{
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp DESC";
    return pdo_query($sql);
}

function get_dssp_admin($kyw, $page, $soluongsp)
{
    if (($page == "") || ($page == 0)) $page = 1;
    $start = ($page - 1) * $soluongsp;


    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND ten_sp like ?";
        $sql .= " ORDER BY ma_sp DESC";
        $sql .= " LIMIT " . $start . "," . $soluongsp;
        return pdo_query($sql, "%" . $kyw . "%");
    } else {
        $sql .= " ORDER BY ma_sp DESC";
        $sql .= " LIMIT " . $start . "," . $soluongsp;
        return pdo_query($sql);
    }
}
// function showsp($dssp){
//     $html_dssp='';
//     foreach ($dssp as $sp) {
//         extract($sp);
//         if($bestseller==1){
//             $best='<div class="best"></div>';
//         }else{
//             $best='';
//         }
//         $html_dssp.='<div class="box25 mr15">
//                             '.$best.'
//                             <img src="layout/images/'.$img.'" alt="">
//                             <span class="price">'.$price.' đ</span>
//                             <button>Đặt hàng</button>
//                         </div>';
//     }
//     return $html_dssp;
// }

// function hang_hoa_select_by_id($ma_hh){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_one($sql, $ma_hh);
// }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }