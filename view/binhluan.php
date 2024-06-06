
<?php 
    session_start();
    include "../dao/pdo.php";
    include "../dao/binh-luan.php";


    $ma_sp= $_GET['idpro'];
    print_r($ma_sp);

    if (isset($_GET['idpro'])) {
        $idpro= $_GET['idpro'];
    }

    if (isset($_POST['guibl'])) {
        $ma_sp= $_POST['idpro'];
        print_r($ma_sp);
        $ma_tk=$_SESSION["user"][0]["ma_tk"];
        $noi_dung=$_POST['comment'];
        $ngay_bl=date("Y-m-d");
        // binh_luan_insert($ma_sp, $ma_tk, $noi_dung, $ngay_bl);
    }
    
?>
<!-- &matk='.$_SESSION["user"][0]["ma_tk"].' -->

<h1>Bình luận</h1>

<?php 
    if (isset($_SESSION["user"][0]["ma_tk"])) {    
?>

<form action="../index.php?pg=addbl&ma_sp=<?php $_GET['idpro']?>"target="_parent" method="post">
    <!-- <input type="hidden" name="masp" value="idpro"> -->
    <textarea name="comment" id=""  cols="143" rows="10"></textarea>
    <button name="guibl">Gửi bình luận</button>
</form>

<?php } else {
    $_SESSION['idpro']=$_GET['idpro'];
   echo ' <div >
   Bạn cần <a href="../index.php?pg=login"target="_parent">đăng nhập</a> để có thể bình luận
   </div>';  
}
?>
<?php


?>