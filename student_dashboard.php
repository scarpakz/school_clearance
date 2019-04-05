<?php session_start();?>
<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
<div class="sidebar">
  <br>
  <center>
    <img src="images/ustp_logo.jpg" class="img-thumbnail" width="100px" alt="">
    <br>
    <hr style="border: solid 1px #888;">
    <ul>
      <!-- <img src="images/ustp_logo.jpg" class="img-thumbnail" width="75%" alt=""> -->
      <span class="glyphicon glyphicon-user" style="font-size:100px;"></span>
      <li><b><?php echo $_SESSION['student_username'];?></b></li>
      <li>Username: 2014100369</li>
      <li><a href="">Settings</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </center>
</div>
<div class="container">
  <div class="col-md-3">

  </div>
  <div class="col-md-9">
    <h1>Student Dashboard</h1>
    <hr>
      <!-- SCHOOL YEAR -->
  </div>
</div>
<div class="container">
  <div class="col-md-3">
  </div>
  <div class="col-md-1">

  </div>
  <div class="col-md-3">
    <label for="">School Year</label>
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

  </div>
  <div class="col-md-4">
    <label for="">Semester</label>
    <select class="" name="semester" required="" onchange="loadResults()">
      <option value="" disabled selected>Semester</option>
      <option value="1st sem">1st sem</option>
      <option value="2nd sem">2nd sem</option>
      <option value="summber">Summer</option>
    </select>
  </div>
</div>
<div class="container">
  <div class="col-md-3">

  </div>
  <div class="col-md-9">
    <h3><b>E-Clearance</b></h3>
  </div>
</div>
<div class="container">
  <div class="col-md-4">

  </div>
  <div class="col-md-3">
    <center>
      <br>
      <br>
      <br>
      <h4 id="osa"><u><b></b></u></h4>
      <h5>Librarian</h5>
      <h5><b>Osa</b> </h5>
    </center>
  </div>
  <div class="col-md-4">
    <center>
      <br>
      <br>
      <br>
      <h4 id="cashier"><u><b></b></u></h4>
      <h5>Cashier</h5>
      <h5><b>Name</b> </h5>
    </center>
  </div>
</div>
<div class="container">
  <div class="col-md-4">

  </div>
  <div class="col-md-7">
    <center>
      <center>
        <br>
        <br>
        <br>
        <h4 id="chairman"><u><b></b></u></h4>
        <h5>ENGR. Maricel Esclamado</h5>
        <h5><b>Chairman</b> </h5>
      </center>
    </center>
  </div>
</div>
<div class="container">
  <div class="col-md-2">

  </div>
  <div class="col-md-10">
    <br>
    <br>
    <br>
    <!-- <h4>Overall status: <b>Not Cleared</b> </h4> -->
  </div>
</div>
  <?php include 'include/footer.php'; ?>
