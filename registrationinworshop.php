<?php
 include 'C:\xampp\htdocs\php\porgramming\interface.php';

 class RegistrationInWorkshop 
 {
     private $workshopId;
   private$userId ;
     private $registrationDate;
     private $confirmationStatus;
 
     public function registerForWorkshop($userId,$workshopId, $registrationDate, $confirmationStatus)
     {   

         $this->workshopId = $workshopId;
        $this->userId = $userId;
         $this->registrationDate = $registrationDate;
         $this->confirmationStatus = $confirmationStatus;
     }
    public function getWorkshopId() {
        return $this->workshopId;
    }

    public function getUserId() {
    return $this->userId;
    }

    public function getRegistrationDate() {
        return $this->registrationDate;
    }

    public function getConfirmationStatus() {
        return $this->confirmationStatus;
    }

    public function updateConfirmationStatus($newStatus) {
        $this->confirmationStatus = $newStatus;
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
    public function  cheakuser( $workshopId, $userId){

      $conn =  $this->connectToDatabase();
      // استعلام للتحقق من تسجيل المستخدم في الورشة
      $query = "SELECT userid,workshop FROM registrationworkshop WHERE userid = '$userId' AND workshop=' $workshopId'";
      $result = $conn->query($query);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
              
          $this->userId = $row['userid'];
          $this->workshopId = $row['workshop'];
          // التحقق من إذا كان المستخدم قد سجل في ورشة العمل من قبل
          if ( $this->userId ==  $userId &&   $this->workshopId ==$workshopId) {
              return false;
             
          } 
          else {
              return true;
          }
      } 
     
      
       
  }
  public function  cheakworkshop($workshopId, $numberofseatsavailable,$userId)
  {   
      $conn =  $this->connectToDatabase();
      // تحديث عدد المقاعد المتوفرة في الورشة
      $RESLT1=$numberofseatsavailable-1;
      $query2="UPDATE workshop SET numberofseatsavailable='$RESLT1'WHERE workid = '$workshopId'AND iduser='$userId' ";
      $result2= $conn->query( $query2);
  
  }
    //  لتخزين بيانات الورشة في قاعدة البيانات
    public function Storeindatabas( $workshopId, $userId, $registrationDate, $confirmationStatus){
      $conn =  $this->connectToDatabase();
          $query1 = "INSERT INTO registrationworkshop(workshop,userid,datare,confirmation)VALUE ('$workshopId',' $userId','  $registrationDate','$confirmationStatus')";
          $result1 = $conn->query($query1);
          if (!$result1) {
            echo $conn->error;
            echo "<br/>.The item was not added.";
            echo "<br/>$query1";
          }
          else{
              echo "Your registration for the workshop has been successfully stored ";  
          }
          
  
    }
  
  }
    
  $userId = $_GET['iduser'];
  $workshopId = $_GET['workid'];
  
  
  ?>
  
  <form  method="post">
   
    <label for="registration-date">Registration Date:</label>
    <input type="date" id="registration-date" name="registration-date" required>
  
    <label for="confirmation-status">Confirmation Status:</label>
    <select id="confirmation-status" name="confirmation-status" required>
      <option value="Select">Select status</option>
      <option value="confirmed">Confirmed</option>
      <option value="maybe">maybe</option>
    </select>
  
    <button type="submit" name="save" >Register</button>
  </form>
  <?php
  
  
  if (isset($_POST['save'])) {
  
      $registrationDate=$_POST['registration-date'];
      $confirmationStatus=$_POST['confirmation-status'];
    
      $registration =new RegistrationInWorkshop( $userId,$workshopId, $registrationDate, $confirmationStatus);
      
          // التحقق من إذا كان المستخدم قد سجل في ورشة العمل من قبل
      $reg= $registration->  cheakuser( $workshopId, $userId);
      
    if($reg==false) 
    { 
      // الحصول على عدد المقاعد المتوفرة من الاستعلام
      $numberofseatsavailable = $_GET['numberofseatsavailable'];
      // تحديث عدد المقاعد المتوفرة
      $registration->  cheakworkshop( $workshopId, $numberofseatsavailable,$userId);
      // تخزين بيانات التسجيل في قاعدة البيانات
      $registration-> Storeindatabas( $workshopId, $userId, $registrationDate, $confirmationStatus );
  
    }
    else{
      echo'You have already registered for the workshop ';
    }
     
  }

?>
  <style>
      
      form {
max-width: 800px;
margin: 0 auto;
padding: 30px;
background-color: #f2f2f2;
border-radius: 10px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Form Sections */
form > div {
margin-bottom: 20px;
}

/* Labels */
label {
display: block;
font-weight: bold;
margin-bottom: 5px;
color: #333;
}

/* Input Fields */
input[type="date"],
input[type="text"],
input[type="time"],
input[type="number"] {
width: 100%;
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;
font-size: 16px;
transition: border-color 0.3s ease;
}

input[type="date"]:focus,
input[type="text"]:focus,
input[type="time"]:focus,
input[type="number"]:focus {
outline: none;
border-color: #ff0000;
}

/* Submit and Reset Buttons */
input[type="submit"],
input[type="reset"] {
display: inline-block;
background-color: #ff0000;
color: #fff;
border: none;
border-radius: 5px;
padding: 10px 20px;
font-size: 16px;
cursor: pointer;
transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
background-color: #b30000;
}

/* Responsive Styles */
@media (max-width: 768px) {
form {
padding: 20px;
}
}

    </style>