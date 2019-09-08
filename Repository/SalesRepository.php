<?php
namespace Repository\Repository;

class SalesRepository
{
    public function __construct(){
        //database connection 
        
        $config=Include("Config/config.php");
        //$config=$GLOBALS["config"];
        $this->con=mysqli_connect($config["Databasedetail"]["host"],$config["Databasedetail"]["Dbusername"]
        ,$config["Databasedetail"]["Dbpassword"],$config["Databasedetail"]["Dbname"]);
        $this->day=$config["Settings"]["day"];
        $this->Currency=$config["Settings"]["Currency"];
      
        $this->status_addproduct=$config["Settings"]["status_addproduct"]; 
        $this->sold_out=$config["Settings"]["sold_out"]; 
        $this->notification=$config["Settings"]["notification"]; 
        $this->defaultnotify=$config["Settings"]["defaultnotify"]; 
        $this->dateTime= date($config["CountryTime"]["dateTime"], time());
        
       


        
        

    }


    public function savesales($uid,$pet_name,$price,$return_money,$customer_name,$customer_phone,$insurance_name,$insurance_price
    ,$returnpet_time,$pet_option,$priceoption,$unpaid_price,$description){
        
        $sql="INSERT INTO sales (uid,pet_name,price,return_money,customer_name,customer_phone,insurance_name,insurance_price
        ,returnpet_time,pet_option,priceoption,unpaid_price,description,created_at)VALUES ('$uid','$pet_name',$price,$return_money,'$customer_name'
        ,'$customer_phone','$insurance_name','$insurance_price','$returnpet_time','$pet_option','$priceoption','$unpaid_price','$description','$this->dateTime')";

