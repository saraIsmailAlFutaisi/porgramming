<!DOCTYPE html>

<html>
<head>
  <!--   الصفحة الرئيسية لموقع تعليم لغات البرمجه -->
  <link rel="stylesheet" href="../program language/css/stylenew.css">
  <link rel="stylesheet" href="css\stylenew.css">
</head>
<head>

<li> <a href="../porgramming/home page .php">Home</a></li>
  <li><a href="">list of language</a></li>
  <li class="dropdown">
    <a href="" class="dropbtn">workshop</a>
    <div class="dropdown-content">
      <a href="../porgramming/workshop.php">create new workshop </a>
      <a href="../porgramming/searchworkshop.php">search workshop</a>
      <a href="">Link 3</a>
    </div>
  </li>
      
      </li>
        <li><a href="">evaluation</a></li>
        <li><a href="../porgramming/logout.php">logout</a></li>
        <li><a href="">about us</a></li>
</ul>
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