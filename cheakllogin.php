
  
<?php

     /****************سارة إسماعيل الفطيسي
       لتحقق إدا كان الأشخاص الدين قامو بدخول إلي الصفحة مسجلين في قاعدة البيانات اولا
      */
    
      class User {
        private $id;
        private $firstname;
        private $lastname;
        private $phone;
        private $email;
        private $password;
    
        public function __construct($id,$firstname, $lastname,$email, $phone , $password) {
          $this->id = $id;
          $this->firstname =$firstname;
          $this->lastname = $lastname;
            $this->phone = $phone;
            $this->email = $email;
            $this->password = $password;
        }
    
        public function login($email, $password) {
            if ($this->email == $email && $this->password == $password) {
                return true;
            } else {
                return false;
            }
        }
        
    
        public function connection_databeass() {
            require_once 'databaes.php';
            $conn = new mysqli($hn, $un, $pw, $db);
        
            if ($conn->connect_error) {
                echo "<p>Error: Could not connect to database.<br/>
                Please try again later.</p>";
                die($conn->error);
            }
        
        }
        public function getEmail() {
            return $this->email;
        }
    
        public function getId() {
            return $this->id;
        }
    }

    
    if(isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user->connection_databeass();
     
      $query = "SELECT id, firstname, lastname, email, phonenumber, password FROM user WHERE email = '$email'";
      $result = $conn->query($query);
      $row = mysqli_fetch_assoc($result);
  
      if ($row) {
          $user = new User($row['id'], $row['firstname'], $row['lastname'], $row['email'], $row['phonenumber'], $row['password']);
     
          if ($user->login($email, $password)) {
              session_start();
              $_SESSION['email'] = $user->getEmail();
              $_SESSION['userid'] = $user->getId();
              header('REFRESH:4;URL=home page .php');
              echo 'Welcome back ' . $user->getEmail();
          } else {
              header('REFRESH:5;URL=login.php');
              echo $email . ' not found. Please try again.';
          }
      } else {
          echo 'Error';
      }
  }
 ?>

