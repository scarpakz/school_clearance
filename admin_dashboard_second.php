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

<div class="container">
  <div class="col-md-3">
  </div>
  <div class="col-md-3">
    <hr>
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
