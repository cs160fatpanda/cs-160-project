<?php

class mainView
{
    
    public function __construct($idbox)
    {
        session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>Fat Panda - Home</title>
<meta name="Authors" content="Parth Vyas, Vinh Doan, Megan Chan, Erik Macias, Chilie Jiangcun, Jonatan Lopez" />
<meta name="description" content="Moocs160" />
<meta name="keywords" content="Software Project" />
<meta charset="utf-8" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<style type="text/css">
body {
	background-image: url(img/Panda-Sleeping.jpg);
	background-size: 110%;
	background-repeat: no-repeat;
	background-color: black;
}
</style>

<header>
  <div class="container1"> 
    <!--start title-->
    <h1 class="fontface"  id="title"><a href="index.php" class="white">panda</a></h1>
    <!--end title--> 
    <!--start menu-->
    <nav>
      <ul>
        <?php
        if (!isset($_SESSION['username'])) {
?>
        <li><a href="login.php" class="white">Login</a></li>
        <li><a href="register.php" class="white">Register</a></li>
        <li><a href="index.php?query=&controller=search_results&view=course_list_view&st=0&ed=10&submit=Search" class="white">Courses</a></li>
        <?php
        } else {
?>      
        <li><a href="logout.php" class="white">Logout</a></li>
        <li><a href="index.php?query=&controller=search_results&view=course_list_view&st=0&ed=10&submit=Search" class="white">Courses</a></li>
        <?php
        }
?>
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
    <form class="form-wrapper cf" method="GET" action="index.php" accept-charset="utf-8">
      <input name="query" type="text" placeholder="Search here...">
      <input type="hidden" name="controller" value="search_results">
      <input type="hidden" name="view" value="course_list_view">
      <input type="hidden" name="st" value="0">
      <input type="hidden" name="ed" value="10">
      <button type="submit" value="Search" name="submit">Search</button>
    </form>
  </center>
</section>

<!--start footer-->
<footer>
  <div id="bottomBar"><span class="white">
    <p> Copyright 2014 | Panda </p>
    </span> </div>
</footer>
<!--end footer-->
</body>
</html>
<?php
    }
}
?>
