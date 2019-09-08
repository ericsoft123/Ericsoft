<?php
 $Webroot=dirname(__FILE__);
$config=include($Webroot."/Config/config.php");//this has Configuration data
include($Webroot."/Domain/Productclass.php");

$product=$_GET['product'];
//$product="hello";
$weekrev=new Product();
//$weekrev->ShowProductname();
$weekrev->$product();

//echo $product;