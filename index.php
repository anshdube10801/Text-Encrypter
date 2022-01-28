<?php
  include("./db/_connect.php");
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
    <link rel="stylesheet" href="index.css">
    <title>Text Encrypter/Decrypter</title>
</head>
<body>
    <div id="mainhead">
        <h1 id="head" class="upper">Welcome to Text Encrypter/Decrypter</h1>
        <p class="upper"id="secondhead">Encrypt Your Text and Decrypt Instantly</p>
    </div>
    <h2 class="upper" id="select" style="text-decoration: underline ;">Select your option</h2> 
    <div id="block">
        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <h2 id="e1">Encrypt your Text</h2>
                <p class="para" id="p1">You can encrypt your text and secure it by password(optional) by clicking on the button behind the card.</p>
                <p class="down">Hover Me!</p>
              </div>
              <div class="flip-card-back" >
               <a class="fbtn" href="./encrypt.php">Click Me!</a>
              </div>
            </div>
          </div>
        <div id="vl">
            <div id="vl1"></div>
            <div id="vl2">  OR </div>
            <div id="vl3"></div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <h2 id="e2">Decrypt your Text</h2>
                <p class="para" id="p1">You can decrypt your text easily if you secured it by password then enter it by clicking on the button behind the card.</p>
                <p class="down">Hover Me!</p>
              </div>
              <div class="flip-card-back">
                <a class="fbtn" href="./decrypt.php">Click Me!</a>
              </div>
            </div>
          </div>
    </div>
    <footer>
        <p id="footer">Copyright &copy; 2022 All Rights Reserved by AA </p> 
    </footer>
</body>
</html>