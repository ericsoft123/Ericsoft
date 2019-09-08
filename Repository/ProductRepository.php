<?php


Class ProductRepository{
    public function __construct(){
        //database connection 
        //$config=Include("Config/config.php");
        $config=$GLOBALS["config"];
        $this->con=mysqli_connect($config["Databasedetail"]["host"],$config["Databasedetail"]["Dbusername"]
        ,$config["Databasedetail"]["Dbpassword"],$config["Databasedetail"]["Dbname"]);
        $this->day=$config["Settings"]["day"];
        $this->Currency=$config["Settings"]["Currency"];
        $this->dateTime= date($config["CountryTime"]["dateTime"], time());
        $this->status_addproduct=$config["Settings"]["status_addproduct"]; 


        
        

    }
   

    public function saveproduct($name,$dbirth,$uid,$dchip,$chip_implanted,$chip_price,$purchase_price,$price,$description)
    {

        if(!$this->con)

        {
        
            // this condition means that database is not available
        
        echo"db not available";
        
        
        }
        else{
        
            
            

 
            $uid=str_replace( ' ', '', $name )."".time(); //unique ID of 
            $sql="INSERT INTO product (name,dbirth,uid,dchip,chip_implanted,chip_price,purchase_price,price,description,created_at,status)
            VALUES ('$name','$dbirth','$uid','$dchip','$chip_implanted','$chip_price','$purchase_price','$price','$description','$this->dateTime','$this->status_addproduct')";

            if($this->con->query($sql)==true){
                echo 0;
            }
            else {
                echo "Error: " . $sql . "<br>" . $this->con->error;
            }
            
           // $this->con->close();
        
        }
         





       // $getdata;
    }

    public function updateProduct($name,$dbirth,$uid,$dchip,$chip_implanted,$chip_price,$purchase_price,$price,$description)
    {

        if(!$this->con)

        {
        
            // this condition means that database is not available
        
        echo"db not available";
        
        
        }
        else{
        
            
            

 
         
$sql="update product set name='$name',dbirth='$dbirth',dchip='$dchip',
chip_implanted='$chip_implanted',chip_price=$chip_price,purchase_price=$purchase_price,price=$price,updated_at='$this->dateTime' where uid='$uid'";
            if($this->con->query($sql)==true){
                echo"successfuly";
            }
            else {
                echo "Error: " . $sql . "<br>" . $this->con->error;
            }
            
           // $this->con->close();
        
        }
         





       // $getdata;
    }

    public function deleteProduct($uid){
        
        $sql="DELETE FROM `product` WHERE uid='$uid'";
        

        if($this->con->query($sql)==true){
            echo"successfuly";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
        
    }

  
    public function findProduct($name){
        //start Code
$sql="Select *from product where name='$name' and status='$this->status_addproduct' limit 1";
$result = mysqli_query($this->con, $sql);

         if (mysqli_num_rows($result) > 0) {
             
            while($row = mysqli_fetch_assoc($result)) {
              ?>
<div class="form-group hidenclass" >
   <label for="">Uid</label>
   <input type="text" name="uid" class="form-control" placeholder="Enter UID" value="<?php echo $row["uid"]; ?>">
   
   </div>


   
   <div class="form-group">
   <label for="">Pet Price</label>
   <input type="text" name="price" class="form-control" placeholder="Enter Price" value="<?php echo $row["price"]; ?>">
   </div>
              <?php
            }
         } else {
            echo "0 results";
         }

           //End Code
    }

    public function findProductname(){
        //start Code
$sql="Select *from product where status='$this->status_addproduct'";
$result = mysqli_query($this->con, $sql);

         if (mysqli_num_rows($result) > 0) {
             echo '<option></option>';
            while($row = mysqli_fetch_assoc($result)) {
              ?>
<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?> (<?php echo $row["price"]; echo $this->Currency;?>)</option>

              <?php
            }
         } else {
            echo "0 results";
         }

           //End Code
    }

    public function findone(){
        $sql="Select *from product limit 1";
        $result = mysqli_query($this->con, $sql);
        
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       echo "Name: " . $row["name"]. "<br>";
                    }
                 } else {
                    echo "0 results";
                 }
    }

    public function find($limit){

        $sql="Select *from product limit $limit";
        $result = mysqli_query($this->con, $sql);
        
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       echo "Name: " . $row["name"]. "<br>";
                    }
                 } else {
                    echo "0 results";
                 }

    }



   public function displayproduct(){

   }

    
}