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
<center><nav class="navbar">
   <ul class="navlist">
     <li class="navitem"><a href="./">Home</a></li>
     <li class="navitem"><a href="./mypage.php">My Page</a></li>
     <li class="navitem"><a href="./account.php">Account</a></li>
     <li class="navitem"><a href="./about.php">About</a></li>
  </ul>
</center>

<?php

include 'connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	if($_SESSION){
		$author = $_SESSION['user'];
	}else{
		$author = "anon";
	}
	$routine = mysqli_real_escape_string($conn, $_POST['routine']);
	$exercise = mysqli_real_escape_string($conn, $_POST['exercise']);
	$calories = mysqli_real_escape_string($conn, $_POST['calories']);

	$max_query = "SELECT MAX(routine_id) FROM Routine";
	$number = mysqli_query($conn, $max_query);
	$id = $number + 1;

	$query = "INSERT INTO Routine (routine_id, routine, type, calories, author) VALUES ('$id', '$routine', '$exercise', '$calories', '$author')";
	if(mysqli_query($conn, $query)){
		echo "Recorded successfully";
	}else{
		echo "Error: " . mysqli_error($conn);
	}

	$exr1 = mysqli_real_excape_string($conn, $_POST['exr1']);
	$exr2 = mysqli_real_excape_string($conn, $_POST['exr2']);
	$exr3 = mysqli_real_excape_string($conn, $_POST['exr3']);


	if($exr1 != ""){
		$q1 = "SELECT exercise_id FROM Exercise WHERE exercise_id = '$exr1'";
		if(mysqli_query($conn, $q1)){
			$q11 = "INSERT INTO Routine_Includes (routine_id, exercise_id) VALUES ('$id', '$exr1)";
			mysqli_query($conn, $q11);
		}
	}
	if($exr2 != ""){
		$q2 = "SELECT exercise_id FROM Exercise WHERE exercise_id = '$exr2'";
		if(mysqli_query($conn, $q2)){
			$q22 = "INSERT INTO Routine_Includes (routine_id, exercise_id) VALUES ('$id', '$exr2)";
			mysqli_query($conn, $q22);
		}
	}
	if($exr3 != ""){
		$q3 = "SELECT exercise_id FROM Exercise WHERE exercise_id = '$exr3'";
		if(mysqli_query($conn, $q3)){
			$q33 = "INSERT INTO Routine_Includes (routine_id, exercise_id) VALUES ('$id', '$exr3)";
			mysqli_query($conn, $q33);
		}
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
<center>
<form action="./insert_routine.php" method="post">
<p><label><b>Routine Name</b></label>
<input type="text" placeholder="Enter name of routine - ex. Leg Day" name="routine" required></p>

<p><label><b>Type</b></label>
<input type="text" placeholder="Enter type of routine - ex. Squats" name="exercise" required></p>

<p><label><b>Calories</b></label>
<input type="text" placeholder="Enter calories - ex. 250" name="calories" required></p>



<p><label><b>Exercise Id 1</b></label>
<input type="text" placeholder="Enter Id - ex. 200" name="exr1"></p>
<p><label><b>Exercise Id 2</b></label>
<input type="text" placeholder="Enter Id - ex. 250" name="exr2"></p>
<p><label><b>Exercise Id 3</b></label>
<input type="text" placeholder="Enter Id - ex. 300" name="exr3"></p>

<div class="clearfix">
   <button type="button"  class="cancelbtn">Reset</button>
   <button type="submit" class="signupbtn">Submit</button>
</form>

<?php
include 'connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	$query = "SELECT * FROM Exercises";
	$result = mysqli_query($conn, $query);

	$fields_num = mysqli_num_fields($result);
	echo "<h3>Table: Exercises </h3>";
	echo "<table border ='1'><tr>";


	for($i=0; $i<$fields_num; $i++){
		$field = mysqli_fetch_field($result);
		echo "<td><b>$field->name</b></td>";
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</td>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
?>

</div>
</div>
</center>
