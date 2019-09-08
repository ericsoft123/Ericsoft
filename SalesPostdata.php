<?php


define('SITE_ROOT', dirname(__FILE__));
$config=include(SITE_ROOT."/Config/config.php");//this has Configuration data
include(SITE_ROOT."/Domain/SalesPostdataclass.php");

Class SalesPostdata{

    public function __Construct(){
        
        
    }

    public function postdata(){
        
$productType=new Product();
//$productType=new Productcar();//we can be able to create new method and add any interface,Then it will be scaled
$owner=new Payproduct();

$owner->takepayment($productType);
    }

}

$data=new SalesPostdata();
$data->postdata();


