<
   
<?php
 include'C:\xampp\htdocs\php\porgramming\interface.php';
 /****************سارة إسماعيل الفطيسي
      *تقوم بتسجيل خروج للمستخدم
      */

session_unset();
session_destroy();
header('REFRESH:4;URL=home page .php');
echo'you have been signed out of the account' ;      
?>
</body>
</html>