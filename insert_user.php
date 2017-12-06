<head>
  <meta charset="utf-8">
  <title>Workout Tracker</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="./style.css">
</head>

<header>
  <center><h1 class="site-title">Workout Tracker</h1></center>
</header>

<?php
	include 'connectvarsEECS.php';

	session_destroy();

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}

	$username = mysqli_real_escape_string($conn, $_POST['usrname']);
	$password = mysqli_real_escape_string($conn, $_POST['psw']);
	$email = mysqli_real_escape_string($conn, $_POST['lname']);


	$salt = base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
	$password = $password.$salt;
	$password = hash(md5, $password);

	$query = "INSERT INTO Users (username, hashed_pass, salt, email) VALUES ('$username', '$password', '$salt', '$email')";
	if(mysqli_query($conn, $query)){
		echo "recorded successfully";
		session_start();
		$_SESSION['user'] = $username;
		$_SESSION['pass'] = $password;
	}else{
		echo "ERROR: couldn't preform $query. ". mysqli_error($conn);
	}

	mysqli_close($conn);
?>


<center><nav class="navbar">
   <ul class="navlist">
     <li class="navitem"><a href="./">Home</a></li>
     <li class="navitem"><a href="./mypage.php">My Page</a></li>
     <li class="navitem"><a href="./account.php">Account</a></li>
     <li class="navitem"><a href="./about.php">About</a></li>

  </ul>
</center>

<main class="home-page">
  <div class="title-container">

<form action="./checkLogIn.php">
  <div class="container">

    <p><label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usrname" required></p>

    <p><label><b>Password</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required></p>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Log in</button>
    </div>

  </div>
</form>
<form action="./accinfo.php"><input type="submit" value="Account Info"/></form>
</div>


</main>
