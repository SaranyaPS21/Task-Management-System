<?php
include_once("header.php");
require_once("../db_operation.php");
$obj = new dboperation();
$sql = "select * from tbl_login where role='User'";
$res = $obj->executequery($sql);
?>

<div class="container">
    <div class="row">

        <div id="form-header" class="col-12">
            <h1 id="title">Task Registration</h1>
        </div>
    </div>

    <div class="row">


        <div id="form-content" class="col-md-12">

            <form id="registration-form" method="POST" action="taskreg_action.php"> <!-- open form -->

                <div class="row form-group">
                    <div class="col-sm-6">
                        <label id="title-label" class="control-label" for="title">*Title:</label>

                        <input id="txt_title" type="text" class="form-control" placeholder="Please Enter Task Title"
                            name="txt_title" required>
                    </div>

                    <div class="col-sm-6">
                        <label id="description-label" class="control-label" for="description">*Decription:</label>

                        <input id="txt_description" type="text" class="form-control"
                            placeholder="Please Enter Your Email" name="txt_description" required>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label id="deadline-label" class="control-label" for="deadline">*Deadline:</label>

                        <input id="txt_deadline" type="date" class="form-control" placeholder="Please Enter Your Email"
                            name="txt_deadline" required>
                    </div>

                    <div class="col-sm-6">
                        <label id="status-label" class="control-label" for="status">*Status:</label>



                        <select id="sel_status" class="form-control" name="sel_status" required>
                            <option>.........select status.............</option>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                <div class="col-sm-6">
                    <label id="user-label" class="control-label" for="user">*Employee Name:</label>



                    <select id="sel_employee" class="form-control" name="sel_employee" required>
                        <option>.........select Employee.............</option>
                        <?php
                        while ($display = mysqli_fetch_array($res)) { ?>
                            <option value="<?php echo $display['login_id'] ?>"><?php echo $display['username'] ?></option><?php
                        }
                        ?>

                    </select>
                </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2 submit-button">
                    </div>
                    <div class="col-sm-6 submit-button">
                        <button type="submit" id="submit" name="btnsave" class="btn btn-default">Save</button>
                        <button type="reset" id="reset" name="btnreset" class="btn btn-default">Cancel</button>

                    </div>

                </div>
            </form> <!-- close form -->

        </div>

    </div>
</div>
<script>
    var today= new Date().toISOString().split('T')[0];
    document.getElementById("txt_deadline").setAttribute("min",today);
</script>
<?php
include_once("footer.php");
?>