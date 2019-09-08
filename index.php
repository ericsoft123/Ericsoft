
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
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
    .container{
       
      padding-top:30px;

      
    }

    input.custom-combobox-input.ui-widget.ui-widget-content.ui-state-default.ui-corner-left.ui-autocomplete-input {
    width: 100% !important;
    display: block !important;
    height: calc(1.5em + .75rem + 2px) !important;
    background-color: #fff !important;

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
<?php define('SITE_ROOT', dirname(__FILE__));  include(SITE_ROOT ."/View/navbar.php"); ?>
<div class="container">

<div id="notify"></div>
<div>

<form id="formsubmit" method="Post" >
<div class="form-group">
<!--this field is very important for inserting=1,updating=2,deleting=3-->
   <input type="hidden" name="checkfunction" placeholder="Enter Insurance" value="1">
   <!--this field is very important for inserting=1,updating=2,deleting=3-->
   
   </div>
   <div class="form-group ui-widget">
            <label>Pet Name(Pet Price): <span style="color:red">Note This is Autocomplete Field</span></label>
            <select  id="combobox" class="form-control" name="name"  onchange="retun change()">
                
  
  </select>
        </div>
  
   
  

   <div class="form-group">
   <label for="">Customer Name</label>
   <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Enter Customer Name" value="">
   
   </div>

   <div class="form-group">
   <label for="">Customer Phone Number</label>
   <input type="number" name="customer_phone" class="form-control" placeholder="Enter Customer Phone Number" value="">
   
   </div>
   <div id="getdata">
   
   </div>


   <div class="form-group insurance">
   <label for="">Insurance Name</label>
   <input type="text" name="insurance_name" id="insurance_name" class="form-control" placeholder="Enter Insurance" value="1" >
   
   </div>

   <div class="form-group insurance">
   <label for="">Insurance Price</label>
   <input type="text" name="insurance_price" id="insurance_price" class="form-control" placeholder="Enter Insurance Price" value="1">
   
   </div>

   <div class="form-group insurance">
   
   <input type="hidden" name="pet_option" class="form-control" placeholder="Enter petoption" value="<?php echo $config["Settings"]["defaultnotify"];?>">
   
   </div>

   <div class="form-group">
   <label for="">Comments</label>
 <textarea name="description" class="form-control" cols="30" rows="10">Desct</textarea>
   </div>

 


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="customeroptions" id="customeroptions" onclick="return options()">
  <label class="form-check-label" for="defaultCheck1">
  Take options dog or cat  (Pay <?php echo $config["Settings"]["options"];?>% upfront)
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="subscribe"  id="subscribe" onclick="return sub_insurance()">
  <label class="form-check-label" for="defaultCheck2">
  Subscribe (<?php echo $config["Settings"]["subscribe_insurance"];?>% Cash Back)
  </label>
</div>






   
   <div class="form-group text-center">
   <input type="submit" class="btn btn-primary" name="submit" id="submit">
   
   </div>
   
   </form>
   <div>

</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
//submit form
$('#formsubmit').submit(function(ev){	
     
     
     //var checkurl = window.location.hostname;
     
     
       $.ajax({
        url:"SalesPostdata.php",
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

function contacted(id){
  var r = confirm("Are you sure you have finished to contact this Client?");
if (r == true) {
  notifyremove_user(id);
} else {
  txt = "You pressed Cancel!";
}
return false;
}

function notifyremove_user(id){

  //start Notification code
  $.ajax({
		
    url:"UsecaseController.php?Usecase=notifyremove_user",
		type:"get",
    data:{
      id:id,
    },
	
		success:function(data){
		
			
		alert("done");

			
			
		}
	});



}
$(function(){
  //UseCaseNotify to check every 1000 milisecond if there is new notification
  
  setInterval(function(){ 
    notify();
     }, 1000);

});
function notify(){
  //start Notification code
  $.ajax({
		//url:"UseCaseNotify.php",
   
		url:"UsecaseController.php?Usecase=Notify",
		type:"get",
	
		success:function(data){
		
			
		$('#notify').html(data);

			
			
		}
	});

  //End Code Notification code
}
function get_productname(){
  //start code TO get autocomplete data from mysql
  $.ajax({
		url:"shopcontroller.php?product=ShowProductname",
		type:"get",
	
		success:function(data){
		
			
		$('#combobox').html(data);

			
			
		}
	});
  //END code TO get  autocomplete data from mysql
}

$('#customer_name').hover(function(){
 //to make sure that when user hover on input that has customer_name id it will execute this action
  var name=$("#combobox option:selected").val();//GET VALUE OF SELECT OPTION
  
  get_product(name);//pass parameters of select object
  
});
 

function get_product(name){
 //Start code  this function will call Showproduct method under shopcontroller.php,and will send name to be able to retrieve some rsult

 
  $.ajax({
		url:"shopcontroller.php?product=ShowProduct",
		type:"post",
    data:{
      name:name
    },
	
		success:function(data){
		
			
$('#getdata').html(data);//after getting data we will display getdata id on html format
	
			
		}
	});

  //End code  this function will call Showproduct method under shopcontroller.php,and will send name to be able to retrieve some rsult
}


$(function(){//on loading call those function
  
  get_productname();//to populate autocomplete
  options();
  sub_insurance();//uncheck and hide by default insurance field
});
function options(){
  if($('#customeroptions').is(":checked"))
  {
   
    var petname=$('#pet_name').val();
    if(petname.toLowerCase()!='dog')
    {
      alert("pet name must be dog or cat only");

      $("#customeroptions").prop('checked', false); 
    }
    
    else{
      $('#customeroptions').val('1');
    }
    
   // alert($('#customeroptions').val());
  }
  else{
   

   

    $('#customeroptions').val('');
    //alert($('#customeroptions').val());

  }
}


function sub_insurance(){

  // Start code uncheck and hide by default insurance field
  if($('#subscribe').is(":checked"))//if is checked show
  {
    $('#subscribe').val('1');
    $('.insurance').show();
    $('#insurance_name').val('');
    $('#insurance_price').val('');
    

   
    //alert("checked");
  }
  else{
    //if is not checked hide some field

    $('#subscribe').val('');
    $('.insurance').hide();
    $('#insurance_name').val('1');
    $('#insurance_price').val('1');
    //alert("unchecked"); 
  }
}

$( function() {//this is jquery autocomplete code


    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .attr( "height", "" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: "false"
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
    
    $( "#combobox" ).combobox();
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
  } );

</script>
    </body>
</html>