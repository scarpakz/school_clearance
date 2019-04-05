<?php session_start();?>
<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
<div class="sidebar">
  <br>
  <center>
    <!-- <img src="images/ustp_logo.jpg" class="img-thumbnail" width="100px" alt=""> -->
    <br>
    <!-- <hr style="border: solid 1px #888;"> -->
    <!-- <ul> -->
      <img src="images/ustp_logo.jpg" class="img-thumbnail" width="75%" alt="">
      <h3 style="color:white;">University of Science and Technology of Southern Philippines</h3>
      <!-- <li><b>Admin</b></li>
      <li>Username: <?php echo $_SESSION['office_username'];?></li>
      <li><a href="">Settings</a></li>
    </ul> -->
  </center>
</div>

<div class="container">
  <div class="col-md-3">
  </div>
  <div class="col-md-9">
    <h1>Logged on as [<?php echo $_SESSION['office_username'];?>]</h1>
    <button type="button" class="btn btn-primary" name="button"><span class="glyphicon glyphicon-check"></span> Cleared Students</button>
    <button type="button" class="btn btn-warning" name="button"><span class="glyphicon glyphicon-unchecked"></span> Uncleared Students</button>
    <a href="logout.php" style="float:right;" class="btn btn-danger">Logout <span class="glyphicon glyphicon-log-out"></span> </a>
  </div>
</div>

<br>
<div class="container">
  <div class="col-md-3">

  </div>
  <div class="col-md-4">
    <style>
      table thead {
        width: 100%;
      }
      table thead th{
        padding: 15px;
      }
      table tbody td{
        padding: 10px;
      }
    </style>
    <table border="1px">
      <thead>
        <thead>
          <th>ID Number</th>
          <th>Office</th>
          <th>School Year</th>
          <th>Semester</th>
          <th>Status</th>
        </thead>
        <!-- SELECT column_name(s)
        FROM table1
        INNER JOIN table2
        ON table1.column_name = table2.column_name; -->
        <?php
          $student_username = $_POST['search_results'];
          $search_student_sy = $_POST['search_student_sy'];
          $search_semester = $_POST['search_semester'];
          $student_ID = "";
          $office_username = $_SESSION['office_username'];
          //validate


          $joinTable = "SELECT tbl_category.semester, tbl_student.id, tbl_student.student_username, tbl_status.status, tbl_office.office_username, tbl_category.school_year FROM tbl_student, tbl_status, tbl_office, tbl_category WHERE tbl_student.id = tbl_status.student_id AND tbl_office.id = tbl_status.office_id";
          $execJoinTable = mysqli_query($db, $joinTable);

          $x = 1;
          while($join_row = mysqli_fetch_array($execJoinTable)){
            if($x <= 3){
              $student_ID = $join_row['id'];
        ?>
        <tbody>
          <td><?php echo $join_row['student_username'];?></td>
          <td><?php echo $join_row['office_username'];?></td>
          <td><?php echo $join_row['school_year'];?></td>
          <td><?php echo $join_row['semester'];?></td>
          <td><?php echo $join_row['status'];?></td>
        </tbody>
          <?php }?>
          <?php $x++;?>
        <?php }?>
    </table>

    <div class="search">
      <form action="cleared.php?id=<?php echo $student_ID; ?>" method="post">
        <input type="submit" value="Mark as Cleared" class="btn btn-success"><br><br><br>
      </form>
      <form action="searchresults.php" method="POST">
        <label for="">Search student by ID number:</label>
        <input type="text" name="search_results" placeholder="Ex. 2000012322" value="" required=""><br><br>
        <select class="" name="search_student_sy" required="">
          <option value="" disabled selected>School year</option>
          <?php
            $checkDuplicate = "";
            $getSchoolYear = "SELECT * FROM tbl_category";
            $execSchoolYear = mysqli_query($db, $getSchoolYear);
            $counter = 0;

            while($row_sy = mysqli_fetch_array($execSchoolYear)){
              if($checkDuplicate != $row_sy['school_year']){
                $checkDuplicate = $row_sy['school_year'];
            ?>
            <option value="<?php echo $row_sy['school_year'];?>"><?php echo $row_sy['school_year'];?></option>
          <?php }?>
        <?php }?>
      </select><br><br>
        <select class="" name="search_semester">
          <option value="" disabled selected>Semester</option>
          <option value="1st sem">1st sem</option>
          <option value="2nd sem">2nd sem</option>
          <option value="summer">Summer</option>
        </select><br><br>
        <input type="submit" name="" value="Search" class="btn btn-warning">
      </form>
    </div>
    <br><br>

  </div>
</div>
<?php include 'include/footer.php'; ?>
