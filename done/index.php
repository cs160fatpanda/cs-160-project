<?php


require_once('./config/config.php');

session_start();

/**
Deciding which controller to be run
If no controller then just call main controller
*/
if (isset($_GET['controller'])) {
    $_GET['controller']();
} elseif (isset($_POST['controller'])) {
    $_POST['controller']();
} else {
    main();
}

function main()
{
    
    
    $start = (int) $_GET['st'];
    $end   = (int) $_GET['ed'];
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
    } else {
        $view = "mainView";
    }
    /**
    creates a main class object, which is then used to call the display function.
    */
    require_once("./controller/main.php");
    $entryControl = new main();
    $entryControl->display($view, $search_var, $start, $end);
    
}

function search_results()
{
    $start      = (int) $_GET['st'];
    $end        = (int) $_GET['ed'];
    $search_var = $_GET['query'];
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
    } else {
        $view = "mainView";
    }
    /**
    creates a main class object, which is then used to call the display function.
    */
    require_once("./controller/main.php");
    $entryControl = new main();
    $entryControl->displayMain($view, $search_var, $start, $end);
    
}

function orderby()
{
    $start = (int) $_GET['st'];
    $end   = (int) $_GET['ed'];
    
    require_once("./controller/main.php");
    $entryControl = new main();
    $entryControl->displayByOrder($_GET['orderby'], $_GET['query'], $start, $end);
    
}

function reg()
{
    
    require_once("./controller/main.php");
    $entryControl = new main();
    $entryControl->insertUser($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
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
			<br>Registration successful!
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
    
    
}

?>

<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

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
	<script type="text/javascript">
	$(function() {
		$(".ratingOutput").jRating({
	isDisabled : true
	});
	})	
	</script>
	<script type="text/javascript">
	$(function() {
		$(".ratingInput").jRating({
	step:true,
	rateMax : 5,
	decimalLength:0,
	phpPath: './rating.php'
	});
	})	
	</script>
	</head>
	<body>
</body>
</html>
