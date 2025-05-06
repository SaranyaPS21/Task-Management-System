<?php
include_once("header.php");
require_once("../db_operation.php");
$obj = new dboperation();
$login_id = $_SESSION["loginid"];
$s = 1;
?>
<div class="container">
  <h2 style="margin-top:30px">Task List</h2>
  <div class="row">
    <!-- form for select deadline -->
    <form action="" method="POST">
      <div class=" form-group">
        <div class="col-sm-12">
          <label id="deadline-label" class="control-label" for="deadline">Filter by Deadline</label>
          <br>
          <div>
            <input type="checkbox" id="deadline1" value="Past" name="deadline" onchange="this.form.submit()">
            <label id="deadline-label" class="deadline-label" for="deadline">Past</label>
          </div>
          <div>
            <input type="checkbox" id="deadline2" value="Today" name="deadline" onchange="this.form.submit()">
            <label id="deadline-label" class="deadline-label" for="deadline">Today</label>
          </div>
          <div>
            <input type="checkbox" id="deadline3" value="Upcoming" name="deadline" onchange="this.form.submit()">
            <label id="deadline-label" class="deadline-label" for="deadline">Upcoming</label>
          </div>
        </div>
      </div>
    </form>
    <!-- form for select status -->
    <form action="" method="POST">
      <div class=" form-group">
        <div class="col-sm-12">
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
  </div>
  <!-- table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.no</th>
        <th>Title</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <!-- code for fetching data based on status -->
      <?php
      if (isset($_POST['sel_status'])) {
        $status = $_POST["sel_status"];
        $sql = "select * from tbl_task where task_status='$status' and login_id='$login_id'";
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
              <input type="checkbox" class="chk_status" value="<?= $display['task_id']; ?>" name="chk_status"
                id="chk_status" <?php if ($display['task_status'] == 'Completed')
                  echo 'checked disabled'; ?>>
            </td>
          </tr>
          <?php
        }
      }
      //  code for fetching data based on deadline 
      elseif (isset($_POST['deadline'])) {
        $deadline = $_POST["deadline"];

        if ($deadline == "Past") {
          $sql = "select * from tbl_task where task_deadline < CURRENT_DATE and login_id='$login_id'";
        } elseif ($deadline == "Today") {
          $sql = "select * from tbl_task where DATE(task_deadline) = CURRENT_DATE and login_id='$login_id'";
        } elseif ($deadline == "Upcoming") {
          $sql = "select * from tbl_task where task_deadline > CURRENT_DATE and login_id='$login_id'";
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
              <input type="checkbox" class="chk_status" value="<?= $display['task_id']; ?>" name="chk_status"
                id="chk_status" <?php if ($display['task_status'] == 'Completed')
                  echo 'checked disabled'; ?>>
            </td>
          </tr>
          <?php
        }
      }
      // code for list all task
      else {
        $sql = "select * from tbl_task where login_id='$login_id'";
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
              <input type="checkbox" class="chk_status" value="<?= $display['task_id']; ?>" name="chk_status"
                id="chk_status" <?php if ($display['task_status'] == 'Completed')
                  echo 'checked disabled'; ?>>
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
<!-- Set chosen checkbox as selected -->
<script>
  var dead_line = "<?php echo $deadline; ?>";
  document.getElementById("deadline1").checked = (dead_line === "Past");
  document.getElementById("deadline2").checked = (dead_line === "Today");
  document.getElementById("deadline3").checked = (dead_line === "Upcoming");
</script>

<!--  Marking task as Completed -->
<script>
  $(document).ready(function () {
    $(".chk_status").change(function () {
      var taskid = $(this).val();
      // alert(taskid);
      $.ajax({
        url: "changestatus.php",
        method: "POST",
        data: { task_id: taskid },
        success: function (response) {
          if (response.trim() === "success") {
            alert("Task marked as completed");
            $("input[value='" + taskid + "']").prop("disabled", true);
            location.reload();
          } else {
            alert("Failed to update task");
            $("input[value='" + taskid + "']").prop("checked", false);
          }
        },
        error: function () {
          alert("Error while connecting to server");
        }
      });
    });
  });
</script>


<?php
include_once("footer.php");
?>