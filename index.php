<?php session_start();?>
<?php include 'include/header.php'; ?>
<?php include 'db.php'; ?>
		<div class="container">
				<div class="col-md-4">

				</div>
				<div class="login_bg">

					<div class="col-md-4">
						<center>
						<!-- FORM ADD STUDENT -->
							<form class="login_form" action='validation.php' method="POST">
								<img src="images/ustp_logo.jpg" class="img-thumbnail" width="100px" alt="">
								<h1>USTP e-Clearance System</h1>
								<hr>
								<h3>Log In</h3>
								<input class="input_login" type="text" name="username" placeholder="Username" autofocus="" required="">
								<input class="input_login" type="password" name="password" placeholder="Password" required="">
								<label> Account type</label>
								<select name="login_type" required="">
									<option value="" disabled selected>Please Select</option>
									<option value="student">student</option>
									<option value="admin">admin</option>
								</select>
								<br>
								<input type="submit" class="btn-warning" id="login_btn" value="Log In">
							</form>
						</center>
					</div>
				</div>
				<div class="col-md-4">

				</div>

			</div>
		</div>
<?php include 'include/footer.php'; ?>
