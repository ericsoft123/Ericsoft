<?php
 date_default_timezone_set('Asia/Tokyo');
 //date_default_timezone_set('Africa/Johannesburg');
  //Customize any time Zone Timezone link https://www.w3schools.com/php/php_ref_timezones.asp
return [
    
    //Start Database Settings
    'Databasedetail' => [
        'host' => 'localhost',
        'Dbname' => 'task',
        'Dbusername' => 'root',
        'Dbpassword' => ''
    ],
    //End Database Settings
  
     'CountryTime' => [
     
        'dateTime' => 'Y-m-d H:i:s',
        'dateonly' => 'Y-m-d',
        'Timeonly' => 'H:i:s',
        'Hours' => 'H',
        'minutes' => 'i',
        'Second' => 's',
       
    ],
   
    /*Testing */
   


    'Settings'=>[
        'day'=>'Friday',//Notification day ,for testing purpose add today's day
        'returnpet'=>'3 Month',//this option support(minutes,hours,day,week,month,years),you can customize
        'subscribe_insurance'=>'80',//subscribe to insurance
        'options'=>'20',//options to pay up front 20%
        'Currency'=>'Yen',//options to change Currency
        'notification'=>'2',//this will make us track notification
        'defaultnotify'=>'1',//this will make us track notification
        
        /*status change when adding and buying product */
        'status_addproduct'=>'available',//options to change status after client buy product
        'sold_out'=>'soldout',//options to change status after client buy product

         /*status change when adding and buying product */
        

    ],
   
];









