<head>
	<meta charset="utf-8">
	<title>Workout Tracker</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="./style.css">

	<!-- Style sheet for the calendar -->
	<!--  <link rel="stylesheet" href="/calendar.css"> -->

</head>

<header>
<center><h1 class="site-title">Workout Tracker</h1></center>
</header>

<?php
	include 'connectvarsEECS.php';
	
	session_destroy();

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' .mysql_error());
	}

	$username = mysqli_real_escape_string($conn, $_POST['usrname']);
	$password = mysqli_real_escape_string($conn, $_POST['fname']);

	$query = "SELECT salt FROM Users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if ($row = mysqli_fetch_assoc($result)){
		$salt = $row['salt'];
		$hash = hash(MD5, $password.$salt);
		$saltSql = "SELECT * FROM Users WHERE username = '$username' AND hashed_pass = '$hash'";
		$final = mysqli_query($conn, $saltSql);
		if($finalrow = mysqli_fetch_assoc($final)){
			echo "Valid user login";
			session_start();
			$_SESSION['user'] = $username;
			$_SESSION['pass'] = $hash;
		}else{
			echo "Invalid login: Invalid password";
		}
	}else{
		echo "Invalid login: User doesn't exist";
	}
	mysqli_close($conn);
?>	

<center><nav class="navbar">
	<ul class="navlist">
		<li class="navitem"><a href="./">Home</a></li>
		<li class="navitem"><a href="./mypage.php">My Page</a></li>
		<li class="navitem"><a href="./account.php">Account</a></li>
	</ul>
</center>

<main class="home-page">
<div class="title-container">

   <div>
	This page displays your workout calendar and account information.
   <br>
   </div>
   <br>

<!-- EXAMPLES USED FOR CLASS
	<h4>Exercise 1 - Reps: 20, Muscle Group: Biceps, Intensity: 5</h4><br>
	<h4>Exercise 2 - Reps: 30, Muscle Group: Abs, Intensity: 10</h4><br>
-->

   <!-- CALENDAR -->
   <div class="month">
		<ul>
			<li class="prev">&#10094;</li>
			<li class="next">&#10095;</li>
			<li>
			August<br>
			<span style="font-size:18px">2017</span>
			</li>
		</ul>
	</div>

	<ul class="weekdays">
		<li>Monday</li>
		<li>Tuesday</li>
		<li>Wednesday</li>
		<li>Thursday</li>
		<li>Friday</li>
		<li>Saturday</li>
		<li>Sunday</li>
	</ul>

	<ul class="days">

      <form action="./calendar.php"><input type="submit" value="1"/></form>
      <form action="./calendar.php"><input type="submit" value="2"/></form>
      <form action="./calendar.php"><input type="submit" value="3"/></form>
      <form action="./calendar.php"><input type="submit" value="4"/></form>
      <form action="./calendar.php"><input type="submit" value="5"/></form>
      <form action="./calendar.php"><input type="submit" value="6"/></form>
      <form action="./calendar.php"><input type="submit" value="7"/></form>
      <br>
      <form action="./calendar.php"><input type="submit" value="8"/></form>
      <form action="./calendar.php"><input type="submit" value="9"/></form>
      <form action="./calendar.php"><input type="submit" value="10"/></form>
      <form action="./calendar.php"><input type="submit" value="11"/></form>
      <form action="./calendar.php"><input type="submit" value="12"/></form>
      <form action="./calendar.php"><input type="submit" value="13"/></form>
      <form action="./calendar.php"><input type="submit" value="14"/></form>
      <br>
      <form action="./calendar.php"><input type="submit" value="15"/></form>
      <form action="./calendar.php"><input type="submit" value="16"/></form>
      <form action="./calendar.php"><input type="submit" value="17"/></form>
      <form action="./calendar.php"><input type="submit" value="18"/></form>
      <form action="./calendar.php"><input type="submit" value="19"/></form>
      <form action="./calendar.php"><input type="submit" value="20"/></form>
      <form action="./calendar.php"><input type="submit" value="21"/></form>
      <br>
      <form action="./calendar.php"><input type="submit" value="22"/></form>
      <form action="./calendar.php"><input type="submit" value="23"/></form>
      <form action="./calendar.php"><input type="submit" value="24"/></form>
      <form action="./calendar.php"><input type="submit" value="25"/></form>
      <form action="./calendar.php"><input type="submit" value="26"/></form>
      <form action="./calendar.php"><input type="submit" value="27"/></form>
      <form action="./calendar.php"><input type="submit" value="28"/></form>
      <br>
      <form action="./calendar.php"><input type="submit" value="29"/></form>
      <form action="./calendar.php"><input type="submit" value="30"/></form>
	</ul>

   <h3>Upcoming routines, exercises, and events</h3>

   <a href="http://www.fg-a.com" target="_blank"><img class="embeddedObject"
      src="http://content.screencast.com/users/fg-a/folders/christmas/media/5f436007-c128-4da4-bc2a-127b7df5a1a4/santa_g2.gif"
      width="150" height="150" border="0" alt="Clipart" /></a>

   <ul class="weeks-grid">
   	Date: Exercise - 12/15/17
      <li>Name: Bench Press</li>
      <li>Reps: 15</li>
      <li>Muscle: Pectoralis Major</li>
   	<li>Intensity: 5</li>
   </ul>
   <ul class="weeks-grid">
   	Date: Routine - 12/25/17
      <li>Name: Leg Day</li>
      <li>Type: Squats, Leg Press, Calf Raises</li>
      <li>Calories: 200</li>
   </ul>

   <a href="http://www.fg-a.com" target="_blank"><img class="embeddedObject"
      src="http://content.screencast.com/users/fg-a/folders/christmas/media/5f436007-c128-4da4-bc2a-127b7df5a1a4/santa_g2.gif"
      width="150" height="150" border="0" alt="Clipart" /></a>

		<h3>Past routines, exercises, and events</h3>
		<ul class="weeks-grid">
			Date: Routine - 10/15/17
			<li>Name: Leg Day</li>
			<li>Type: Squats, Leg Press, Calf Raises</li>
			<li>Calories: 200</li>
		</ul>
</div>
</main>
<!--
<h4>Top Gym Member Results</h4>
try to beat them! <br>
<p>
<ul class="weeks-grid">
	Bella
	<li>Bench Press 230</li>
	<li>Deadlift 322</li>
	<li>Running 11</li>
</ul>
<ul class="weeks-grid">
	Liam
	<li>Bench Press 228</li>
	<li>Deadlift 319</li>
	<li>Running 8</li>
</ul>
<ul class="weeks-grid">
	Noah
	<li>Bench Press 220</li>
	<li>Deadlift 315</li>
	<li>Running 7</li>
</ul>
<ul class="weeks-grid">
	Lucy
	<li>Bench Press 205</li>
	<li>Deadlift 298</li>
	<li>Running 5</li>
</ul>
</p>
</p>
	   </div>

	   </main>
	   -->
