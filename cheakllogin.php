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

    public function __construct($id, $firstname, $lastname, $email, $phone, $password) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password) {
        require_once 'databaes.php';
        $conn = new mysqli($hn, $un, $pw, $db);

        if ($conn->connect_error) {
            echo "<p>Error: Could not connect to database.<br/>
                  Please try again later.</p>";
            die($conn->error);
        }

        $query = "SELECT id, firstname, lastname, email, phonenumber, password FROM user WHERE email = '$email' and password = '$password'";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->email = $row['email'];
            $this->phone = $row['phonenumber'];
            $this->password = $row['password'];

            // Check if the provided email and password match the user's credentials
            if ($this->email == $email && $this->password == $password) {
                session_start();
                $_SESSION['email'] = $this->email;
                $_SESSION['userid'] = $this->id;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(0, '', '', $email, '', $password);

    if ($user->login($email, $password)) {
        header('REFRESH:4;URL=home page .php');
        echo 'Welcome back ' . $user->getEmail();
    } else {
        header('REFRESH:5;URL=login.php');
        echo $email . ' not found. Please try again.';
    }
}
?>
