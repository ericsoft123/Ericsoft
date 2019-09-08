<?php

namespace Repository\Repository;

Class User{
    
   
    function __construct(){
        

        $this->test='Miles';
} 
    public function setName($name){
       $this->name=$name;
    }
    public function getName()
        {
             return $this->test;
        }
}



