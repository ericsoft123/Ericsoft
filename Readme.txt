Pet Store it is Hexagonal Architecture
it does not depend to any Framework it is 100% OOP 


Setup

1.change .config(under Config folder) file add your database Configuration on line number 10


2.Then create your database ,then  open db folder and open dbwithdata folder or dbwithnodata folder and import on your mysql database

on db there is:dbwithdata:db that has some data you can start testing use case
              dbwithnodata:db with no data (capture data and test case later)


3.Then run your Program

4.for Automated Testing open tests and change file called acceptance.suite.yml,by default i setup http://localhost/japan
you may change it according to where you want to run this app
5.Check on tests(tests/acceptance/HelloWorldCept.php) folder i have done acceptance. Testing for unit testing check(tests/unit/ExampleTest.php)

6.Test weekly Report. After capturing 1 or more than 1 sales Record open mysql table on created_at and remove less than 7 days too created days
ex:created day(as today) =2019-09-06 00:00:00.000000 change to 2019-09-03 00:00:00.000000



Description of project file:

-for Testing Notification purpose, Change Config.php under settings  and set day as today's day .
ex:if today is Monday then remove Friday and Replace with Monday Then after 1 Second it will check 
if there is any Notification and show That notification ,if you will  keep Friday,Then  it will Show you notification Friday only
       
-Config.php file it gives you some dynamic option where you can be able to change 
some code ,then it will apply to all.

-namepostdata.php:it connect with nameSalesPostdataclass as adapter.

ex:SalesPostdata.php connect with SalesPostdataclass.php


-namePostdataclass.php:it has all business logic,Postdata,validation,interface Then it is like as ports because it communicate 
with nameRepository and communicate to application too

       ex:SalesPostdataclass.php:it has all logic,validation,interface,postdata needed and  it act as port by connecting to SalesPostdata.php and SalesRepository.php as adapter
	   
	   
-nameRepository.php :it contain all operation regarding database and notification

ex:SalesRepository.php(under Repository)






