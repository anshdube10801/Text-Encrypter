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
    <link rel="stylesheet" href="encrypt.css">
</head>
<body>
    <div id="head">
        <h1 id="h1">Text Encrypter</h1>
    </div>
    <div id="box">
        <div>
            <form action="" method="post">
                <h2 class="h2">Enter your text</h2>
               <textarea name="text" id="textarea" cols="30" rows="5"  required pattern=".*\S+.*"></textarea>
                <h2 class="h2" id="pss">Enter Password <p style="font-family: monospace; font-size: 16px; text-align: center; color: rgb(93, 93, 93);">(Optional!)</p></h2> 
                <input type="password" name="pass" id="pass" >
                <div id="btn">
                <input type="submit" value=" Submit " id="submit">
               
                 </div>
            </form>
        </div>
        <?php
            if(isset($_POST['text']))
            {
                $text = $_POST['text'];
                // $thash = password_hash($text , PASSWORD_DEFAULT);
                $password = $_POST['pass'];
                $phash = password_hash($password , PASSWORD_DEFAULT);
                $val = substr(md5(microtime()), rand(0,26),2);
                $val1 = substr(md5(microtime()), rand(0,26),2);
                $val2= substr(md5(microtime()), rand(0,26),2);
                
                if($_POST['text']==" ") {
                    echo"<script>
                    alert('ERROR 420 : Blank Text');
                    </script>";
                }
               else{
                $link="ENC".$val."TXT".$val1."BY".$val2."AA";
                $insert = mysqli_query($connect, "INSERT into user (text, code, pass) VALUES('$text', '$link', '$phash') ");
               }
            }
           
           
    ?>            
    </div>
    <?php
    if(isset($link))
    {
          echo'  <div id="three" style="margin-bottom: 25px;">
                <h2 class="h2">Your Encrypted Code</h2>
                <div id="four" >
                <input id="inpcode" type="text" value="'.$link.'" disabled>
                <button id="copybtn" onclick="copy()">&nbsp;Copy&nbsp;</button>
                </div>   
            </div>
            <footer>
                <p id="footer">Copyright &copy; 2022 All Rights Reserved by AA </p> 
            </footer>';
    }
            ?>
    

    <script>
        function copy(){
            var copyText = document.getElementById("inpcode");
            copyText.select(); 
           var abc= navigator.clipboard.writeText(copyText.value);
            if(abc!=""){
              var d=  document.getElementById("copybtn").innerHTML="Copied";
            }
                if(d){
                    window.location="decrypt.php";
                }

        }
    </script>
</body>
</html>