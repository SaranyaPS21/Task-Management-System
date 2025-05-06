<?php
require_once("../db_operation.php");
$obj = new dboperation();

if (isset($_POST["task_id"])) {
    $task_id = $_POST["task_id"];
    $sql = "Update tbl_task set task_status = 'Completed' where task_id = '$task_id'";
    $res = $obj->executequery($sql);
    echo $res == 1 ? "success" : "error";

}
?>