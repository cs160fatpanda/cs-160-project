<?php
include 'connect_to_database.php'; //connect the connection page
if (empty($_SESSION)) // if the session not yet started
    session_start();


if (isset($_SESSION['username'])) { // if already login
    header("location: home.php"); // send to home page
    exit;
}
?>
<!doctype html><head>
<meta charset="UTF-8">
<title>Fat Panda - Home</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>



<style type="text/css">
body {
	background-image: url(img/Baby_Panda.jpg);
	background-size: 110%;
	background-repeat: no-repeat;
	background-color: black;
}
</style>


<body>

<!--start header-->
<header>
  <div class="container1"> 
    <!--start title-->
    <h1 class="fontface" id="title"><a href="index.php" class="white">panda</a></h1>
    <!--end title--> 
    <!--start menu-->
    <nav>
      <ul>
        
        <li><a href="login.php" class="white">Login</a></li>
        <li><a href="register.php" class="white">Register</a></li>
        <li><a href="index.php?query=&controller=search_results&view=course_list_view&st=0&ed=10&submit=Search" class="white">Courses</a></li>
        
      </ul>
    </nav>
  </div>
  <div class="bottom"> </div>
  <!--end menu--> 
  <!--end header--> 
</header>
<div id="containerCenter"> 
  <!--start intro-->
  <section id="introLogin">
  <div class="login-form-header">Welcome to Panda</div>
  <form class="login-form-wrapper" action = "login_process.php" method = "post">
    <input type="text" name="username" placeholder="Username"/>
    <br/>
    <br/>
    <br/>
    <br/>
    <input type="password" name="password" placeholder="Password"/>
    <br/>
    <br/>
    <br/>
    <br/>
    <input type="hidden" name="spacer" placeholder="password"/>
    <button type = "submit" name="submit" value="login" />
    Login
  </form>
</div>

<!--start footer-->
<footer>
  <div id="bottomBar"><span class="white">
    <p> Copyright 2014 | Panda </p>
    </span> </div>
</footer>
<!--end footer-->

</body>
</html><?php
?>