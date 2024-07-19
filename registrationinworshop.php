<?php
  include'C:\xampp\htdocs\php\porgramming\create new workshop.php';
class RegistrationInWorkshop  extends WorkshopAnnouncement
 {
    private $workshopId;
    private $userId;
    private $registrationDate;
    private $confirmationStatus;

    public function registerForWorkshop($workshopId, $userId, $registrationDate, $confirmationStatus) {
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

  //  لتخزين بيانات الورشة في قاعدة البيانات
  public function Storeindatabase($id,  $language,$startTime, $endTime, $date, $seatsAvailable, $location, $topic){
    $conn =  $this->connectToDatabase();
        $query1 = "INSERT INTO registrationworkshop(workshop,userid,data,confirmation)VALUE ('$workshop',' $userid','$data','$confirmation')";
        $result1 = $conn->query($query1);
        if (!$result1) {
          echo $conn->error;
          echo "<br/>.The item was not added.";
          echo "<br/>$query1";
        }
        

  }
  $userid= $_GET['iduser']; 
  
  $workshop= $_GET['workid'] ; 
}

?>

<form action="registration.php" method="post">
  <label for="workshop-id">Workshop ID:</label>
  <input type="text" id="workshop-id" name="workshop-id" value="<?php echo $workshop?>">

  <label for="user-id">User ID:</label>
  <input type="text" id="user-id" name="user-id" value="<?php echo  $userid?>">

  <label for="registration-date">Registration Date:</label>
  <input type="date" id="registration-date" name="registration-date" required>

  <label for="confirmation-status">Confirmation Status:</label>
  <select id="confirmation-status" name="confirmation-status" required>
    <option value="">Select status</option>
    <option value="confirmed">Confirmed</option>
    <option value="maybe">maybe</option>
  </select>

  <button type="submit" name="save" >Register</button>
</form>
<?php


if (isset($_POST['save'])) {

    $data=$_POST['registration-date'];
    $confirmation=$_POST['confirmation-status'];
    echo $confirmation;

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