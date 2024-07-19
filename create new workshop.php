<!DOCTYPE html>
<head>
  
  <link rel="stylesheet" href="../program language/css/stylenew.css">
  <link rel="stylesheet" href="css\stylenew.css">
</head>
<header>
    <ul>
      <li>
        <!-- بداية معالجة جلسة المستخدم -->
        <?php
          session_start();
          $id = $_SESSION['userid'];
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
<html>

  <?php

  // كلاس ورشة عمل لديه وظيفة إنشاء ورشة العمل
  class WorkshopAnnouncement {
    private $id;
    private $language;
    private $startTime;
    private $endTime;
    private $date;
    private $seatsAvailable;
    private $location;
    private $topic;

    public function __construct($id,  $language, $startTime, $endTime, $date, $seatsAvailable, $location, $topic) {
      // تعيين قيم عند إنشاء كائن من الصف
      $this->id = $id;
      $this->language = $language;
      $this->startTime = $startTime;
      $this->endTime = $endTime;
      $this->date = $date;
      $this->seatsAvailable = $seatsAvailable;
      $this->location = $location;
      $this->topic = $topic;
    }

    // طريقة للتحقق من توفر وقت وتاريخ الورشة
    public function Checktheworkshoptimeanddata($startTime, $endTime, $date) {
      $conn =  $this->connectToDatabase();
      $query = "SELECT startTime, endTime, data FROM workshop WHERE data = '$date' AND (('$startTime' BETWEEN startTime AND endTime) OR ('$endTime' BETWEEN startTime AND endTime))";
      $result = $conn->query($query);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
        
    // إذا وجد ورشة عمل لها نفس الوقت وتاريخ
         return true;
      } else {
        
    // إذا لم يوجد ورشة عمل لها نفس الوقت وتاريخ
        return false;
      }
    }


    //  لتخزين بيانات الورشة في قاعدة البيانات
    public function Storeindatabase($id,  $language,$startTime, $endTime, $date, $seatsAvailable, $location, $topic){
      $conn =  $this->connectToDatabase();
          $query1 = "INSERT INTO workshop(iduser,language,startTime,endTime,location,numberofseatsavailable,data,thetopic)VALUE ('$id',' $language','$startTime','$endTime','$location ','$seatsAvailable',' $date','$topic')";
          $result1 = $conn->query($query1);
          if (!$result1) {
            echo $conn->error;
            echo "<br/>.The item was not added.";
            echo "<br/>$query1";
          }
          

    }
   

    function connectToDatabase() {
      // إنشاء اتصال قاعدة البيانات هنا
      include 'databaes.php';
      $conn = new mysqli($hn, $un, $pw, $db);
  
      // تحقق من وجود خطأ في الاتصال بقاعدة البيانات
      if ($conn->connect_error) {
          throw new Exception("خطأ: تعذر الاتصال بقاعدة البيانات. حاول مرة أخرى لاحقًا.");
      }
  
      return $conn;
  }

    // طرق الوصول إلى خصائص الصف
    public function getid() {
      return $this->id;
    }

    public function getLanguage() {
      return $this->language;
    }

    public function getStartTime() {
      return $this->startTime;
    }

    public function getEndTime() {
      return $this->endTime;
    }

    public function getDate() {
      return $this->date;
    }

    public function getSeatsAvailable() {
      return $this->seatsAvailable;
    }

    public function getLocation() {
      return $this->location;
    }

    public function getTopic() {
      return $this->topic;
    }
  }

  // بدء جلسة المستخدم
 
   // تحقق مل إذا كان المستخدم قد سجل الدخول
  if (!empty($id)) {
   

    // التعامل مع البيانات المرسلة من خلال النموذج
    if (isset($_POST['save'])) {
      $language = $_POST['language'];
      $startTime = $_POST['startTime'];
      $endTime = $_POST['endTime'];
      $date = $_POST['DATE'];
      $seatsAvailable = $_POST['number'];
      $location = $_POST['location'];
      $topic = $_POST['Topic'];
     
      $workshop = new WorkshopAnnouncement(
        $id,
        $language,
        $startTime,
        $endTime,
        $date,
        $seatsAvailable,
        $location,
        $topic
      );
      
      // التحقق من توفر وقت وتاريخ الورشة
    //  إذا تحقق شرط ورجعت ترسلك لصفحة مره اخري لإعادة المحاولة

try {
    if ($workshop->Checktheworkshoptimeanddata($startTime, $endTime, $date)) {
        header('REFRESH:4;URL=workshop.php');
        echo 'There is already a workshop scheduled at the same date and time. Please try again.';
    } else {
         //  إذا لم يتحقق شرط تخزن البيانات في قاعدة البيانات
        $workshop->Storeindatabase($id,  $language,$startTime, $endTime, $date, $seatsAvailable, $location, $topic);
        header('REFRESH:4;URL=workshop.php');
        echo 'The workshop has been created successfully.';
    }
} catch (Exception $e) {
    // في حالة حدوث أي استثناء، قم بإظهار رسالة الخطأ

    echo 'An error occurred: ' . $e->getMessage();
  
    }
 } }else {
       // إذا لم يقم المستخدم بي تسجيل الدخول
       header('REFRESH:5;URL=login.php');
      echo 'Please log in to the website first.';
    }
    
   ?>
</html>