        if($this->con->query($sql)==true){
          $this->productsold_out($uid);//to tell our table that Product has been sold
          //return "successfuly"; for testing purpose
          echo 0;

            
        }
        else {
           // echo "Error: " . $sql . "<br>" . $this->con->error;
           return"failed";
        }
        
    }
    public function productsold_out($uid){//to update product to add as Sold out product
      $sql="update product set status='$this->sold_out',updated_at='$this->dateTime' where uid='$uid'";
      

      if($this->con->query($sql)==true){
         
         if(mysqli_affected_rows($this->con)>0){
          return "successfuly";
         }
         else{
          return "This uid is not avalable";
         }
      }
      else {
          echo "Error: " . $sql . "<br>" . $this->con->error;
      }
    }
    

    public function updatesales($uid,$pet_name,$price,$return_money,$customer_name,$customer_phone,$insurance_name,$insurance_price
    ,$returnpet_time,$pet_option,$priceoption,$unpaid_price,$description){
        
        $sql="update sales set pet_name='$pet_name',price=$price,return_money=$return_money,customer_name='$customer_name',customer_phone='$customer_phone',
        insurance_name='$insurance_name',insurance_price=$insurance_price,returnpet_time='$returnpet_time',pet_option='$pet_option',priceoption='$priceoption',unpaid_price='$unpaid_price'
        ,description='$description',updated_at='$this->dateTime' where uid='$uid'";
        

        if($this->con->query($sql)==true){
            echo"successfuly";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
        
    }

    public function deletesales($uid){
        
        $sql="DELETE FROM `sales` WHERE uid='$uid'";
        

        if($this->con->query($sql)==true){
            echo"successfuly";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
        
    }

/*Start All Use Case */

    public function week_revenue(){//this is Weekly Revenue Report
         
        $sql="SELECT * FROM sales WHERE YEARWEEK(`created_at`, 1) = YEARWEEK(CURDATE(), 1)";


       // $sql="SELECT * FROM Products WHERE YEARWEEK(`created_at`, 1) = YEARWEEK(CURDATE(), 1)";
        
        $result = mysqli_query($this->con, $sql);

        
        ?>
        <h3 class="text-center">Weekly Revenue Report </h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">uid</th>
              <th scope="col">Pet Name</th>
              <th scope="col">Price</th>
              <th scope="col">Return Money</th>
             
             
              <th scope="col">upfront Money</th>
              <th scope="col">Remaining after upfront</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Customer phone</th>
              <th scope="col">Created</th>
            </tr>
          </thead>
          <tbody>
            
                    <?php
        $sumprice=0;
        $sumreturn_money=0;
        $sumpriceoption=0;
        $sumunpaid_price=0;
        if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
         $sumprice+=$row["price"];
         $sumreturn_money+=$row["return_money"];
         $sumpriceoption+=$row["priceoption"];
         $sumunpaid_price+=$row["unpaid_price"];
              ?>

<tr>
    
             <td><?php echo  $row["uid"] ?></td>
              <td><?php echo  $row["pet_name"] ?></td>
              <td>  <?php echo  $row["price"] ?>   </td>
              <td>  <?php echo  $row["return_money"] ?>  </td>
              
              <td><?php echo  $row["priceoption"] ?></td>
              <td><?php echo  $row["unpaid_price"] ?></td>
              <td><?php echo  $row["customer_name"] ?></td>
              <td><?php echo  $row["customer_phone"] ?></td>

              <td><?php echo  $row["created_at"] ?></td>
             
              
              </tr>
        
                <?php

           }

           ?>

  
  </tbody>
  <tfoot>
    <tr>
    
      <td></td>
      <td></td>
      <td><?php echo "Sum : $sumprice $this->Currency"; ?> </td>
      <td><?php echo "Sum : $sumreturn_money  $this->Currency"; ?></td>
      
      <td><?php echo "Sum :  $sumpriceoption  $this->Currency"; ?></td>
      <td><?php echo "Sum :  $sumunpaid_price  $this->Currency"; ?></td>
      
    </tr>
  </tfoot>
</table>


           <?php
           $this->Spending_report();
        }



      
    }


    public function Spending_report(){//Investing




 $sql="SELECT * FROM Product WHERE YEARWEEK(`created_at`, 1) = YEARWEEK(CURDATE(), 1)";
 
 $result = mysqli_query($this->con, $sql);

 
 ?>
 <h3 class="text-center">Weekly Spending report </h3>
 <table class="table">
   <thead>
     <tr>
       <th scope="col">uid</th>
       <th scope="col">Name</th>
       <th scope="col">DOB</th>
       <th scope="col">Cost of Chip</th>
       <th scope="col">Purchasing Price</th>
       
       
       <th scope="col">Created</th>
     </tr>
   </thead>
   <tbody>
     
             <?php
 $sumchip_price=0;
 $sumpurchase_price=0;
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $sumchip_price+=$row["chip_price"];
      $sumpurchase_price+=$row["purchase_price"];

       ?>
<tr>


       <td><?php echo  $row["uid"] ?></td>
       <td><?php echo  $row["name"] ?></td>
       <td><?php echo  $row["dbirth"] ?></td>
       <td><?php echo  $row["chip_price"] ?></td>
       <td><?php echo  $row["purchase_price"] ?></td>
       

       <td><?php echo  $row["created_at"] ?></td>
      
       
       </tr>
 
         <?php

    }

    ?>


</tbody>
<tfoot>
    <tr>
    
      <td></td>
      <td></td>
      <td></td>
      
      <td><?php echo "Sum :  $sumchip_price  $this->Currency"; ?></td>
      <td><?php echo "Sum :  $sumpurchase_price  $this->Currency"; ?></td>
      
    </tr>
  </tfoot>
</table>


    <?php
 }



//




    }



    

