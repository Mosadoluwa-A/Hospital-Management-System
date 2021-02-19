
<?php  

session_start();
$user = $_SESSION['user']; 
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];


require_once 'dbconnect.php';

$table ='users';

$sql = "SELECT * FROM {$table} WHERE id = '$user_id' ";
$query = $db->query($sql);
$row = $query->fetch_array();
$count = $query->num_rows;

if(isset($_POST['btn-edit'])){

    $fname = strip_tags($_POST['first_name']);
    $lname = strip_tags($_POST['last_name']);
    $uname = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    if($_POST['password2'] !== ""){
        $newpass = strip_tags($_POST['password2']);
    }
    $gender = strip_tags($_POST['gender']);
    if ($_POST['staff_dob'] !== ""){
        $staff_dob = strip_tags($_POST['staff_dob']);
    }
    $role = strip_tags($_POST['role']);
    $phone_no = strip_tags($_POST['staff_phone']);
    $allergies = strip_tags($_POST['staff_allergies']);

    $fname = $db->real_escape_string($fname);
    $lname = $db->real_escape_string($lname);
    $uname = $db->real_escape_string($uname);
    if(isset($newpass)){
        $newpass = $db->real_escape_string($newpass);
    }
    $hpassword = password_hash($newpass, PASSWORD_DEFAULT);
    $gender = $db->real_escape_string($gender);
    if(isset($staff_dob)){
        $staff_dob = $db->real_escape_string($staff_dob);
    }
    $role = $db->real_escape_string($role);
    $phone_no = $db->real_escape_string($phone_no);
    $allergies = $db->real_escape_string($allergies);


    if(password_verify($password, $row['password']) && $count=1){
        if(isset($newpass)){
            $sql = $db->query("UPDATE {$table} SET firstname = '$fname', lastname = '$lname', 
            username = '$uname', password = '$hpassword', gender = '$gender', 
            role='$role', phone_no = '$phone_no', allergies = '$allergies' WHERE id = '$user_id' ");
            if($sql){
                $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Profile sucessfully updated.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
            else{
                $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error updating profile!</strong> You should check in on some of those fields below.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
        } elseif(isset($staff_dob)){
            $sql = $db->query("UPDATE {$table} SET firstname = '$fname', lastname = '$lname', 
            username = '$uname', DOB = '$staff_dob', gender = '$gender', 
            role='$role', phone_no = '$phone_no', allergies = '$allergies' WHERE id = '$user_id' ");
            if($sql){
                $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Profile sucessfully updated.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
            else{
                $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error updating profile!</strong> You should check in on some of those fields below.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
        } else{
            $sql = $db->query("UPDATE {$table} SET firstname = '$fname', lastname = '$lname', 
            username = '$uname', gender = '$gender', 
            role='$role', phone_no = '$phone_no', allergies = '$allergies' WHERE id = '$user_id' ");
            if($sql){
                $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Profile sucessfully updated.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
            else{
                $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error updating profile!</strong> You should check in on some of those fields below.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
                //echo $error;
            }
        }
    } else{
        $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error updating profile!</strong> Wrong password entered please try again.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
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
		                	<a href="edit-staff.php" class="dropdown-item">Edit Profile</a>
		                	<a href="logout.php" class="dropdown-item">Log Out</a>
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
				<form method="POST" action="">
					<h2>Edit Staff Details</h2>
					<div class="container">
                        <?php  
                            if(isset($error)){
                                echo $error;
                            }
                        ?>
							<div class="form-row">
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="First Name" name="first_name" value="<?php echo $row['firstname'];  ?>" class="form-control" required="required">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="Last Name" name="last_name" value="<?php echo $row['lastname'];  ?>" class="form-control" required="required">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" placeholder="Username" name="username" value="<?php echo $row['username'];  ?>" class="form-control" required="required">
									</div>
                                </div>
                                <div class="col-12">
										<div class="form-group">
												<label for="pword2"><small style="font-weight: bold;">Leave blank if you are not changing</small></label>
											<input type="password" id="pword2" placeholder="Password" name="password2"  class="form-control">
                                        </div>
                                </div>
								<div class="col-12">
									<div class="form-group">
                                        <label for="pword2"><small style="font-weight: bold;">Enter your normal password</small></label>
										<input type="password" placeholder="Password" name="password" class="form-control" required="required">
									</div>
								</div>
								
								<div class="col-12 text-center form-text mt-3">
									<div class="form-check form-check-inline">
										<input type="radio" name="gender" value="Male" id="male" class="form-check-input" required="required"<?php if($row['gender'] == "Male"){ echo "checked";}  ?>>
										<label for="male" class="form-check-label">Male</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" name="gender" value="Female" id="female" class="form-check-input" required="required" <?php if($row['gender'] == "Female"){ echo "checked";}  ?>>
										<label for="female" class="form-check-label">Female</label>
									</div>
								</div>
									<div class="col-12">
										<div class="form-group">
												<label for="pdob"><small style="font-weight: bold;">D.O.B</small></label>
											<input type="date" id="pdob" placeholder="Date of Birth" name="staff_dob"  class="form-control">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="role">Staff Position</label>
											<select id="role" class="form-control" name="role">
												<option value="admin" <?php if($row['role'] == "Admin"){ echo "selected";}  ?>>Admin</option>
												<option value="doctor" <?php if($row['role'] == "Doctor"){ echo "selected";}  ?>>Doctor</option>
												<option value="Nurse"  <?php if($row['role'] == "Nurse"){ echo "selected";}  ?>>Nurse</option>
												<option value="recep"  <?php if($row['role'] == "Receptionist"){ echo "selected";}  ?> >Receptionist</option>
											</select>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="number" placeholder="Phone Number" name="staff_phone" value="<?php echo $row['phone_no'];  ?>" class="form-control" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea type="text" placeholder="Allergies" name="staff_allergies" class="form-control"><?php echo $row['allergies'];  ?></textarea>
										</div>
								</div>

						</div>
						<div class="form-group">
									<p class="text-center"><button type="submit" class="btn btn-success btn-block" name="btn-edit">Edit</button></p>
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

