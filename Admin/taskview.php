<?php
include_once("header.php");
require_once("../db_operation.php");
$obj = new dboperation();
$s = 1;
?>
<div class="container">
  <h2 style="margin-top:30px">Task List</h2>
  <p style="text-align: end;"><a href="taskreg.php" class="btn btn-primary">Add new Task</a></p>
  <div class="row ">
    <!-- form for select status -->
    <form action="" method="POST">
      <div class=" form-group">
        <div class="col-md-12">
          <label id="status-label" class="control-label" for="status">Filter by Status</label>
          <select id="sel_status" class="form-control" name="sel_status" onchange="this.form.submit()">
            <option>.........select status.............</option>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
          </select>
        </div>
      </div>
    </form>
    <!-- form for select deadline -->
    <form action="" method="POST">
      <div class=" form-group">
        <div class="col-md-12">
          <label id="deadline-label" class="control-label" for="deadline">Filter by Deadline</label>
          <select id="sel_deadline" class="form-control" name="sel_deadline" onchange="this.form.submit()">
            <option>.........select status.............</option>
            <option value="Past">Past</option>
            <option value="Today">Today</option>
            <option value="Upcoming">Upcoming</option>
          </select>
        </div>
      </div>
    </form>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.no</th>
        <th>Employee Name</th>
        <th>Title</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- code for fetching data based on status -->
      <?php
      if (isset($_POST['sel_status'])) {
        $status = $_POST["sel_status"];
        $sql = "select * from tbl_task t inner join tbl_login l on t.login_id=l.login_id where task_status='$status'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
          $taskdeadline = new DateTime($display['task_deadline']);
          $task_deadline = $taskdeadline->format('d-m-Y');
          ?>
          <tr>
            <td>
              <?php echo $s++ ?>
            </td>
            <td>
              <?php echo $display["username"]; ?>
            </td>
            <td>
              <?php echo $display["task_title"]; ?>
            </td>

            <td>
              <?php echo $display["task_description"]; ?>
            </td>
            <td>
              <?php echo $task_deadline; ?>
            </td>
            <td>
              <?php echo $display["task_status"]; ?>
            </td>
            <td>
              <a href="taskedit.php?task_id=<?php echo $display["task_id"]; ?>">
                <button type="submit" class="btn btn-icon btn-success" name="edit">Edit<i class="fa fa-edit"></i></button>
              </a>
            </td>
            <td>
              <a href="taskdelete.php?task_id=<?php echo $display["task_id"]; ?>"
                onclick="return confirm('Are you sure you want to delete?')">
                <button type="submit" class="btn btn-icon btn-danger" name="delete">Delete<i
                    class="fa fa-trash"></i></button>
              </a>
            </td>
          </tr>
          <?php
        }
      }
      //  code for fetching data based on deadline 
      elseif (isset($_POST['sel_deadline'])) {
        $deadline = $_POST["sel_deadline"];
        if ($deadline == "Past") {
          $sql = "select * from tbl_task t inner join tbl_login l on t.login_id=l.login_id where task_deadline < CURRENT_DATE";
        } elseif ($deadline == "Today") {
          $sql = "select * from tbl_task t inner join tbl_login l on t.login_id=l.login_id where DATE(task_deadline) = CURRENT_DATE";
        } elseif ($deadline == "Upcoming") {
          $sql = "select * from tbl_task t inner join tbl_login l on t.login_id=l.login_id where task_deadline > CURRENT_DATE";
        }



        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
          $taskdeadline = new DateTime($display['task_deadline']);
          $task_deadline = $taskdeadline->format('d-m-Y');
          ?>
          <tr>
            <td>
              <?php echo $s++ ?>
            </td>
            <td>
              <?php echo $display["username"]; ?>
            </td>
            <td>
              <?php echo $display["task_title"]; ?>
            </td>
            <td>
              <?php echo $display["task_description"]; ?>
            </td>
            <td>
              <?php echo $task_deadline; ?>
            </td>
            <td>
              <?php echo $display["task_status"]; ?>
            </td>
            <td>
              <a href="taskedit.php?task_id=<?php echo $display["task_id"]; ?>">
                <button type="submit" class="btn btn-icon btn-success" name="edit">Edit<i class="fa fa-edit"></i></button>
              </a>
            </td>
            <td>
              <a href="taskdelete.php?task_id=<?php echo $display["task_id"]; ?>"
                onclick="return confirm('Are you sure you want to delete?')">
                <button type="submit" class="btn btn-icon btn-danger" name="delete">Delete<i
                    class="fa fa-trash"></i></button>
              </a>
            </td>
          </tr>
          <?php
        }
      }
      //list all the task 
      else {
        $sql = "select * from tbl_task t inner join tbl_login l on t.login_id=l.login_id";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
          $taskdeadline = new DateTime($display['task_deadline']);
          $task_deadline = $taskdeadline->format('d-m-Y');
          ?>
          <tr>
            <td>
              <?php echo $s++ ?>
            </td>
            <td>
              <?php echo $display["username"]; ?>
            </td>
            <td>
              <?php echo $display["task_title"]; ?>
            </td>
            <td>
              <?php echo $display["task_description"]; ?>
            </td>
            <td>
              <?php echo $task_deadline; ?>
            </td>
            <td>
              <?php echo $display["task_status"]; ?>
            </td>
            <td>
              <a href="taskedit.php?task_id=<?php echo $display["task_id"]; ?>">
                <button type="submit" class="btn btn-icon btn-success" name="edit">Edit<i class="fa fa-edit"></i></button>
              </a>
            </td>
            <td>
              <a href="taskdelete.php?task_id=<?php echo $display["task_id"]; ?>"
                onclick="return confirm('Are you sure you want to delete?')">
                <button type="submit" class="btn btn-icon btn-danger" name="delete">Delete<i
                    class="fa fa-trash"></i></button>
              </a>
            </td>
          </tr>
          <?php
        }

      }
      ?>
    </tbody>
  </table>
</div>
<!-- Set chosen dropdown option as selected -->
<script>
  document.getElementById("sel_status").value = "<?php echo $status; ?>";
</script>
<script>
  document.getElementById("sel_deadline").value = "<?php echo $deadline; ?>";
</script>
<?php
include_once("footer.php");
?>