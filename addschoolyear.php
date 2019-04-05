<?php
include 'db.php';

//School year and Semester
$newSY = $_POST['add_school_year'];
$newSemester = $_POST['sy_semester'];

//Add school year
$insertSY = "INSERT INTO tbl_category (school_year, semester) VALUES('$newSY', '$newSemester')";
$execInsertSY = mysqli_query($db, $insertSY);

if($execInsertSY === true){
  echo "
    <script>
      alert('School year added!');
      window.location.href='admin_dashboard.php';
    </script>
  ";
}else{
  echo "
    <script>
      alert('Failed to add school year');
      window.location.href='admin_dashboard.php';
    </script>
  ";
}
?>
