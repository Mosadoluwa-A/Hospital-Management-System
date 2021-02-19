
<?php 

session_start();

require_once 'dbconnect.php';


if(isset($_POST['btn-add'])){


    $fname = strip_tags($_POST['first_name']);
    $lname = strip_tags($_POST['last_name']);
    $uname = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $gender = strip_tags($_POST['gender']);
    $staff_dob = strip_tags($_POST['staff_dob']);
    $role = strip_tags($_POST['role']);
    $phone_no = strip_tags($_POST['staff_phone']);
    $allergies = strip_tags($_POST['staff_allergies']);

    $fname = $db->real_escape_string($fname);
    $lname = $db->real_escape_string($lname);
    $uname = $db->real_escape_string($uname);
    $password = $db->real_escape_string($password);
    $hpassword = password_hash($password, PASSWORD_DEFAULT);
    $gender = $db->real_escape_string($gender);
    $staff_dob = $db->real_escape_string($staff_dob);
    $role = $db->real_escape_string($role);
    $allergies = $db->real_escape_string($allergies);

    $sql = "SELECT username FROM users WHERE username = '$uname'";
    $checkuname = $db->query($sql);
    $count = $checkuname->num_rows;

    if($count==0){
        $sql = $db->query("INSERT INTO users(firstname,lastname,username,password,gender,DOB,role,phone_no,allergies)
        VALUES('$fname','$lname','$uname','$hpassword','$gender','$staff_dob','$role','$phone_no','$allergies')");

        if($sql){
            $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            User sucessfully registered.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            //echo $error;
        }
        else{
            $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error adding staff!</strong> You should check in on some of those fields below.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
            //echo $error;
        }
    }
    else{
        $error = $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Username already taken!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        //echo $error;
    }
}



?>





<!DOCTYPE html>
<html>
	<head>
		<title>Hospital</title>
		<!-- <link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
		 --><link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/all.min.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/fontawesome.css">
			<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="home-bg">
		<header id="header">
		    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		       <a class="navbar-brand bigger-brand" href="#">Hospital Logo</a>
		          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navelements">
		          	<span class="navbar-toggler-icon"></span>
		          </button>

		       
		        <div class="collapse navbar-collapse" id="navelements">

		          <ul class="navbar-nav nav-ml-custom-admin nav-text">

		              <li class="nav-item">
		                <a class="nav-link active" href="hms-admin.html">Home</a>
		              </li>
		              <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown">Patients</a>
		                <div class="dropdown-menu">
							<a href="all-patients.html" class="dropdown-item">All Patients</a>
		                	<a href="#" class="dropdown-item">In-Patients</a>
		                	<a href="#" class="dropdown-item">Out-Patients</a>
		                </div>
		              </li>
		              <li class="nav-item">
		                <a class="nav-link active" href="all-staff.html">Staff</a>
		              </li>
		               <li class="nav-item">
		                <a class="nav-link active" href="add-staff.html">Add Staff</a>
		              </li>
		               <li class="nav-item">
		                <a class="nav-link active" href="register-patient.html">Register Patient</a>
		              </li>
		              <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle active" href="#" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
		                <div class="dropdown-menu">
		                	<a href="#" class="dropdown-item">Edit Profile</a>
		                	<a href="#" class="dropdown-item">Log Out</a>
		                </div>
		              </li>

		          </ul>
		          <form class="form-inline">
						<input class="form-control ml-2 mr-2" type="search" name="search" placeholder="Search">
						<button class="btn btn-outline-info" type="submit">Search</button>
					</form>
		        </div>
		    </nav>
		</header>
		<section id="login">
			<div class="staff-form">
				<form action="" method="POST">
                <p>
                <?php if (isset($error)){
                    echo $error;
                    }
                 ?>
            </p>
					<h2>Add Staff</h2>
					<div class="container">
							<div class="form-row">
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="First Name" name="first_name" class="form-control" required="required">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="Last Name" name="last_name" class="form-control" required="required">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="Username" name="username" class="form-control" required="required">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="password" placeholder="Password" name="password" class="form-control" required="required">
									</div>
								</div>
								
								<div class="col-12 text-center form-text mt-3">
									<div class="form-check form-check-inline">
										<input type="radio" name="gender" value="Male" id="male" class="form-check-input" required="required">
										<label for="male" class="form-check-label">Male</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" name="gender" value="Female" id="female" class="form-check-input" required="required">
										<label for="female" class="form-check-label">Female</label>
									</div>
								</div>
									<div class="col-12">
										<div class="form-group">
												<label for="pdob"><small style="font-weight: bold;">D.O.B</small></label>
											<input type="date" id="pdob" placeholder="Date of Birth" name="staff_dob" class="form-control" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="role">Staff Position</label>
											<select id="role" class="form-control" name="role">
												<option value="Admin">Admin</option>
												<option value="Doctor">Doctor</option>
												<option value="Nurse">Nurse</option>
												<option value="Receptionist">Receptionist</option>
											</select>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="number" placeholder="Phone Number" name="staff_phone" class="form-control" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea type="text" placeholder="Allergies" name="staff_allergies" class="form-control"></textarea>
										</div>
								</div>

						</div>
						<div class="form-group">
									<p class="text-center"><button type="submit" class="btn btn-success btn-block" name="btn-add">Add</button></p>
								</div>
					</div>
				</form>

			</div>
		</section>

		<footer id="cr">
			<p class="white-text">&copy; Copyright 2020 <strong>Mosadoluwa Agbonyin</strong> </p>
		</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

