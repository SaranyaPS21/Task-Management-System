<?php
include("header.php");
require_once("../db_operation.php");
$obj = new dboperation();
$task_id = $_GET["task_id"];
$sql = "select * from tbl_task where task_id='$task_id'  ";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>

<div class="container">
    <div class="row">

        <div id="form-header" class="col-12">
            <h1 id="title">Update Task Details</h1>
        </div>
    </div>

    <div class="row">


        <div id="form-content" class="col-md-12">

            <form id="registration-form" method="POST" action="taskedit_action.php"> <!-- open form -->

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label id="title-label" class="control-label" for="title">*Title:</label>

                        <input id="txt_title" type="text" class="form-control"
                            value="<?php echo $display["task_title"] ?>" name="txt_title" required>
                        <input type="hidden" name="task_id" required value="<?php echo $task_id ?>">

                    </div>

                    <div class="col-sm-6">
                        <label id="description-label" class="control-label" for="description">*Decription:</label>

                        <input id="txt_description" type="text" class="form-control"
                            value="<?php echo $display["task_description"] ?>" name="txt_description" required>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label id="deadline-label" class="control-label" for="deadline">*Deadline:</label>

                        <input id="txt_deadline" type="date" class="form-control"
                            value="<?php echo $display["task_deadline"] ?>" name="txt_deadline" required>
                    </div>

                    <div class="col-sm-6">
                        <label id="status-label" class="control-label" for="status">*Status:</label>



                        <select id="sel_status" class="form-control" name="sel_status" required>
                            <option>.........select status.............</option>
                            <option value="Pending" <?php echo ($display["task_status"] == "Pending") ? "selected" : ""; ?>>Pending</option>
                            <option value="In Progress" <?php echo ($display["task_status"] == "In Progress") ? "selected" : ""; ?>>In Progress</option>
                            <option value="Completed" <?php echo ($display["task_status"] == "Completed") ? "selected" : ""; ?>>Completed</option>

                        </select>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label id="user-label" class="control-label" for="user">*Employee Name:</label>



                        <select id="sel_employee" class="form-control" name="sel_employee" required>
                            <option>.........select Employee.............</option>
                            <?php
                            $sql1 = "select * from tbl_login where role='User'";
                            $res1 = $obj->executequery($sql1);
                            while ($display1 = mysqli_fetch_array($res1)) {
                                ?>
                                <option value="<?php echo $display1["login_id"]; ?>" <?php echo ($display["login_id"] == $display1["login_id"]) ? "selected=selected" : ""; ?>>
                                    <?php echo $display1["username"]; ?>
                                </option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 submit-button">
                    </div>
                    <div class="col-sm-6 submit-button">
                        <button type="submit" id="submit" name="btnupdate" class="btn btn-default">Update</button>
                        <button type="reset" id="reset" name="btnreset" class="btn btn-default">Cancel</button>

                    </div>

                </div>
            </form> <!-- close form -->

        </div>

    </div>
</div>

<?php
include_once("footer.php");
?>