public function showroom(){
//Start code showroom Products
  $sql="SELECT * FROM Product where status='$this->status_addproduct'";
 
  $result = mysqli_query($this->con, $sql);
 
  
  ?>
  <h3 class="text-center">ShowRoom List </h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">uid</th>
        <th scope="col">Name</th>
        <th scope="col">DOB</th>
        <th scope="col">Cost of Chip</th>
        <th scope="col">Purchasing Price</th>
        
        
        <th scope="col">Created</th>
      </tr>
    </thead>
    <tbody>
      
              <?php
  
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
  
 
        ?>
 <tr>
 
 
        <td><?php echo  $row["uid"] ?></td>
        <td><?php echo  $row["name"] ?></td>
        <td><?php echo  $row["dbirth"] ?></td>
        <td><?php echo  $row["chip_price"] ?></td>
        <td><?php echo  $row["purchase_price"] ?></td>
        
 
        <td><?php echo  $row["created_at"] ?></td>
       
        
        </tr>
  
          <?php
 
     }
 
     ?>
 
 
 </tbody>
 </table>
 
 
     <?php
  }
 
 
 
 //
 
  //End code showroom Products
}

public function showday(){
      
  $day= date("l");
   
  if(strtolower($day)==strtolower($this->day))

  {
    $this->notify();
  }
}

public function notify(){
  //
  //petoption=1 //new notification of users 
  //petoption=2 //Means that user cancel notification
  $sql="select *from sales where pet_option='$this->defaultnotify' and returnpet_time!=0";
  


  // $sql="SELECT * FROM Products WHERE YEARWEEK(`created_at`, 1) = YEARWEEK(CURDATE(), 1)";
   
   $result = mysqli_query($this->con, $sql);

   
 
   
   if (mysqli_num_rows($result) > 0) {
    ?>
    <h3 class="text-center">Notification data</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">uid</th>
          <th scope="col">Pet Name</th>
          
          <th scope="col">Customer Name</th>
          <th scope="col">Customer phone</th>
          <th scope="col">Created</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        
                <?php
      while($row = mysqli_fetch_assoc($result)) {
   

         ?>

<tr>

<td><?php echo  $row["uid"] ?></td>
         <td><?php echo  $row["pet_name"] ?></td>
         
         <td><?php echo  $row["customer_name"] ?></td>
         <td><?php echo  $row["customer_phone"] ?></td>

         <td><?php echo  $row["created_at"] ?></td>

         <td><button class="btn btn-danger" onclick="return contacted(<?php echo $row['id'] ?>)">Contacted?</button></td>
        
        
         
         </tr>
   
           <?php

      }

      ?>


</tbody>
</table>


      <?php
      
   }
   else{
    
   }


  //
}

public function notifyremove_user($id){
  $sql="update sales set pet_option='$this->notification',updated_at='$this->dateTime' where id='$id'";
      

  if($this->con->query($sql)==true){
      return "successfuly";
  }
  else {
      return "Error: " . $sql . "<br>" . $this->con->error;
  }
}



public function occupancy(){
  
//Start Occupancy

  $sql="SELECT name,COUNT(name) as number FROM product where status='$this->status_addproduct' GROUP BY name";//$this->status_addproduct=available by default but you can change it on config
 
  $result = mysqli_query($this->con, $sql);
 
  
  ?>
  <h3 class="text-center">Show Occupancy </h3>
  <table class="table">
    <thead>
      <tr>
        
        <th scope="col">Name</th>
        <th scope="col">Number</th>
      
      </tr>
    </thead>
    <tbody>
      
              <?php
   $sumnumber=0;//Total of available Pet
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
  
      $sumnumber+=$row["number"] ;
        ?>
 <tr>
 
 
       
        <td><?php echo  $row["name"] ?></td>
        <td><?php echo  $row["number"] ?></td>
       
        
        </tr>
  
          <?php
 
     }
 
     ?>
 
 
 </tbody>
 <tfoot>
    <tr>
    
      
      
      <td></td>
      <td><?php echo "Sum :  $sumnumber"; ?></td>
      
    </tr>
  </tfoot>
 </table>
 
 
     <?php
  }
 
 
 
 //
 
  //End Occupancy
}
/*End All Use Case */

}



