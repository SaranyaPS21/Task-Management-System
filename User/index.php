<?php
include_once("header.php");
$username=$_SESSION["username"];
?>
<div style="padding-left:16px">
  <br>
  <br>
  <h2 style="text-align: center;">WELCOME <?php echo strtoupper($username) ?></h2>
  <p></p>
</div>
<?php
include_once("footer.php");
?>