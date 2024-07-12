<?php
use PHPUnit\Framework\TestCase;
require_once"porgramming\cheakllogin.php";
class validationTest extends TestCase{
   public function testlogin (){
    $login= new porgramming\cheakllogin;
    $result =  $login->login($email, $password);
    $this->assertEquals();
   }
}
?> 