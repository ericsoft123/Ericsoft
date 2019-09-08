<?php 
$I = new AcceptanceTester($scenario);
//$I->wantTo('perform actions and see result');

/*$I->amOnPage('/');
$I->see('Welcome');*/

$I->amOnPage('/ViewaddProduct.php');
$I->see('Add');




$I->amOnPage('/ViewUseCase.php?Usecase=weekrevenue');
$I->see('Revenue Report Weekly');
$I->see('Spending report Weekly');


$I->amOnPage('/ViewUseCase.php?Usecase=showroom');
$I->see('showroom');


$I->amOnPage('/ViewUseCase.php?Usecase=occupancy');
$I->see('Show Occupancy');




