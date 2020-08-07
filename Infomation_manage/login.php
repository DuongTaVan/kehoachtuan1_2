<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập vào website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        *{
    padding: 0px;
    margin: 0px;
    font-family: sans-serif;
    box-sizing: border-box;
}
header{
    min-height: 70px;
    padding: 15px;
}
main{

    min-height: 300px;
    padding: 7.5px 15px;
}
footer{
    background-color: #cccccc;
    min-height: 70px;
    padding: 15px;
}
.container{
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}
.login-form{
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}
h1{
    color: #009999;
    font-size: 20px;
    margin-bottom: 30px;
}
.input-box{
    margin-bottom: 10px;
}
.input-box input{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
}
.btn-box{
    text-align: right;
    margin-top: 30px;
}
.btn-box button{
    padding: 7.5px 15px;
    border-radius: 2px;
    background-color: #009999;
    color: #ffffff;
    border: none;
    outline: none;
}
        </style>
    </head>
    <body>

        <main>
            <div class="container">
            <div class="login-form">
                <form action="login_action.php" method="post">
                    <h1>Đăng nhập vào website</h1>
                    <?php
                        if(isset($_SESSION["thongbao"])){
                            echo $_SESSION["thongbao"];
                           // session_unset("thongbao");
                            session_destroy();
                        }
                        
                        
                    ?>
                    <div class="input-box">
                        <i ></i>
                        <input name="username" type="text" placeholder="Nhập username">
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input name="password" type="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="btn-box">
                        <button id="submit" type="submit">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>

    </body>
</html>