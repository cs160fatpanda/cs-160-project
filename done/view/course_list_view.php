<?php
mysql_set_charset('utf8');
header('Content-Type: text/html; charset=UTF-8');

class course_list_view
{
    public function __construct($search_value, $query, $numCourses)
    {
        
?>
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
	<title>Fat Panda - Home</title>
	<meta name="Authors" content="Parth Vyas, Vinh Doan, Megan Chan, Erik Macias, Chilie Jiangcun, Jonatan Lopez" />
	<meta name="description" content="Moocs160" />
	<meta name="keywords" content="Software Project" />
	<meta charset="utf-8">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	<meta charset="utf-8">
	<link rel="stylesheet" href="jquery/jRating.jquery.css" />
	<link rel="stylesheet" href="styles.css" />
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery/jRating.jquery.js"></script>
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
<header>
      <div class="container1"> 
    <!--start title-->
    <h1 class="fontface" id="title"><a href="index.php" class="white">panda</a></h1>
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
<div id="container">
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
      <br>
      <!--start printing a table header containing all relevant fields' name-->
      <form method="GET" id="my_form" action="index.php">
  </form>
      <form method="GET" id="my2_form" action="index.php">
  </form>
      <form method="GET" id="my3_form" action="index.php">
  </form>
      <form method="GET" id="my4_form" action="index.php">
  </form>
      <table class="footable footable-sortable table" id="coursetable mytable" data-page-size="6" width="100%">
    <thead>
        <th data-sort-ignore="true" width="5%">Rating</th>
          <th data-sort-ignore="true" width="15%">Image</th>
          <th data-sort-ignore="true" width="10%"><input type="hidden" name="controller" value="orderby" form="my4_form">
            <input type="hidden" name="orderby" value="course_name" form="my4_form">
            <input type="hidden" name="query" value="<?php
        echo $query;
?>" form="my4_form">
            <input type="hidden" name="st" value="0" form="my4_form">
            <input type="hidden" name="ed" value="10" form="my4_form">
            <button  type="submit" form="my4_form" style="font-family: a; border: 0; background: transparent"><span class="thbutton">Course Name</span></button>
          </th>
          <th data-sort-ignore="true" width="25%">Short Description</th>
          <th data-sort-ignore="true" width="10%"><input type="hidden" name="controller" value="orderby" form="my3_form">
            <input type="hidden" name="orderby" value="category" form="my3_form">
            <input type="hidden" name="query" value="<?php
        echo $query;
?>" form="my3_form">
            <input type="hidden" name="st" value="0" form="my3_form">
            <input type="hidden" name="ed" value="10" form="my3_form">
            <button  type="submit" form="my3_form" style="border: 0; background: transparent"><span class="thbutton">Category</span></button>
          </th>
          <th data-sort-ignore="true" width="7%"> <input type="hidden" name="controller" value="orderby" form="my2_form">
            <input type="hidden" name="orderby" value="start" form="my2_form">
            <input type="hidden" name="query" value="<?php
        echo $query;
?>" form="my2_form">
            <input type="hidden" name="st" value="0" form="my2_form">
            <input type="hidden" name="ed" value="10" form="my2_form">
            <button  type="submit" form="my2_form" style="border: 0; background: transparent"><span class="thbutton">Start Date</span></button>
          </th>
          <th data-sort-ignore="true" width="8%"> <input type="hidden" name="controller" value="orderby" form="my_form">
            <input type="hidden" name="orderby" value="course_length" form="my_form">
            <input type="hidden" name="query" value="<?php
        echo $query;
?>" form="my_form">
            <input type="hidden" name="st" value="0" form="my_form">
            <input type="hidden" name="ed" value="10" form="my_form">
            <button  type="submit" form="my_form" style="border: 0; background: transparent"><span class="thbutton">Course Length</span></button>
          </th>
          <th data-sort-ignore="true" width="2%">Site</th>
          <th data-sort-ignore="true" width="5%">Professor Name</th>
          <th data-sort-ignore="true" width="5%">Professor Image</th>
          <!--more here-->
          
            </thead>
          <?php
        
        
        // how many rows
        
        $rows_per_page = 10;
        
        // get total number of rows
        $numrows = $numCourses;
        
        // Calculate number of $lastpage
        $lastpage = ceil($numrows / $rows_per_page);
        
        // condition inputs/set default
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        
        // validate/limit requested $pageno
        $pageno = (int) $pageno;
        if ($pageno > $lastpage) {
            $pageno = $lastpage;
        }
        if ($pageno < 1) {
            $pageno = 1;
        }
        
        // Find start and end array index that corresponds to the requested pageno
        $start = ($pageno - 1) * $rows_per_page;
        $end   = $start + $rows_per_page - 1;
        
        // limit $end to highest array index
        if ($end > $numrows - 1) {
            $end = $numrows - 1;
        }
        
        $starOutput = "";
        $starInput  = "";
        $vals1      = 18;
        $vals2      = 1;
        
        
        $rateHere = "Rate Here: ";
        $newline  = "\r\n";
        
        $rates = 1;
        foreach ($search_value as $value) {
            // Display the results
            //foreach ($page as $key=>$value) {
            $rates      = $value['rating'] * 4;
            //get the scraped data from database
            $vals1      = $rates;
            $starOutput = "<div class=ratingOutput data-average=" . $vals1 . "></div>";
            if (isset($_SESSION['username'])) {
                $starInput = "$rateHere.<div class=ratingInput data-id=" . $value["id"] . "></div>";
            }
            //print all the data to the table by rows
            echo "<tr class='hv' height='100' id='course" . $value["id"] . "'>";
            echo "<td style='display:none;'>" . $value["id"] . "</td>";
            echo "<td>" . "Average Rating:" . $starOutput . "<br>" . $value['rating'] . "<br>" . $starInput . "</td>";
            echo "<td><a href=" . $value["course_link"] . "><img src='" . $value["course_image"] . "' width=200></a></td>";
            echo "<td><a href=" . $value['course_link'] . ">" . $value["title"] . "</a></td>";
            
            
            echo "<td>" . $value["short_desc"] . "</td>";
            
            
            echo "<td>" . $value["category"] . "</td>";
            echo "<td>"; // start date
            if ($value["date"] == "0000-00-00") {
                echo "Self Paced";
            } elseif ($value["date"] == "3000-00-00") {
                echo "Coming Soon";
            } else
                echo $value["date"];
            echo "</td>";
            echo "<td>"; // Course Length
            if ($value["course_length"] <= 0)
                echo "Self Paced";
            else
                echo $value["course_length"];
            echo "</td>";
            
            echo "<td>" . $value["site"] . "</td>"; // Site of origin
            
            echo "<td>" . $value["profname"] . "</td>";
            
            echo "<td><a href=" . $value["profimage"] . "><img width=75 height=75 src='" . $value["profimage"] . "'></a></td>";
            echo "</tr>";
        }
        
        
        echo "<center>Pages: ";
        // next/last pagination hyperlinks
        //if ($pageno == $lastpage) {
        //   echo " NEXT LAST ";
        //} else {
        $nextpage = 0;
        while ($nextpage != $lastpage) {
            $nextpage = $nextpage + 1;
            echo " <a href='?query=$query&controller=search_results&st=$start&ed=$rows_per_page&submit=Search'>   $nextpage  </a> ";
            $start = $start + $rows_per_page;
        }
        echo "</center>";
        
        //}
        
?>
      </table>
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
