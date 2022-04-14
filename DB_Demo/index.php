<?php
include "../../config/config1.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <title>Auto Email Wizard (DB Based)</title>
    <style media="screen">
    .ip{
      padding:15px;
      margin: 5px;
      width: 90%;
    }
      .btn_submit{
        background: rgb(53, 255, 0);
        padding: 10px;
        color: rgb(255, 255, 255);
        font-weight: bolder;
        font-size: 25px;
        border-color: rgb(0, 255, 65)
      }
    </style>
  </head>
  <body>
    <h1>Auto Email Wizard (DB Based)</h1>
    <form class="" action="email_automation_sdemo_db.php" method="post">
      <?php
      $sql_query_s = "SELECT * FROM `demo_batch_list`";
      $result_s = mysqli_query($con,$sql_query_s);
       ?>
      Select Batch <br> <select class="ip" class="batch" name="batch" required><br>
        <?php while($row_s = mysqli_fetch_array($result_s)):;?>
          <?php $option_id=$row_s['0'];  $option=$row_s['1'] ?>
        <option value="<?php echo $option_id?>"><?php echo $option ?></option><br>
      <?php endwhile?>
      subject <input type="hidden" name="" value=""><br>
      Subject <br> <input type="text"  class="ip" name="subject" value="" required><br>
      <center>
        <div class="container">
          <label for="Month"><b>Write Massage Here</b></label><br>
          <textarea name="message" rows="8" cols="80" placeholder="Write/Copy Paste Notification Here..."></textarea><br>
          <input type="submit" class="btn_submit" id="btn_submit" name="submit" value="Send" onclick="change()">
      </center>
    </form>
  </body>
</html>
<script>
   CKEDITOR.replace('message');
   CKEDITOR.replace('editor2');

   function getData() {
       //Get data written in first Editor
       var editor_data = CKEDITOR.instances['editor1'].getData();
       //Set data in Second Editor which is written in first Editor
       CKEDITOR.instances['editor2'].setData(editor_data);
   }
</script>
<script type="text/javascript">
function change() // no ';' here
{
  var elem = document.getElementById("btn_submit");
  if (elem.value=="Submit") elem.value = "Sending";
  else elem.value = "Sending...";
}
</script>
