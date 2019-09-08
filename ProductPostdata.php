<?php
define('SITE_ROOT', dirname(__FILE__));
$config=include(SITE_ROOT."/Config/config.php");//this has Configuration data
include(SITE_ROOT."/Domain/Productclass.php");






$productType=new Product();

$owner=new Addproduct();

$owner->addedproduct($productType);


