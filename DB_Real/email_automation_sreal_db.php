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
    $batch = mysqli_real_escape_string($con,$_POST['batch']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $message = str_replace('\r\n', '&#10;', $message);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "From: $sender" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
   if ($batch != "" && $message != ""){
     $sql_query_slist = "SELECT * FROM `students_real` WHERE batch='".$batch."' ";
     $result_slist = mysqli_query($con,$sql_query_slist);
      while($row = mysqli_fetch_assoc($result_slist))
       {
         $name=$row['fname'];
         $email=$row['email'];
         $to = $email;
         mail($to,$subject,$message,$headers);
         echo "Massage Sent to $name on Email $email <br>";
       }
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
