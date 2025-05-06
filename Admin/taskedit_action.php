<?php
require_once("../db_operation.php");
$obj=new dboperation();
if(isset($_POST["task_id"]))
{
    $task_id=$_POST['task_id'];
    $title=$_POST["txt_title"];
    $description=$_POST["txt_description"];
    $deadline=$_POST["txt_deadline"];
    $status=$_POST["sel_status"];
    $login_id=$_POST["sel_employee"];
    $sql="update tbl_task set task_title='$title',task_description='$description',task_deadline='$deadline',task_status='$status',login_id='$login_id' where task_id='$task_id'";
    $res=$obj->executequery($sql);
    if($res==1) 
     {
        echo "<script>alert('Task Updated');window.location='taskview.php'</script>";

    }
    else 
     {
        echo "<script>alert('Oops! Something went wrong. Please try again');window.location='taskview.php'</script>";

    }
     

}
?>