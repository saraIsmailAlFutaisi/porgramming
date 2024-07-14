<?php
use PHPUnit\Framework\TestCase;
require_once 'C:\xampp\htdocs\php\porgramming\cheakllogin.php';

class validationTest extends TestCase
{
    public function testValidLogin()
    {
       
        $result =user::login('admin@gmail.com', 'Admin_2023');
        $this->assertTrue($result);
    }

    public function testInvalidLogin()
    {
      
        $result =user::login('wrongemil@example.com', 'wrongpassword');
        $this->assertFalse($result);
    }
}
