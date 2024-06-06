<?php 

function info_user($ma_sp){
    if (isset($_SESSION["user"])) {
        return $client='
        <a href="" data-toggle="modal" data-target="#hinh'.$ma_sp.'" class="d-inline-block" >
        <div class="cart border rounded-circle">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        </a>    
        ';
    
    }else{
        return $client='
        <a href="" data-toggle="modal" data-target="#report-toggle" class="d-inline-block">
        <div class="cart border rounded-circle">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        </a>    
        ';
    }
}
// kiểm tra giỏ hàng đã tồn tại chưa 
function get_giohang_iduser($iduser){
    $sql=" SELECT * FROM gio_hang WHERE ma_tk=".$iduser."";
    return pdo_query_check($sql);
}

function get_magh_iduser($iduser){
    $sql=" SELECT ma_gh FROM gio_hang WHERE ma_tk=".$iduser."";
    return pdo_query($sql);
}

//Tạo trang giỏ hàng cho người dùng 
function make_cart($sltronggiohang,$iduser){
    $sql=" INSERT INTO gio_hang(so_luong_sp_tronggh,ma_tk) value(?,?) ";
    return pdo_query($sql,$sltronggiohang,$iduser);
}

//thêm vào chi tiết giỏ hàng với giỏ hàng đã có
function add_cart($ma_sp,$kich_thuoc,$sl,$mau,$ngay_them,$ma_gh){
    $sql=" INSERT INTO chi_tiet_gio_hang(ma_sp,kich_thuoc,sl,mau,ngay_them,ma_gh) value(?,?,?,?,?,?) ";
    return pdo_query($sql,$ma_sp,$kich_thuoc,$sl,$mau,$ngay_them,$ma_gh);
}

// kt xem sản phẩm đó đã có trong giỏ hàng chưa 
function get_ctgiohang_idpro($idpro){
    $sql=" SELECT ma_ctgh FROM chi_tiet_gio_hang WHERE ma_sp =".$idpro."";
    return pdo_query_check($sql);
}

//thay đổi số lượng khi người dùng thêm 1 sản phẩm giống sản phẩm đã thêm trước đó 

function update_slsp_idpro($slmoi,$ma_sp){
    $sql = "UPDATE chi_tiet_gio_hang SET sl=? WHERE ma_sp=?";
    pdo_execute($sql, $slmoi,$ma_sp);
}

function update_slsp_gh($slmoi,$ma_gh){
    $sql = "UPDATE gio_hang SET so_luong_sp_tronggh=? WHERE ma_gh=?";
    pdo_execute($sql, $slmoi,$ma_gh);
}

//lấy số lượng sản phẩm đã có ban đầu 
function get_slsp_idpro($ma_sp){
    $sql=" SELECT sl FROM chi_tiet_gio_hang WHERE ma_sp=".$ma_sp."";
    return pdo_query($sql);
}

//  kiểm tra xem người dùng này đã được tạo giỏ hàng chưa có rồi thì mới cho thêm vào giỏ hàng
function check_cart($iduser,$ma_sp,$kich_thuoc,$sl,$mau,$ngay_them){
    $check_cart_user=get_giohang_iduser($iduser);
    if ($check_cart_user) {
        $sltronggiohang=0;
        make_cart($sltronggiohang,$iduser);
        $ma_gh=get_magh_iduser($iduser)[0]["ma_gh"];
        add_cart($ma_sp,$kich_thuoc,$sl,$mau,$ngay_them,$ma_gh);
    }else {
        if (get_ctgiohang_idpro($ma_sp)) {
            $ma_gh=get_magh_iduser($iduser)[0]["ma_gh"];      
            add_cart($ma_sp,$kich_thuoc,$sl,$mau,$ngay_them,$ma_gh);
        }else {
            $slcu=get_slsp_idpro($ma_sp)[0]["sl"];
            $sl+=$slcu;
            update_slsp_idpro($sl,$ma_sp);
        }
        
    }
}


//lấy tất cả sản phẩm từ trang giỏ hàng

function get_ctgh_all($ma_gh){
    $sql="SELECT * FROM chi_tiet_gio_hang WHERE ma_gh= $ma_gh ";
    return pdo_query($sql);
}

// Xóa sản phẩm ở giỏ hàng 
function hang_hoa_delete($ma_sp){
        $sql = "DELETE FROM chi_tiet_gio_hang WHERE  ma_sp=?";
        return pdo_query($sql,$ma_sp);
            
    }

function kt_gh($ma_tk){
    $sql="SELECT * FROM gio_hang WHERE ma_tk=$ma_tk ";
    return pdo_query_check($sql);
}


//xóa tất cả sản phẩm từ trong giỏ hàng khi bấn vào đơn hàng 

function delete_cart($ma_gh){
    $sql = "DELETE FROM chi_tiet_gio_hang  WHERE ma_gh=?";
    return pdo_query($sql,$ma_gh);
}

function update_dh($trang_thai,$ma_don){
    $sql = "UPDATE don_hang SET trang_thai=? WHERE ma_don=?";
    pdo_execute($sql, $trang_thai,$ma_don);
}
function don_hang_select_id($ma_don){
    $sql = "SELECT * FROM don_hang WHERE ma_don ='$ma_don'" ;
    return pdo_query($sql);
}
function don_hang_select_all(){
    $sql = "SELECT * FROM don_hang ORDER BY ma_don DESC";
    return pdo_query($sql);
}
function showdh($dsdh){
    $html_dh='';
    $i = 1;
    foreach ($dsdh as $dh) {
        extract($dh);
        $html_dh .= '<tr>
        <td>'.$i.'</td>
        <td>'.$ngay_mua.'</td>
        <td>'.$tong_tien.'</td>
        <td>'.$trang_thai.'</td>
        <td>'.$ma_tk.'</td>
        <td>
        <a href="index.php?pg=dhupdate&ma_don='.$ma_don.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
        </td>
        </tr>'
        ;
        $i++;
    
    }
    return $html_dh;
}
function showttdh(){
    $sql=" SELECT * FROM don_hang ORDER BY ma_don DESC ";
    return pdo_query($sql);
}

?>