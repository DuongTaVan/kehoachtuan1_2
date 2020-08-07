<?php 
	include('db.php');
	if(isset($_POST['theme_code'])){
		$theme_code = $_POST['theme_code'];
		$sql = "SELECT * FROM tbl_post WHERE macd = '$theme_code'";
		$result = mysqli_query($conn,$sql)or die("Error");
		$output = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$output .= '
				
					<option value='.$rows["mabv"].'>'.$rows["tieude"].'</option>
	
			';

		}
		}
		$output .= '</select>';
		echo $output;
		
	}
	if(isset($_POST['user_code'])){
		$user_code = $_POST['user_code'];
		$sql = "SELECT * FROM tbl_post WHERE matv = '$user_code'";
		$result = mysqli_query($conn,$sql)or die("Error");
		$output = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$output .= '
				
					<option value='.$rows["mabv"].'>'.$rows["tieude"].'</option>
	
			';

		}
		}
		$output .= '</select>';
		echo $output;
		
	}
	if(isset($_POST['keyword'])){
		$keyword = $_POST['keyword'];
		$sql = "SELECT * FROM tbl_post WHERE (tieude  LIKE  '%$keyword%' OR  noidung LIKE  '%$keyword%')";
		$result = mysqli_query($conn,$sql)or die("Error");
		$output = '
			<div>
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$output .= '
				
					<div>Tieu de : '.$rows['tieude'].'</div>
					<div>Noi dung : '.$rows['noidung'].'</div>
					<div>-----------------------------------</div>
	
			';

		}
		
		}
		$output .= '</div>';
		echo $output;
		
	}

