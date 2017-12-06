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

<main class="home-page">
<div class="title-container">

   <br>

   <!-- CALENDAR -->
   <div class="month">
		<ul>
			<li class="prev">&#10094;</li>
			<li class="next">&#10095;</li>
			<li>
			DECEMBER<br>
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

<center>
		 <?php
	 include 'connectvarsEECS.php';

	 	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	 	if (!$conn){
	 		die('Could not connect: ' . mysql_error());
	 	}

	 	$query = "SELECT * FROM Exercises";
	 	$result = mysqli_query($conn, $query);

	 	$fields_num = mysqli_num_fields($result);
	 echo "<h3>Upcoming Exercises</h3>";
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
		echo "</table><tr>";

	 ?>
</center>

<br>

<center>
		 <?php
	 include 'connectvarsEECS.php';

	 	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	 	if (!$conn){
	 		die('Could not connect: ' . mysql_error());
	 	}

	 	$query = "SELECT * FROM Routine";
	 	$result = mysqli_query($conn, $query);

	 	$fields_num = mysqli_num_fields($result);
	 	echo "<h3> Upcoming Routines</h3>";
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
</center>

</div>
</main>
