<?php include 'connection/database.php'; ?>
<?php
session_start();

$message = 'Please Login Here';
if (isset($_SESSION['user_id'])) {
	header('Location:index.php');
}
if (!isset($_SESSION['trys'])) {
	$_SESSION['trys'] = 1;
}
if (isset($_POST['login'])) {
	if ($_SESSION['trys'] == 3) {
		$_SESSION['trys'] = 1;
		$query = "UPDATE login SET status='disabled' 
		WHERE user_id= :username";

		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id' => $_POST['username']
			)
		);

		$message = "<label>Account Is Deactivated Please Contact Your Admin to be Activated!</label>";
	} else {
		$query = "SELECT * FROM login 
		WHERE user_id= :username";

		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':username' => $_POST['username']
			)
		);
		$count = $statement->rowCount();

		if ($count > 0) {
			$query = "SELECT * FROM login 
			WHERE user_id= :username and status= 'active'";

			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':username' => $_POST['username']
				)
			);
			$count = $statement->rowCount();
			if ($count > 0) {
				$result = $statement->fetchAll();
				foreach ($result as $row) {
					if (password_verify($_POST['password'], $row['password'])) {
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['role'] = $row['role'];

						$squery = "SELECT * FROM personal_information where user_id='" . $_SESSION['user_id'] . "'";

						$statement = $connect->prepare($squery);
						$statement->execute();
						$sresult = $statement->fetchAll();
						foreach ($sresult as $srow) {
							$_SESSION['avatar'] = $srow['avatar'];
							if($row['middlename'] !=' '){
								$_SESSION['fullname'] = $srow['firstname'] . ' ' .$srow['middlename']." ". $srow['lastname'];
							}else{
								$_SESSION['fullname'] = $srow['firstname'] . ' ' . $srow['lastname'];
							}	
						}



						$sub_query = "
							INSERT INTO login_details(user_id)
							values('" . $row['user_id'] . "')
						";
						$statement = $connect->prepare($sub_query);
						$statement->execute();
						$_SESSION['login_details_id'] = $connect->lastInsertId();
						header('Location:index.php');
					} else {
						$message = "<label>Wrong Password</label>";
						$alert = "<script>alert('You have Entered The wrong password " . $_SESSION['trys'] . " times, 3rd Time your account will be disabled');</script>";
						$_SESSION['trys']++;
						echo $alert;
					}
				}
			} else {
				$message = "<label>Account Is Deactivated</label>";
			}
		} else {
			$message = "<label>Wrong Username</label>";
		}
	}
}

?>



<!DOCTYPE html>
<html>

<head>
	<title>Total | E-Learn Login</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleLogin.css">
</head>

<body>
	<div class="main">
		<div class="container">
			<center>
				<div class="middle">
					<div id="login">

						<form method="post">

							<fieldset class="clearfix">

								<p><span class="fa fa-user"></span><input type="text" Placeholder="Username" name="username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
								<p><span class="fa fa-lock"></span><input type="password" Placeholder="Password" name="password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

								<div>
									<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="login" name="login"></span>
								</div>

							</fieldset>
							<div class="clearfix"></div>
						</form>

						<div class="clearfix"></div>

					</div> <!-- end login -->
					<div class="logo">
						<img src="img/bg2.png" alt="" height="150px">
						<div class="clearfix"></div>
					</div>

				</div>
			</center>
		</div>
</body>

</html>

</html>