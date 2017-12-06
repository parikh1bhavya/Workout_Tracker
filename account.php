<head>
  <meta charset="utf-8">
  <title>Workout Tracker</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="./style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>

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

   <form action="./login.php"><input type="submit" value="Login!"/></form>

<form action="./insert_user.php" method="post">
  <div class="container">

    <p><label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usrname" required></p>

    <p><label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required></p>

    <p><label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="lname" required></p>

    <div class="clearfix">
      <button type="button"  class="cancelbtn">Cancel</button>
      <button type="submit" id="signupbtn">Sign Up</button>
    </div>
  </div>
</div>
</form>
</main>
