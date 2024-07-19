<!DOCTYPE html>
<html>
<head>
  <!--   الصفحة الرئيسية لموقع تعليم لغات البرمجه -->
  <link rel="stylesheet" href="../program language/css/stylenew.css">
  <link rel="stylesheet" href="css\stylenew.css">
</head>
<body>

  <header>
    <ul>
      <li>
        <!-- بداية معالجة جلسة المستخدم -->
        <?php
          session_start();
          // إذا لم يكن هناك بريد إلكتروني في الجلسة
          if(empty($_SESSION['email']))
          {
            // عرض رابط تسجيل الدخول
        ?>
        <a href="../porgramming/login.php">login</a>
        <?php
          }
          // إذا كان هناك بريد إلكتروني في الجلسة
          else if(!empty($_SESSION['email']))
          {
            // عرض صورة المستخدم وبريده الإلكتروني
        ?>
        <strong><img alt="enterh.png" src="../porgramming\image\user (2).png"></strong>
        <?php
          echo $_SESSION['email'];
          }
        ?>
        <!-- نهاية معالجة جلسة المستخدم -->
      </li>
   
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
  </header>

  <section>
    <!-- صورة الخلفية -->
    <img alt="background" src="../porgramming/image/Programming-amico.png" />
  </section>

</body>
<footer>
  
 
  
<h2>Follow Us</h2>
    &copy; 2024 Programming School. All rights reserved.
  </div>
</footer>
</html>
