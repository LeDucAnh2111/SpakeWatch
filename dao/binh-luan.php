<?php
require_once 'pdo.php';

function binh_luan_insert($ma_sp, $ma_tk, $noi_dung, $ngay_bl){
    $sql = "INSERT INTO binh_luan(ma_sp, ma_tk, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_sp, $ma_tk, $noi_dung, $ngay_bl);
}

// function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }

// function binh_luan_delete($ma_bl){
//     $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
//     if(is_array($ma_bl)){
//         foreach ($ma_bl as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_bl);
//     }
// }

function binh_luan_select_all(){
    $sql = "SELECT * FROM binh_luan ORDER BY ma_bl DESC";
    return pdo_query($sql);
}

// function binh_luan_select_by_id($ma_bl){
//     $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
//     return pdo_query_one($sql, $ma_bl);
// }

// function binh_luan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
function binh_luan_select_by_hang_hoa($ma_hh){
    $sql = "SELECT * FROM binh_luan WHERE ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
}

// admin
function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    pdo_execute($sql, $ma_bl);

}
// function binh_luan_select_all(){
//     $sql = "SELECT * FROM binh_luan ORDER BY ma_bl DESC";
//     return pdo_query($sql);
// }
function showbl($dscmt){
    $html_cmt='';
    $i = 1;
    foreach ($dscmt as $cmt) {
        extract($cmt);
        $html_cmt .= '<tr>
        <td>'.$i.'</td>
        <td>'.$noi_dung.'</td>
        <td>'.$ngay_bl.'</td>
        <td>'.$ma_sp.'</td>
        <td>'.$ma_tk.'</td>
        <td>
            <a href="index.php?pg=delcmt&ma_bl='.$ma_bl.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
        </td>
        </tr>'
        ;
        $i++;
    
    }
    return $html_cmt;
}
