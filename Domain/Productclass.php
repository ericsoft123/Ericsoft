<?php
 
 interface validateInterface{
    public function validate();
}
interface ProcesscheckInterface{
    public function process();
}

include("Repository/ProductRepository.php");
Class Product  implements validateInterface,ProcesscheckInterface{
    
   

    public function __construct(){
        
        $config=$GLOBALS["config"];
        $this->check="0";//by default when there is no error

        $this->name = isset($_POST['name']) ? $_POST['name'] : null;
        //$this->name = $_GET['name'];
        $this->dbirth = isset($_POST['dbirth']) ? $_POST['dbirth'] : null;
        $this->uid = isset($_POST['uid']) ? $_POST['uid'] : null;
        $this->dchip = isset($_POST['dchip']) ? $_POST['dchip'] : null;

        $this->chip_implanted = isset($_POST['chip_implanted']) ? $_POST['chip_implanted'] : null;

        $this->chip_price= isset($_POST['chip_price']) ? $_POST['chip_price'] : null;
        $this->purchase_price=isset($_POST['purchase_price']) ? $_POST['purchase_price'] : null;
        $this->price=isset($_POST['price']) ? $_POST['price'] : null;

        $this->description= isset($_POST['description']) ? $_POST['description'] : null;
    
        $this->checkfunction= isset($_POST['checkfunction']) ? $_POST['checkfunction'] : null;//check field function to show me which function,i can be able to run
      

        $GLOBALS["repository"]=new ProductRepository();
        $this->repo= $GLOBALS["repository"];

        

     
    }

    

    public function validate(){
        
        if (empty($this->name) || empty($this->dbirth)  || empty($this->dchip) || empty($this->chip_implanted) || empty($this->chip_price)
         || empty($this->purchase_price) || empty($this->price)) {
            //throw new Exception("Empty Post not allowed");
           $this->check="1";//when there is error
        }

        else
        {
            // Do some stuiff
            $this->check="0";//when there is no error
        }
    }
    public function checkfuntion(){

        if($this->checkfunction=='1')//this will save  data to database*/
     {
        $this->uid=str_replace( ' ', '', $this->name )."".time(); //unique ID of 
        $this->repo->saveproduct(
            $this->name,$this->dbirth,$this->uid,$this->dchip,$this->chip_implanted,$this->chip_price,$this->purchase_price,$this->price,$this->description);//this will save all data on sales table
     }
     else if($this->checkfunction=='2')//update data to database
     {
        $this->repo->updateproduct($this->name,$this->dbirth,$this->uid,$this->dchip,$this->chip_implanted,$this->chip_price,$this->purchase_price,$this->price,$this->description);//this will update data on sales tables
     }
     else if($this->checkfunction=='3')//delete data to database
     {
        $this->repo->deleteproduct($this->uid);//delete data
     }

    }

    public function process(){
       
        $this->validate();
        if($this->check=="0"){//means when there is no error all form field 

            $this->checkfuntion();//client subscribe to insurance
           
        }
     else{
echo"1";
     }
       
    }
    public function edit_product(){
    
    }
    public function delete_product(){
    
    }

public function ShowProduct(){
    $this->repo->findProduct($this->name);  
}
public function ShowProductname(){
    $this->repo->findProductname();  
}


    public function Buy(){

    }



}

Class Addproduct{
    //this will make us to call any class and we can be able to scale this Project without doing a lot of work or touching more code
      public function addedproduct(ProcesscheckInterface $productType){
          $productType->process();
      }
     
   
  
  }

/*interface addanimal{
    public function addanimal();

}
interface */


