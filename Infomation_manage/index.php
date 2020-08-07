<?php 
    include('db.php');
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
    $sql="SELECT * FROM tbl_user";
    $sql1="SELECT * FROM tbl_theme";
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);
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

            <div class="form-group">
                <label for="">USER</label>
                <select class="form-control" id="user" >
                <option> -------USERS------ </option>
                    <?php 
					while($rows = mysqli_fetch_array($result)){
						echo '<option value="'.$rows["matv"].'">'.$rows["tentv"].'</option>';
					};
				 ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">POST OF USER</label>
                <select class="form-control" id="post1" >
                <option> -------POST------ </option>
                </select>
            </div>
            <div class="form-group">
                <label for="">THEME</label>
                <select class="form-control" id="theme" >
                <option> -------THEMES------ </option>
                    <?php 
					while($rows = mysqli_fetch_array($result1)){
						echo '<option value="'.$rows["macd"].'">'.$rows["tencd"].'</option>';
					};
				 ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">POST OF THEME</label>
                <select class="form-control" id="post" >
                <option> -------POST------ </option>
                </select>
            </div>

        <form method="POST">
            <div class="form-group">
                <label for="">Search</label>
                <input class="form-control" id="keyword" type="text" placeholder="keyword">
                <button class="btn btn-success" id="insert_data">Send</button>
            </div>    
            <div class="form-group">
                <label for="">POST SEARCH</label>
                <div id="post3"></div>
                
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
			$('#theme').change(function(){
                let $this = $(this);
				let theme_code = $this.val();
                
				//alert(theme_code);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{theme_code:theme_code},
					success:function(data){
                        //alert(data);
						$('#post').html(data);
						
					}
				});



			});
            $('#user').change(function(){
                let $this = $(this);
				let user_code = $this.val();
                
				//alert(user_code);
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{user_code:user_code},
					success:function(data){
                        //alert(data);
						$('#post1').html(data);
						
					}
				});



			});
            $('#insert_data').click(function(event){
            event.preventDefault();
			let keyword = $('#keyword').val();
			//alert(keyword);
			if(keyword == '')
				alert('Dữ liệu không được để trống !');
			else{
				$.ajax({
					url:'ajax_action.php',
					method:'POST',
					data:{keyword:keyword},
					success:function(data){
						//alert('insert thanh cong!');
						// $('#form_insert_data')[0].reset();
						// fetch_data();
                        $('#post3').html(data);
					}
				});
			}
            });

		});
        
	</script>
</body>
</html>

