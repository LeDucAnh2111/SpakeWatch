<?php

//tạo đơn hàng của user 
function add_bill($ngay_mua, $tong_tien, $trang_thai, $ma_tk)
{
    $sql = "INSERT INTO don_hang(ngay_mua, tong_tien, trang_thai, ma_tk) VALUES (?,?,?,?)";
    pdo_execute($sql, $ngay_mua, $tong_tien, $trang_thai, $ma_tk);
}

function add_ct_bill($so_luong_sp, $ma_sp, $mau, $size, $ma_dh)
{
    $sql = "INSERT INTO chi_tiet_don_hang(so_luong_sp , ma_sp , mau , size , ma_dh) VALUES (? , ? , ? , ? , ?)";
    pdo_execute($sql, $so_luong_sp, $ma_sp, $mau, $size, $ma_dh);
}


function get_idbill($ma_tk)
{
    $sql = "SELECT ma_don FROM don_hang WHERE ma_tk=?";
    return pdo_query($sql, $ma_tk);
}

function count_dh()
{
    $sql = "SELECT COUNT(*) AS so_luong_dh FROM don_hang";
    return pdo_query($sql);
}

function get_all($ma_tk)
{
    $sql = "SELECT * FROM don_hang WHERE ma_tk=?";
    return pdo_query($sql, $ma_tk);
}

function get_all_dm()
{
    $sql = "SELECT * FROM don_hang ";
    return pdo_query($sql,);
}

function get_ctdh_ma_bill($ma_dh)
{
    $sql = "SELECT * FROM chi_tiet_don_hang WHERE ma_dh=?";
    return pdo_query($sql, $ma_dh);
}

function get_idbill_new($ma_tk)
{
    $sql = "SELECT ma_don FROM don_hang WHERE ma_tk=? ORDER BY ma_don DESC limit 1";
    return pdo_query($sql, $ma_tk);
}

function get_all_madh($ma_don)
{
    $sql = "SELECT * FROM don_hang WHERE ma_don=?";
    return pdo_query($sql, $ma_don);
}



function delete_bill($ma_don)
{
    $sql = "DELETE FROM don_hang  WHERE ma_don=?";
    return pdo_query($sql, $ma_don);
}

function delete_ct_bill($ma_don)
{
    $sql = "DELETE FROM chi_tiet_don_hang  WHERE ma_dh=?";
    return pdo_query($sql, $ma_don);
}
