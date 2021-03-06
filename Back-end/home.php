
<?php 


session_start();

$user = $_SESSION['user']; 
$role = $_SESSION['role'];


?>





<!DOCTYPE html>
<html>
	<head>
		<title>Hospital Admin</title>
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
		<main id="main" class="container">
			<header>
				<h1 class="display-4 white-text">Welcome <?php echo $user  ?></h1>
			</header>
			<div class="row">
				<div class="col-md-4">
					<div class="card bg-success mb-4 text-center">
						<div class="card-body">
							<h5 class="card-title">No of In-Patients</h5>
							<p class="card-text bigger-card-text">25</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-success text-center">
						<div class="card-body">
							<h5 class="card-title">No of Out-Patients</h5>
							<p class="card-text bigger-card-text">25</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-success text-center">
						<div class="card-body">
							<h5 class="card-title">No of Doctors on Duty</h5>
							<p class="card-text bigger-card-text">25</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card bg-info mb-4 text-center">
						<div class="card-body">
							<h5 class="card-title">Total No of Patients</h5>
							<p class="card-text bigger-card-text">25</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card bg-secondary text-center">
						<div class="card-body">
							<h5 class="card-title">Total No of Staff on Duty</h5>
							<p class="card-text bigger-card-text">25</p>
						</div>
					</div>
				</div>
			</div>
			<header class="d-flex justify-content-center p-3">
				<h1 class="white-text">Outpatient List</h1>&nbsp;&nbsp;&nbsp;
				<a href="add-outpatient-admin.html"><button class="btn btn-lg btn-success mt-2">Add Patient</button></a>
			</header>
			
			<div class="table-responsive table-hover rounded">
				<table class="table bg-light">
					<thead>
						<tr>
							<th scope="col">S/N</th>
							<th scope="col">Patient ID</th>
							<th scope="col">Patient Name</th>
							<th scope="col">Patient Gender</th>
							<th scope="col">Patient Age</th>
							<th scope="col">Complaint</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>0001</td>
							<td>John Doe</td>
							<td>Male</td>
							<td>25</td>
							<td>Slight Headache</td>
							<td align="center">
								<span title="Mark as  attended to"><i class="fas fa-check action-check"></i></span>
								&nbsp;&nbsp;&nbsp;
								<span title="delete"><i class="fas fa-trash action-trash"></i><span>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>0002</td>
							<td>Jane Doe</td>
							<td>Female</td>
							<td>24</td>
							<td>Headache and cramps</td>
							<td align="center">
								<span title="Mark as  attended to"><i class="fas fa-check action-check"></i></span>
								&nbsp;&nbsp;&nbsp;
								<span title="delete"><i class="fas fa-trash action-trash"></i><span>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>0003</td>
							<td>Silas Stone</td>
							<td>Male</td>
							<td>55</td>
							<td>Back Pain</td>
							<td align="center">
								<span title="Mark as  attended to"><i class="fas fa-check action-check"></i></span>
								&nbsp;&nbsp;&nbsp;
								<span title="delete"><i class="fas fa-trash action-trash"></i><span>
							</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>0004</td>
							<td>Mohammadu Buhari</td>
							<td>Male</td>
							<td>75</td>
							<td>Hearing loss</td>
							<td align="center">
								<span title="Mark as  attended to"><i class="fas fa-check action-check"></i></span>
								&nbsp;&nbsp;&nbsp;
								<span title="delete"><i class="fas fa-trash action-trash"></i><span>
							</td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>0005</td>
							<td>Stella Obasanjo</td>
							<td>Female</td>
							<td>43</td>
							<td>Stomach Pain</td>
							<td align="center">
								<span title="Mark as  attended to"><i class="fas fa-check action-check"></i></span>
								&nbsp;&nbsp;&nbsp;
								<span title="delete"><i class="fas fa-trash action-trash"></i><span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</main>

		<footer id="cr">
			<p class="mt-5 white-text">&copy; Copyright 2020 <strong>Mosadoluwa Agbonyin</strong> </p>
		</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

