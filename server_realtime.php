<?php
include 'db.php';

$data = array(
  "status" => array(),
  "office_username" => array()
);

//GET DATA
$query = "SELECT tbl_category.semester, tbl_student.id, tbl_student.student_username, tbl_status.status, tbl_office.office_username, tbl_category.school_year FROM tbl_student, tbl_status, tbl_office, tbl_category WHERE tbl_student.id = tbl_status.student_id AND tbl_office.id = tbl_status.office_id";
$execQuery = mysqli_query($db, $query);
while($row = mysqli_fetch_array($execQuery)){
  array_push($data['status'], $row['status']);
  array_push($data['office_username'], $row['office_username']);
}
echo json_encode($data, JSON_PRETTY_PRINT);
?>
