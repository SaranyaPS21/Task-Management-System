<?php
session_start();
require_once("../db_operation.php");
$obj = new dboperation();
if (isset($_POST["submit"])) {
  $email = $_POST["txt_email"];
  $password = $_POST["txt_password"];
  $sql = "select * from tbl_login where emailid='$email' and password='$password'";
  $res = $obj->executequery($sql);
  if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_array($res);
    $_SESSION["loginid"] = $row["login_id"];
    $_SESSION["emailid"] = $row["emailid"];
    $_SESSION["username"] = $row["username"];
    if ($row["role"] == "Admin") {
      header("location:..\Admin\index.php");
    } elseif ($row["role"] == "User") {
      header("location:..\User\index.php");
    } 
  }
  else {
      echo '<script>alert("Invalid Username/Password!!"); window.location="login.php"</script>';
    }
  }

?>