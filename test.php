<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
		
		<center>
			<h2>SIGN UP</h2>
		<!-- FORM ADD STUDENT -->
		<form action='addstudent.php' method="POST">
			<input type="text" name="idnumber" placeholder="ID Number" autofocus="" required="">
			<input type="text" name="fullname" placeholder="Full Name" required="">
			<input type="text" name="course_year" placeholder="Course&Year" required="">
			<input type="submit" value="Sign Up">
		</form>
		</center>
		
<?php include 'include/footer.php'; ?>