<?php 
 include("Repository/SalesRepository.php");
class ExampleTest extends \Codeception\Test\Unit
{
   
    /**
     * @var \UnitTester
     */
    
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

        $user = new \Repository\Repository\User();//setup tesing purpose
        $user->setName('Miles');
        
        $this->assertEquals($user->getName(),'Miles');
    }
    public function test_savesales_when_clientbuy_andstatus_successfully(){//test when buy any Product and Status Successfully
        
        //$SalesRepository=new \App\Models\SalesRepository;
        $SalesRepository=new \Repository\Repository\SalesRepository;
        
       /* savesales($uid,$pet_name,$price,$return_money,$customer_name,$customer_phone,$insurance_name,$insurance_price
    ,$returnpet_time,$pet_option,$priceoption,$unpaid_price,$description)*/
        $this->assertEquals($SalesRepository->savesales('gh1567947099','dog',600,600,'Eric','0782389359','Discovery',800
        ,'2019-09-07 23:54:49','1',200,600,'testing'),'successfuly');//make sure you will add available uid
        
        
        
            }
            

            

    
    public function testproductsold_outupdatedsuccessfully(){//test with correct uid from Product
        
        //$SalesRepository=new \App\Models\SalesRepository;
        $SalesRepository=new \Repository\Repository\SalesRepository;
        
        
        $this->assertEquals($SalesRepository->productsold_out('Viki1567835638'),'successfuly');//make sure you will add available uid
        
        
        
            }
        
            public function testproductsold_outupdatedfailed(){//with incorrect uid from Product table
                
                $SalesRepository=new \Repository\Repository\SalesRepository;
                
                
                $this->assertEquals($SalesRepository->productsold_out('V676'),'This uid is not avalable');
                
                
                
                    }

    
}