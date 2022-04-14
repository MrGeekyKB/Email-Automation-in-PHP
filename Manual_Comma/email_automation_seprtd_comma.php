<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
  </head>
  <body>
<?php
include '../../config/config1.php';
$sender = "kartiktheno1king@gmail.com";
if(isset($_POST['submit'])){
    $emails = mysqli_real_escape_string($con,$_POST['emails']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $message = str_replace('\r\n', '&#10;', $message);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "From: $sender" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
   if ($emails != "" && $message != ""){
         $to = $emails;
         mail($to,$subject,$message,$headers);
         echo "Massage Sent on Email $to <br>";
    }
      else{
        ?>  <script>

           alert("Something Went Wrong !");
           </script>
 <?php

   }
}
 ?>
 <h2 style=" background-color: rgba(0, 10, 255, 0.55); padding: 10px; color: rgb(255, 255, 255)"> <center> All Emails Sent Sucessfully! </center></h2>
 <footer>
   <p style=" float: right ">©️Kartik B.</p>
 </footer>
</body>
</html>
