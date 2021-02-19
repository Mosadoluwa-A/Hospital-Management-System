
<?php 

session_start();


require_once 'dbconnect.php';

$table ='users';


if(isset($_POST['btn-login'])){
    
    //First we remove harmful html tags
    $username = strip_tags($_POST['username']); 
    $password = strip_tags($_POST['password']);

    // Then we escape harmful characters
    $username = $db->real_escape_string($username); 
    $password = $db->real_escape_string($password);


    $sql = "SELECT * FROM {$table} WHERE username = '$username'";
    $query = $db->query($sql);
    $row = $query->fetch_array();
    $count = $query->num_rows;



    if(password_verify($password, $row['password']) && $count == 1){
        $_SESSION['user'] = $row['firstname'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        
        echo "<script>
                window.alert('Login successful');
             </script>";
        header("Location: home.php");
        
        }
        else{
            $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Login Invalid!</strong> Please check your username and password.
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
	<body class="login-bg">
		<header id="header">
		    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		       <a class="navbar-brand bigger-brand" href="#">Hospital Logo</a>
		          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navelements">
		          	<span class="navbar-toggler-icon"></span>
		          </button>

		       
		        <div class="collapse navbar-collapse" id="navelements">

		          <ul class="navbar-nav ml-auto">

		              <li class="nav-item">
		                <a class="nav-link active" href="#">Log In</a>
		              </li>

		          </ul>
		        </div>
		    </nav>
		</header>
		<section id="login">
			<div class="login-form">
				<form method="POST" action="">
                    <h2>Log In</h2>
                    <?php 

                        if(isset($error)){
                            echo $error;
                        }

                    ?>
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" required="required">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control" name="password" required="required">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" name="btn-login">Login</button>
					</div>
					<div class="form-check form-check-inline">
						<input type="checkbox" class="form-check-input" name="remember-me" value="remember-me">
						<label class="form-check-label">Remember me</label>&nbsp;&nbsp;&nbsp;
						<a href="#" class="pull-right">Forgot password?</a>
					</div>
				</form>
				<p class="text-center"><button class="btn btn-success">Sign Up</button></p>
			</div>
		</section>

		<footer id="cr">
			<p>&copy; Copyright 2020 <strong>Mosadoluwa Agbonyin</strong> </p>
		</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

