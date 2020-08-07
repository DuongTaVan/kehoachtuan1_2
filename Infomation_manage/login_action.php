<?php
     session_start();
    include('db.php');
    if(isset($_POST['username'])){
		$username = $_POST['username'];

        $password = $_POST['password'];
        $password = md5($password);
		$sql = "SELECT * FROM tbl_user WHERE (tentv = '$username' AND matma = '$password')";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo 1;
			$_SESSION['user'] =  $username;
			 header("location: index.php");
		}
		else{
            $_SESSION['thongbao'] =  "Đăng nhập không thành công!";
            header("location: login.php");
		}
		
    }
    else{
        $_SESSION['thongbao'] =  "Nhập đầy đủ thông tin!";
            header("location: login.php");
    }
?>
    