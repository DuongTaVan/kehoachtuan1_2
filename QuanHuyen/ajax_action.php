<?php 
	include('db.php');
	if(isset($_POST['tinhthanh_code'])){
		$tinhthanh_code = $_POST['tinhthanh_code'];
		$sql = "SELECT * FROM tbl_quanhuyen WHERE parent_id = $tinhthanh_code AND type=1";
		$result = mysqli_query($conn,$sql);
		$output = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$output .= '
				
					<option value='.$rows["code"].'>'.$rows["name"].'</option>
	
			';

		}
		}
		$output .= '</select>';
		echo $output;
		
	}
	if(isset($_POST['xaphuong_code'])){
		$xaphuong_code = $_POST['xaphuong_code'];
		$sql = "SELECT * FROM tbl_quanhuyen WHERE parent_id = $xaphuong_code AND type=2";
		$result = mysqli_query($conn,$sql);
		$xp = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$xp .= '
				
					<option value='.$rows["code"].'>'.$rows["name"].'</option>
	
			';

		}
		}
		$xp .= '</select>';
		echo $xp;
		
	}
	// BT2
	if(isset($_POST['quocgia_id'])){
		$quocgia_id = $_POST['quocgia_id'];
		$sql = "SELECT * FROM tbl_asian WHERE parent_id = $quocgia_id AND type=2";
		$result = mysqli_query($conn,$sql);
		$td = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$td .= '
				
					<option value='.$rows["id"].'>'.$rows["name"].'</option>
	
			';

		}
		}
		$td .= '</select>';
		//$ms = 1;
		echo $td;
		
	}
	if(isset($_POST['quocgia_idd'])){
		$quocgia_idd = $_POST['quocgia_idd'];
		$sql = "SELECT * FROM tbl_asian WHERE parent_id = $quocgia_idd AND type=3";
		$result = mysqli_query($conn,$sql);
		$tp = '
			<select class="form-control">
				
		';
		if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_array($result)){
			$tp .= '
				
					<option value='.$rows["id"].'>'.$rows["name"].'</option>
	
			';

		}
		}
		$tp .= '</select>';
		//$ms = 1;
		echo $tp;
		
	}
