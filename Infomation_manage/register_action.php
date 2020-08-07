<?php
     session_start();
    include('db.php');
    if(isset($_POST['username'])){
		$username = $_POST['username'];
        $code = $_POST['code'];
        $password = $_POST['password'];
        if($password==""){
            $_SESSION['thongbao'] =  "Password không được để trống!";
            header("location: register.php");
        }
        $r_password = $_POST['r_password'];
        if($r_password != $password){
            $_SESSION['thongbao'] =  "Password nhập lại không chính xác!";
            header("location: register.php");
        }
        $password = md5($password);
        $sql = "SELECT * FROM tbl_user WHERE (matv = '$code')";
        $result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$_SESSION['thongbao'] =  "Mã thành viên đã tồn tại!";
			 header("location: register.php");
        }
        else{
            $sql = "INSERT INTO tbl_user (matv,tentv, matma) VALUES ('$code', '$username', '$password')";
            $result = mysqli_query($conn,$sql);
            $_SESSION['thongbao'] =  "đăng kí thành công!";
            header("location: login.php");
        }
        
		
    }
?>
    