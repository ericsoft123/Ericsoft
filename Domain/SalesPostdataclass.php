<?php
//$config=include("config.php");//this has Configuration data
//define('SITE_ROOT', dirname(__FILE__));
  include("Repository/SalesRepository.php");

interface subscribeInterface{
    public function subscribe();
}
interface validateInterface{
    public function validate();
}
interface ProcesscheckInterface{
    public function process();
}
interface CustomerOptionInterface{
public function customeroption();
}



Class Product implements subscribeInterface,validateInterface,ProcesscheckInterface,CustomerOptionInterface {
    

   

    public function __Construct(){
        $config=$GLOBALS["config"];
        $this->check="0";//by default when there is no error
        $this->id=isset($_GET['id']) ? $_GET['id'] : null;
        $this->uid = isset($_POST['uid']) ? $_POST['uid'] : null;
        $this->pet_name=isset($_POST['name']) ? $_POST['name'] : null;
        $this->price=isset($_POST['price']) ? $_POST['price'] : null;
        $this->customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : null;
        $this->customer_phone = isset($_POST['customer_phone']) ? $_POST['customer_phone'] : null;
        $this->insurance_name = isset($_POST['insurance_name']) ? $_POST['insurance_name'] : null;
        $this->insurance_price = isset($_POST['insurance_price']) ? $_POST['insurance_price'] : null;
        $this->description = isset($_POST['description']) ? $_POST['description'] : null;
        $this->customeroptions = isset($_POST['customeroptions']) ? $_POST['customeroptions'] : null;
        $this->subscribe = isset($_POST['subscribe']) ? $_POST['subscribe'] : null;
        $this->pet_option = isset($_POST['pet_option']) ? $_POST['pet_option'] : null;
        $this->checkfunction= isset($_POST['checkfunction']) ? $_POST['checkfunction'] : null;//check field function to show me which function,i can be able to run
        $this->priceoption=0;
        $this->options= date($config["Settings"]["options"]);
        $this->subscribe_insurance= date($config["Settings"]["subscribe_insurance"]);
        $this->returnpet_time=$config["Settings"]["returnpet"];
        $this->return_money=0;

        $GLOBALS["repository"]=new \Repository\Repository\SalesRepository();
        $this->repo= $GLOBALS["repository"];
        
    }
    
    public function validate(){
        
        if (empty($this->uid) || empty($this->pet_name) || empty($this->price) || empty($this->customer_name) || 
        empty($this->customer_phone) || empty($this->insurance_name) || empty($this->insurance_price)) {
           // throw new Exception("Empty Post not allowed");
           $this->check="1";//when there is error
        }

        else
        {
            // Do some stuiff
            $this->check="0";//when there is no error
        }
      
       
    }
    public function Customeroption(){//Method to describe when client took some option
     
        if(!empty($this->customeroptions)){//when Customer option is available
           // $this->priceoption=($this->price*$this->options)/100; //by default i set in config.php file to be 20%

           $this->priceoption=($this->price*$this->options)/100; //by default i set in config.php file to be 20%

           $this->unpaid_price=($this->price-$this->options); 
        }
        else{
            $this->priceoption=0;
            $this->unpaid_price=0;
        }
        
        
        
       
    }
    public function checkfuntion(){

        if($this->checkfunction=='1')//this will save sales data to database*/
     {
        $this->repo->savesales($this->uid,$this->pet_name,$this->price,$this->return_money,$this->customer_name
        ,$this->customer_phone,$this->insurance_name,$this->insurance_price,$this->returnpet_time,$this->pet_option,$this->priceoption,$this->unpaid_price,$this->description);//this will save all data on sales table
     }
     else if($this->checkfunction=='2')//update data to database
     {
        $this->repo->updatesales($this->uid,$this->pet_name,$this->price,$this->return_money,$this->customer_name
        ,$this->customer_phone,$this->insurance_name,$this->insurance_price,$this->returnpet_time,$this->pet_option,$this->priceoption,$this->unpaid_price,$this->description);//this will update data on sales tables
     }
     else if($this->checkfunction=='3')//delete data to database
     {
        $this->repo->deletesales($this->uid);//delete sales
     }

    }
    public function subscribe(){
        if(!empty( $this->subscribe))//if subscribe option is available
        {
            $this->return_money=($this->price*$this->subscribe_insurance)/100;
            $this->price=$this->price-(($this->price*$this->subscribe_insurance)/100);//by default i set in config.php file to be 80% 
          
            $this->checkfuntion();
        }
        else{ //if subscribe option is not available insurance name equal none and insurance price equal 0,and returnpet=0;
            $this->insurance_name='none';
            $this->insurance_price=0;
            $this->returnpet_time=0;
            $this->return_money=0;
            $this->checkfuntion();

        }
      
      
    }

    public function weekrevenue(){
        $this->repo->week_revenue();
    }

    public function showroom(){
        $this->repo->showroom();
    }

    public function occupancy(){
        $this->repo->occupancy();
    }

    public function Notify(){
        $this->repo->showday();
    }

    public function notifyremove_user(){
        $this->repo->notifyremove_user($this->id);
    }


    public function process(){

        $this->validate();
        if($this->check=="0"){//means when there is no error all form field 

            $this->Customeroption();//client subscribe to insurance
            $this->subscribe();//client subscribe to insurance
        }
     else{
echo"1";
     }
       
    }

   
}

Class Payproduct extends Product{
  //this will make us to call any class and we can be able to scale this Project without doing a lot of work or touching more code
    public function takepayment(ProcesscheckInterface $productType){
        $productType->process();
    }
    public function testdata(){
       echo  $this->returnpet_time;
    }
 

}


/*$productType=new Product();
//$productType=new Productcar();//we can be able to create new method and add any interface,Then it will be scaled
$owner=new Payproduct();

$owner->takepayment($productType);*/
//$owner->testdata();






