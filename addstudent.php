<?php
include 'db.php';

//add student first
$school_year = $_POST['student_schoolyear'];
$school_semester = $_POST['semester'];
$school_year_ID = "";

//Compare
$compare = "SELECT * FROM tbl_category WHERE school_year = '$school_year' AND semester = '$school_semester'";
$execCompare = mysqli_query($db, $compare);
while($c_row = mysqli_fetch_array($execCompare)){
	$school_year_ID = $c_row['id'];
}

$student_username = $_POST['student_username'];
$student_schoolyear = $_POST['student_schoolyear'];
$semester = $_POST['semester'];

// $office_id = $_SESSION['office_id'];

//QUERY ADDED
$addStudentQuery = "INSERT INTO tbl_student (student_username, student_password, student_name) VALUES('$student_username','$student_username','$student_username')";
$execAddStudent = mysqli_query($db, $addStudentQuery);

//GET STUDENT ID
$getStudentID = "SELECT * FROM tbl_student WHERE student_username = '$student_username'";
$execGetStudent = mysqli_query($db, $getStudentID);
$student_ID = "";

while($s_row = mysqli_fetch_array($execGetStudent)){
	$student_ID = $s_row['id'];
}

//INSERT TO STATUS
for($i = 1; $i <= 3; $i++){
	$insertStatus = "INSERT INTO tbl_status (student_id, office_id, category_id, status) VALUES('$student_ID','$i','$school_year_ID','NOT CLEARED')";
	$execInsertStatus = mysqli_query($db, $insertStatus);
}

echo "
	<script>
		alert('Student added');
		window.location.href='admin_dashboard.php';
	</script>
";

?>
