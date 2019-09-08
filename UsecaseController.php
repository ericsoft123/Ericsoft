<?php


 $Webroot=dirname(__FILE__);
$config=include($Webroot."/Config/config.php");//this has Configuration data
include($Webroot."/Domain/SalesPostdataclass.php");
$Usecase=$_GET['Usecase'];//only in case user request data through Browser
$productdata=new Product();
$productdata->$Usecase();