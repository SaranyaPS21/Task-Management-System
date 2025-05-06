<?php
require_once("../db_operation.php");
$obj = new dboperation();
if (isset($_POST["btnsave"])) {
    $title = $_POST["txt_title"];
    $description = $_POST["txt_description"];
    $deadline = $_POST["txt_deadline"];
    $status = $_POST["sel_status"];
    $login_id = $_POST["sel_employee"];
    $sql = "select * from tbl_task where task_title='$title'";
    $res = $obj->executequery($sql);
    $rows = mysqli_num_rows($res);
    if ($rows == 1) {
        echo "<script>alert('Task already exist');window.location='taskview.php'</script>";
    } else {
        $sql = "insert into tbl_task(task_title,task_description,task_deadline,task_status,login_id)values('$title','$description','$deadline','$status','$login_id')";
        $res = $obj->executequery($sql);
        if ($res == 1) {
            echo "<script>alert('Task saved successfully');window.location='taskview.php'</script>";

        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again');window.location='taskreg.php'</script>";
        }
    }
}
?>