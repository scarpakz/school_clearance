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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-check"></span> Records</button>
    <!-- <button type="button" class="btn btn-warning" name="button"><span class="glyphicon glyphicon-unchecked"></span> Uncleared Students</button> -->
    <a href="logout.php" style="float:right;" class="btn btn-danger">Logout <span class="glyphicon glyphicon-log-out"></span> </a>
  </div>
</div>

<div class="container">
  <div class="col-md-3">
    <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Records</h4>
      </div>
      <style media="screen">
        .modal-body table{
          width: 100%;
        }
        .modal-body thead{
          background-color: #f0f0f0;
        }
        .modal-body td{
          padding:15px;
        }
        .modal-body th{
          padding:5px;
        }
      </style>
      <div class="modal-body">
        <table border="1px">
          <thead>
            <th>Student Username</th>
            <th>Office</th>
            <th>Status</th>
          </thead>
          <?php
            $joinTable = "SELECT tbl_category.semester, tbl_student.id, tbl_student.student_username, tbl_status.status, tbl_office.office_username, tbl_category.school_year FROM tbl_student, tbl_status, tbl_office, tbl_category WHERE tbl_student.id = tbl_status.student_id AND tbl_office.id = tbl_status.office_id";
            $execJoinTable = mysqli_query($db, $joinTable);
            while($rowTable = mysqli_fetch_array($execJoinTable)){
          ?>
          <tbody>
            <td><?php echo $rowTable['student_username'];?></td>
            <td><?php echo $rowTable['office_username'];?></td>
            <td><?php echo $rowTable['status'];?></td>
            <br>
          </tbody>
          <?php }?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- END -->
  </div>
  <div class="col-md-3">
    <hr>
    <?php $office_username = $_SESSION['office_username'];?>
    <?php if($office_username == 'chairman'){?>
    <div class="clearance_add_student">
      <h3>Add Student</h3>
      <form action="addstudent.php" method="POST">
        <input type="text" name="student_username" placeholder="Student ID Number" style="width:100%; padding: 10px; font-size: 16px;" required="">
        <br><br>
        <select class="" name="student_schoolyear" required="">
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
        </select>
        <br>
        <br>
        <select class="" name="semester" required="">
          <option value="" disabled selected>Semester</option>
          <option value="1st sem">1st sem</option>
          <option value="2nd sem">2nd sem</option>
          <option value="summber">Summer</option>
        </select>
        <br>
        <br>
        <input type="submit" style="width:100%;" value="Add Student" class="btn btn-success">
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <hr>
    <div class="clearance_add_form">
      <h3>Add School Year</h3>
      <form class="" action="addschoolyear.php" method="post">
        <input type="text" name="add_school_year" placeholder="Ex. 2019-2020" style="width:100%; padding: 10px; font-size: 16px;" required="">
        <br><br>
        <select class="" name="sy_semester">
          <option value="" disabled selected>Semester</option>
          <option value="1st sem">1st sem</option>
          <option value="2nd sem">2nd sem</option>
          <option value="summer">Summer</option>
        </select>
        <br><br>
        <input type="submit" style="width:100%;" value="Add" class="btn btn-primary">
      </form>
    <?php }?>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="col-md-3">

  </div>
  <div class="col-md-4">
    <div class="search">
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
