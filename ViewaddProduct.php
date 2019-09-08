<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .container{
        width:600px;
        padding-top:30px;
    }
    .hidenclass{
  display:none;
}
    </style>
    
    
    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php define('SITE_ROOT', dirname(__FILE__)); include(SITE_ROOT."/View/navbar.php"); ?>
   <div class="container">
   <div class="resize">

   <div class="text-center">

<form id="formsubmit"  method="Post">
<h3>Add Product</h3>
<div class="form-group">
<input type="hidden" name="checkfunction" placeholder="Enter Insurance" value="1">

</div>




<div class="form-group">
<label for=""> Add Product Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter Pet Name" >

</div>
<div class="form-group">
<label for=""> Add Date Of Birth</label>
<input type="date" name="dbirth" class="form-control" placeholder="Enter Price" >

</div>

<div class="form-group hidenclass">
<label for=""> uid</label>
<input type="text" name="uid" class="form-control" placeholder="Enter Insurance" >

</div>

<div class="form-group form-check">
  <input class="form-check-input" type="checkbox" name="chip_implanted" id="chip_implanted" onclick="return chip()">
  <label class="form-check-label" for="defaultCheck1">
  Chip implanted?  
  </label>
</div>

<div class="form-group chip">
<label for=""> Chip Implanted date</label>
<input type="date"  name="dchip" id="dchip" class="form-control" placeholder="Enter Implanted date" val="1">

</div>


<div class="form-group chip">
<label for=""> Chip Price</label>
<input type="number" name="chip_price" id="chip_price" class="form-control" placeholder="Enter Chip Price" val="1" >

</div>

<div class="form-group">
<label for=""> Add Purchase Price</label>
<input type="number" name="purchase_price" class="form-control" placeholder="Enter Cost" value=>

</div>

<div class="form-group">
<label for=""> Add Fixed Price</label>
<input type="number" name="price" class="form-control" placeholder="Enter Price">

</div>

<div class="form-group">
<label for=""> Add Description</label>
<textarea name="description"  cols="30" rows="10" class="form-control"> Desct</textarea>
</div>





<div class="form-group">
<input type="submit" class="btn btn-primary" name="submit">

</div>

</form>

</div>



   </div>


  
   
   
   </div>
   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 
 
  <script>

$('#formsubmit').submit(function(ev){	
     
     
     //var checkurl = window.location.hostname;
     
     
       $.ajax({
        url:"ProductPostdata.php",
        type:"post",
        data:$('#formsubmit').serialize(),
        dataType:"json",
        success:function(data)
        {
      if(data==1){
        alert("Error,please complete your form");
      }
      else if(data==0){
        alert("Form has been executed successfully");
        location.reload();
        
      }
            
        }
        
      });
					 	
					 	    
				
      
      
      ///
ev.preventDefault();
});	

//end Submit form Code

  
  $(function(){
    chip();
  });
  function chip(){
  if($('#chip_implanted').is(":checked"))
  {
    $('#chip_implanted').val('1');
    $('.chip').show();

//to set as empty  to allow user to complete himself
    $('#dchip').val("");
    $('#chip_price').val("");
    

    
 
    //alert("checked");
  }
  else{
    

    $('#chip_implanted').val('0');
    $('.chip').hide();

//to set some value on hide to allow form to submit
    $('#dchip').val("1");
    $('#chip_price').val("1");
    //to set some value on hide to allow form to submit

    //alert("unchecked"); 



  }
}
  </script> 
   
    </body>
</html>