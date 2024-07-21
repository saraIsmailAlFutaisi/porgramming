<?php
use PHPUnit\Framework\TestCase;
include 'C:\xampp\htdocs\php\porgramming\cheakllogin.php';
include 'C:\xampp\htdocs\php\porgramming\create new workshop.php';

class validationTest extends TestCase
{    
      
    // اختبار فحص توفر ورشة العمل
     // تعيين بيانات اعتماد تسجيل الدخول الصالحة
     public function testValidLogin()
     {     $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
          $emil='sara@gmail.com';
          $password='11111111111111';
          $user = new User('','',$emil, '',$password,'');
         $result = $user->login( $emil, $password);
         $this->assertTrue($result);
     }
 
     // اختبار وظيفة تسجيل الدخول غير الصالح
     public function testInvalidLogin()
     {   
        $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
        $emil='teba@example.com';
        $password='2121212222';

         $user =new User('','',  $emil, '', $password,'');
         $result = $user->login( $emil, $password);
         $this->assertFalse($result);
     }
 
     // اختبار فحص توفر ورشة العمل
     public function testWorkshopAvailability()
     {
        $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
        $date = '2024-09-9';
        $startTime = '12:00';
        $endTime = '16:00';
        $workshop = new WorkshopAnnouncement('','', $startTime, $endTime,$date,'','','');
      
         $result = $workshop->Checktheworkshoptimeanddata($startTime, $endTime, $date);
         $this->assertTrue($result);
     }
 
     // اختبار إنشاء ورشة عمل فاشلة
     public function testFailedWorkshopCreation()
     {
        $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
        $date = '2024-07-12';
        $startTime = '11:54';
        $endTime = '16:54';
        $workshop = new WorkshopAnnouncement('','', $startTime, $endTime,$date,'','','');
      
         $result = $workshop->Checktheworkshoptimeanddata($startTime, $endTime, $date);
         $this->assertFalse($result);
     }
 
    

 
     // اختبار تسجيل إيميل موجود في قاعدة البيانات
     public function testSignupWithExistingEmail()
     {
        $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
         $email = 'sara@gmail.com';
         $password = 'mypassword';
         $confirmPassword = 'mypassword';
         $firstname = 'bushra';
         $lastname = 'alllll';
         $phone = '09111111';
         $user =  new User($firstname, $lastname, $email, $phone, $password, $confirmPassword);
         $result = $user->register($firstname, $lastname, $email, $phone, $password, $confirmPassword);
         $this->assertFalse($result);
        
     }
 
     // اختبار كلمة المرور وتأكيد كلمة المرور غير متطابقتين
     public function testRegisterPasswordMismatch()
     {
        $hn = 'localhost';
        $db = 'learninglanguages';
        $un = 'root';
        $pw = '';
         $firstname = 'John';
         $lastname = 'Doe';
         $email = 'john.doe@example.com';
         $phone = '1234567890';
         $password = 'Password123';
         $confirmPassword = 'WrongPassword';
         $user = new User($firstname, $lastname, $email, $phone, $password, $confirmPassword);
         $result = $user->register($firstname, $lastname, $email, $phone, $password, $confirmPassword);
         $this->assertFalse($result);
     }
      // اختبار تسجيل إيميل جديد (غير موجود في قاعدة البيانات)
      public function testSignupWithNewEmail()
      {
         $hn = 'localhost';
         $db = 'learninglanguages';
         $un = 'root';
         $pw = '';
          $email ='israa@gmail.com';
          $password = '7777777777';
          $confirmPassword ='7777777777';
          $firstname = 'israa';
          $lastname = 'aaaaa';
          $phone = '09785555555';
          $usere =  new User($firstname, $lastname, $email, $phone, $password, $confirmPassword);
          $result = $usere->register($firstname, $lastname, $email, $phone, $password, $confirmPassword);
          $this->assertTrue($result);
         
      }
   
}
?>


