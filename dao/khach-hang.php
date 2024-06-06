<?php
require_once 'pdo.php';



function user_select_all()
{
    $sql = "SELECT * FROM tai_khoan";
    return pdo_query($sql);
}


function user_select_id($ma_tk)
{
    $sql = "SELECT * FROM tai_khoan WHERE ma_tk ='$ma_tk'";
    return pdo_query($sql);
}

function pass_select_id($ma_tk)
{
    $sql = "SELECT mat_khau FROM tai_khoan WHERE ma_tk ='$ma_tk'";
    return pdo_query($sql);
}

function update_password($ma_tk, $mat_khau)
{
    $sql = "UPDATE tai_khoan 
    SET  mat_khau='$mat_khau'
    WHERE ma_tk=$ma_tk";
    return  pdo_execute($sql);
}

function user_select_one($username)
{
    $sql = "SELECT * FROM tai_khoan WHERE taikhoan='$username'";
    return pdo_query($sql);
}

//lấy thông tin người dùng để load qua trang thông tin người dùng theo ma_tk

// Kiểm tra đăng ký
function check_user($username)
{
    $sql = "SELECT * FROM tai_khoan WHERE taikhoan= '$username'";
    return pdo_query_check($sql);
}

// Kiểm tra đăng nhập
function check_login($username, $pass)
{
    $sql = "SELECT * FROM tai_khoan WHERE taikhoan= '$username' AND mat_khau ='$pass' ";
    return pdo_query_check($sql);
}

function user_insert($username, $email, $pass)
{
    $sql = "INSERT INTO tai_khoan(taikhoan,mat_khau,email) VALUES (?,?,?)";
    pdo_execute($sql, $username, $pass, $email);
}



function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat == 1, $vai_tro == 1, $ma_kh);
}

function khach_hang_delete($ma_kh)
{
    $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
    if (is_array($ma_kh)) {
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_kh);
    }
}



// ADMIN
function count_tv()
{
    $sql = "SELECT COUNT(*) AS so_luong_thanh_vien FROM tai_khoan";
    return pdo_query($sql);
}
function check_user_admin($username, $pass)
{
    $sql = "SELECT * FROM tai_khoan where taikhoan=? and mat_khau=?";
    return  pdo_query_one($sql, $username, $pass);

    // if(is_array($result) && (count($result))) {
    //     return $result['id'];
    // } else {
    //     return 0;
    // }
}
function get_ds_user($limi)
{
    $sql = "SELECT * FROM tai_khoan ORDER BY ma_tk DESC limit " . $limi;
    return pdo_query($sql);
}
function showuser_admin($dskh)
{
    $html_dskh = '';
    $i = 1;
    foreach ($dskh as $kh) {
        extract($kh);
        $html_dskh .= '<tr>
         <th>' . $i . '</th>
         <th>' . $ho_ten . '</th>
         <th>' . $taikhoan . '</th>
         <th>' . $mat_khau . '</th>
         <th>' . $email . '</th>
         <td>
         <a href="index.php?pg=userupdate&ma_tk=' . $ma_tk . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
         <a href="index.php?pg=deluser&ma_tk=' . $ma_tk . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
        </td>
     </tr>';
        $i++;
    }
    return $html_dskh;
}

// function user_by_clb($clb){
//     $sql = "SELECT * FROM user WHERE clb=?";
//     return pdo_query($sql,$clb);
// }
// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

function update_user($ma_tk, $ho_ten, $tk, $mk, $email, $address, $phone)
{
    $sql = "UPDATE tai_khoan 
            SET ho_ten='$ho_ten', taikhoan='$tk', mat_khau='$mk', email='$email', dia_chi='$address', phone='$phone '
            WHERE ma_tk=$ma_tk";
    return  pdo_execute($sql,);
}
function update_user_admin($ho_ten, $mat_khau, $email, $dia_chi, $ma_tk)
{
    $sql = "UPDATE tai_khoan 
            SET ho_ten='$ho_ten', mat_khau='$mat_khau', email='$email', dia_chi='$dia_chi'
            WHERE ma_tk=$ma_tk";
    return  pdo_execute($sql);
}
function user_delete($ma_tk)
{
    $sql = "DELETE FROM tai_khoan  WHERE ma_tk=?";
    pdo_execute($sql, $ma_tk);
}
