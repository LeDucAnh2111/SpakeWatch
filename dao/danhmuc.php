<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($ten_danhmuc){
//     $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(?)";
//     pdo_execute($sql, $ten_danhmuc);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function danhmuc_update($ma_danhmuc, $ten_danhmuc){
//     $sql = "UPDATE danhmuc SET ten_danhmuc=? WHERE ma_danhmuc=?";
//     pdo_execute($sql, $ten_danhmuc, $ma_danhmuc);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function danhmuc_delete($ma_danhmuc){
//     $sql = "DELETE FROM danhmuc WHERE ma_danhmuc=?";
//     if(is_array($ma_danhmuc)){
//         foreach ($ma_danhmuc as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_danhmuc);
//     }
// }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
// function danhmuc_all(){
//     $sql = "SELECT * FROM danh_muc ORDER BY stt DESC";
//     return pdo_query($sql);
// }

function danhmuc_all()
{
    $sql = "SELECT * FROM danh_muc ORDER BY ma_dm DESC";
    return pdo_query($sql);
}

function showdmuser()
{
    $sql = "SELECT * FROM danh_muc ";
    return pdo_query($sql);
}


function count_dm()
{
    $sql = "SELECT COUNT(*) AS so_luong_dm FROM danh_muc";
    return pdo_query($sql);
}

function show($listDm)
{
    $kq = "";
    foreach ($listDm as $value) {
        extract($value);

        $kq .= '
        <li><a href="index.php?pg=sanpham&lsp=' . $ma_dm . '" class="decoration-none ">' . $ten_dm . '</a></li>
        ';
    };
    return $kq;
}

function show_block_dm($listDm)
{
    $kq = "";
    foreach ($listDm as $value) {
        extract($value);

        $kq .= '
        <div class="banner col-4">
            <div class="img">
                <img class="w-100" src="layout-v2/layout/img/banner_1.webp" alt="">
            </div>
            <div class="content">
                <div class="name">Đồng Hồ Nữ</div>
                <a href="index.php?pg=sanpham&lsp=' . $ma_dm . '" class="btn">Xem ngay</a>
            </div>
        </div>
        ';
    };
    return $kq;
}

// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }
function danhmuc_delete($ma_dm)
{
    $sql = "DELETE FROM danh_muc WHERE  ma_dm=?";
    pdo_execute($sql, $ma_dm);
}
function showdm($dsdm)
{
    $html_dm = '';
    $i = 1;
    foreach ($dsdm as $dm) {
        extract($dm);
        $html_dm .= '
            <tr>
            <th>' . $i . '</th>
            <th>' . $ten_dm . '</th>
            <td>
                                <a href="#" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="index.php?pg=deldm&ma_dm=' . $ma_dm . '" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
        </tr>            
            ';
        $i++;
    }
    return $html_dm;
}
function danhmuc_insert($ten_dm)
{
    $sql = "INSERT INTO danh_muc(ten_dm) VALUES(?)";
    pdo_execute($sql, $ten_dm);
}
function showdmup_admin($dsdm, $ma_dmsp)
{
    $html_dm = "";
    foreach ($dsdm as $dm) {
        extract($dm);
        if ($ma_dm == $ma_dmsp) {
            $s = "selected";
        } else {
            $s = "";
        }
        $link = 'index.php?pg=sanpham&ma_dm=' . $ma_dm;
        $html_dm .= '<option value="' . $ma_dm . '" ' . $s . '>' . $ten_dm . '</option>';
    }
    return $html_dm;
}
function showdmadd_admin($dsdm)
{
    $html_dm = "";
    foreach ($dsdm as $dm) {
        extract($dm);

        $link = 'index.php?pg=sanpham&ma_dm=' . $ma_dm;
        $html_dm .= '<option value="' . $ma_dm . '">' . $ten_dm . '</option>';
    }
    return $html_dm;
}
