<?php
use PHPUnit\Framework\TestCase;
include 'C:\xampp\htdocs\php\porgramming\cheakllogin.php';
include 'C:\xampp\htdocs\php\porgramming\create new workshop.php';
class validationTest extends TestCase
{
    public function testValidLogin()
    {
        $result = user::login('admin@gmail.com', 'Admin_2023');
        $this->assertTrue($result);
    }

    public function testInvalidLogin()
    {
        $result = user::login('wrongemil@example.com', 'wrongpassword');
        $this->assertFalse($result);
    }

    public function testWorkshopAvailability()
    {
        $date = '2024-07-12';
        $startTime = '11:54';
        $endTime = '16:54';
        $result = WorkshopAnnouncement ::Checktheworkshoptimeanddata($startTime, $endTime, $date);
        $this->assertTrue($result);
    }

    public function testFailedWorkshopCreation()
    {
        $date = '2024-07-12';
        $startTime = '11:54';
        $endTime = '16:54';

        $result = WorkshopAnnouncement ::Checktheworkshoptimeanddata($startTime, $endTime, $date);
        $this->assertTrue($result);
    }

}
?>