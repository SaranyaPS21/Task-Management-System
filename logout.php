<?php
session_start();
session_destroy();
header("location:Guest/login.php");
?>
