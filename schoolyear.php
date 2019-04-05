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
      <img src="images/ustp_logo.jpg" class="img-thumbnail" width="75%" alt="">
      <li><b>Admin</b></li>
      <li>Username: Chairman</li>
      <li><a href="">Settings</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </center>
</div>
<div class="container">
  <div class="col-md-3">

  </div>
  <div class="col-md-9">
    <h1>Logged on as [Chairman]</h1>
  </div>
</div>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="col-md-3">

  </div>

    <form class="" action="admin_dashboard.php" method="post">
      <div class="col-md-3">
        <label for="">School Year</label>
        <select class="" name="schoolyear" id="schoolyear" required="">
          <option value="" disabled selected>Select</option>

          <?php
            //GET SCHOOL YEAR
            $fetchSY = "SELECT * FROM tbl_category";
            $execFetchSY = mysqli_query($db, $fetchSY);
            while($row = mysqli_fetch_array($execFetchSY)){

          ?>
          <option value="<?php echo $row['school_year'];?>"><?php echo $row['school_year'];?></option>
        <?php }  ?>

        </select>
      </div>
      <div class="col-md-3">
        <label for="">Semester</label>
        <select class="" name="semester" id="semester" required="">
          <option value="" disabled selected>Select</option>
          <option value="1st sem">1st Sem</option>
          <option value="2nd sem">2nd Sem</option>
          <option value="Summer">Summer</option>
        </select>
      </div>
      <div class="col-md-3">

        <br>
        <input type="submit" name="" value="Enter" class="btn btn-success">
      </div>
    </form>
</div>

<!-- <h1>Admin Dashboard</h1>
<form action="search.php" method="post" class="search">
  <h4>Search Student</h4>
  <input type="text" name="search_student" placeholder="Search Student" required="">
  <input type="submit" value="Search">
</form>

<hr> -->

<!-- <form class="add" action="addstudent.php" method="post">
  <h4>Add Student</h4>
  <input type="text" name="add_student" placeholder="Enter ID Number" required="">
  <input type="submit" value="Search">
</form>
<a href="logout.php">Log Out</a> -->
<?php include 'include/footer.php'; ?>
