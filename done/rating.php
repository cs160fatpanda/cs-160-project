<?php
//include_once('./model/entry_model.php');
//include_once('index.php');
require_once("./controller/main.php");

//$ind = new index;
$entrymain = new main();

if ($_POST) {
    $courseID = $_POST['idBox'];
    $rate     = $_POST['rate'];
    
}

//echo "ID".$courseID;
$entrymain->insertRate($courseID, $rate);

?>
