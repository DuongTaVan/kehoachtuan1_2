<?php 
	include('db.php');
    $sql="SELECT * FROM tbl_quanhuyen WHERE type=0 ";
    $sql2="SELECT * FROM tbl_asian WHERE type=0 ";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h3>BT1</h3>
        <form action="">
            <div class="form-group">
                <label for="">Thành phố</label>
                <select class="form-control" id="tinhthanh" >
                <option> -------Chọn Tỉnh Thành------ </option>
                    <?php 
					while($rows = mysqli_fetch_array($result)){
						echo '<option value="'.$rows["code"].'">'.$rows["name"].'</option>';
					};
				 ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Quận huyện</label>
                <div >
                    <select class="form-control" id="load_quanhuyen">
                        <option> -------Chọn Quận Huyện------ </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="">Xã Phường</label>
                <div >
                    <select class="form-control" id="load_xaphuong">
                        <option> -------Chọn Xã Phường------ </option>
                    </select>
                </div>
            </div>
        </form>
        <h3>BT2</h3>
        <form action="">
            <div class="form-group">
                <label for="">Quốc gia</label>
                <select class="form-control" id="quocgia" >
                <option> -------Chọn Quốc Gia------ </option>
                    <?php 
					while($rows = mysqli_fetch_array($result2)){
						echo '<option value="'.$rows["id"].'">'.$rows["name"].'</option>';
					};
				 ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Thủ Đô</label>
                <div >
                    <select class="form-control" id="load_thudo">
                        <option> -------Chọn Thủ Đô------ </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="">Thành Phố</label>
                <div >
                    <select class="form-control" id="load_thanhpho">
                        <option> -------Chọn Thành Phố------ </option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">

    </script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#tinhthanh').change(function(){
                let $this = $(this);
				let tinhthanh_code = $this.val();
                
				//alert(tinhthanh_code);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{tinhthanh_code:tinhthanh_code},
					success:function(data){
						$('#load_quanhuyen').html(data);
						
					}
				});



			});
            $('#load_quanhuyen').change(function(){
                let $this = $(this);
				let xaphuong_code = $this.val();
                
				//alert(xaphuong_code);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{xaphuong_code:xaphuong_code},
					success:function(data){
						$('#load_xaphuong').html(data);
						
					}
				});



			});
            // BT2
            $('#quocgia').change(function(){
                let $this = $(this);
				let quocgia_id = $this.val();
                
				//alert(quocgia_id);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{quocgia_id:quocgia_id},
					success:function(data){
						$('#load_thudo').html(data);
						
					}
				});
            });
            $('#quocgia').change(function(){
                let $this = $(this);
				let quocgia_idd = $this.val();
                
				//alert(quocgia_id);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{quocgia_idd:quocgia_idd},
					success:function(data){
						$('#load_thanhpho').html(data);
						
					}
				});
            });

		})
	</script>
</body>
</html>

