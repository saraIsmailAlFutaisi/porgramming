<!DOCTYPE html>

<html>

<head>

</head>

   
<?php
 /****************سارة إسماعيل الفطيسي
      *تقوم بتسجيل خروج للمستخدم
      */
session_start();
session_unset();
session_destroy();
header('REFRESH:4;URL=home page .php');
echo'you have been signed out of the account' ;      
?>
</body>
</html>