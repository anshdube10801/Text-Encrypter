<?php
include('./db/_connect.php');

if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&   $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
{
   $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: ' . $redirect);
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Encrypter</title>
    <link rel="stylesheet" href="decrypt.css">
</head>
<body>
    <div id="head">
        <h1 id="h1">Text Decrypter</h1>
    </div>
    <div id="box">
        <div>
            <form action="" method="post">
                
                <h2 class="h2">Your Encrypted Code</h2>
             <input type="text" name="code" id="output">

             <h2 class="h2">Enter Password <p style="font-family: monospace; font-size: 15px; color: rgb(93, 93, 93); text-align: center;">(If you didn't set password leave it blank!)</p></h2> 
                <input type="password" name="pass" id="pass" >

                <div id="btn">
                <input type="submit" value=" Submit " id="submit" >
               
                 </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['code'])){
        $code=$_POST['code'];
        
        $password=$_POST['pass'];
        $check = mysqli_query($connect, "SELECT * from user where code='$code'");
        // var_dump($check);
        if(mysqli_num_rows($check)>0){
            $data = mysqli_fetch_array($check);
            // echo $data ; 
            // var_dump($data);
            if(password_verify($password , $data['pass'])){
                $store = $data['text'];
                // echo $store;
            }
            else {
                echo"<script>
                alert('ERROR 422 : Wrong Password');
                </script>";
            } 
        }
        else {
            echo"<script>
            alert('ERROR 421 : Wrong Code');
            </script>";
        }
    }
    ?>
    <?php  
    if(isset($store)){
    echo'<div id="three">
        <h2 class="h2" id="lastbox">Your Decrypted Text</h2>
        <textarea id="textarea" cols="30" rows="5" disabled>'.$data["text"].'</textarea>
    </div>';
}
    ?>
    <footer>
        <p id="footer">Copyright &copy; 2022 All Rights Reserved by AA </p> 
    </footer>
</body>
</html>