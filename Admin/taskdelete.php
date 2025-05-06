<?php
require_once("../db_operation.php");
$obj = new dboperation();
if(isset($_GET["task_id"]))
{
    $task_id=$_GET["task_id"];
     $executequery="delete from tbl_task where task_id='$task_id'";
    $res = $obj->executequery($executequery);

    if($res==1)
    {
        echo '<script>alert("Task Deleted");window.location="taskview.php"</script>';;
    }

    else{
        echo '<script>alert("Oops! Something went wrong. Please try again");window.location="taskview.php"</script>';;

    }

}



?>