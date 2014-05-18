<?php
$con = mysqli_connect("localhost", "sjsucsor_s2g314s", "fatpanda14", "sjsucsor_160s2g32014s");
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (empty($_SESSION)) // if the session not yet started
    session_start();
if (!isset($_POST['submit'])) { // if the form not yet submitted
    header("Location: login.php");
    exit;
}

$result = mysqli_query($con, "SELECT * FROM members WHERE username = '" . $_POST[username] . "' AND password = '" . $_POST[password] . "'");
//check if the username entered is in the database.



//conditions


while ($row = mysqli_fetch_array($result)) {
    if ($row["username"] == $_POST[username] && $row["password"] == $_POST[password]) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        //header("Location: index.php");
        echo '<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" ><head>
<title>Fat Panda - Home</title>
<meta name="Authors" content="Parth Vyas, Vinh Doan, Megan Chan, Erik Macias, Chilie Jiangcun, Jonatan Lopez" />
<meta name="description" content="Moocs160" />
<meta name="keywords" content="Software Project" />
<meta charset="utf-8" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
<meta http-equiv="refresh" content="5;URL=http://sjsu-cs.org/cs160/2014spring/sec2group3/index.php">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<header>
		   <div class="container1">
		      <!--start title-->
		      <h1 class="fontface"  id="title"><a href="index.php" class="white">panda</a></h1>
		      <!--end title-->
		      <!--start menu-->
		      <nav>
		       <ul>
			
		      </ul>
		      </nav>
		   </div>
		   <div class="bottom"> </div>
		   <!--end menu-->
		   <!--end header-->
		</header>

		 <div id="containerCenter">
		   <!--start intro-->
		   <section id="intro">
			<center>
			<font size="5">Welcome to Panda!</font>
			<br>Login successful!
			<br>You will be redirected in 5 seconds.
			</center> 

		 </section>
         
		   <!--start footer-->
		   <footer>

		   <div id="bottomBar"><span class="white">
		     <p> Copyright 2014 | Panda </p></span> 
		   </div>
		   
		   </footer>
		   <!--end footer-->
           </body>
           </html>';
        exit;
    }
    
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}




?>
