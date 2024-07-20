
<?php
//  سارة إسماعيل الفطيسي
// التحقق من أن الأشخاص الذين قاموا بالدخول إلى الصفحة مسجلين في قاعدة البيانات
include'C:\xampp\htdocs\php\porgramming\interface.php';
class User {
    // هذه الخصائص الخاصة بالمستخدم
  
    private $firstname;
    private $lastname;
    private $phone;
    private $email;
    private $password;
    private $confpassword;
    // هذا هو البناء الخاص بالفصل
    public function __construct( $firstname, $lastname, $email, $phone, $password,$confpassword) {
    
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->$confpassword = $confpassword;
    }

    // هذه الدالة تقوم بتسجيل الدخول للمستخدم
    public function login($email, $password) {
        try {
            // تتم عملية الاتصال بقاعدة البيانات هنا
            $conn =  $this->connectToDatabase();
          
            // استعلام SQL للتحقق من البريد الإلكتروني وكلمة المرور
            $query = "SELECT id, firstname, lastname, email, phonenumber, password FROM user WHERE email = '$email' and password = '$password'";
            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);
            echo"";
            // إذا تم العثور على المستخدم في قاعدة البيانات
            if ($row) {
            
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
                $this->email = $row['email'];
                $this->phone = $row['phonenumber'];
                $this->password = $row['password'];

                // التحقق من تطابق البريد الإلكتروني وكلمة المرور
                if ($this->email == $email && $this->password == $password) {
                    // بدء جلسة جديدة وتخزين معلومات المستخدم
                    
                    $_SESSION['email'] = $this->email;
                    $_SESSION['userid'] =$row['id'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            // معالجة أي استثناءات وإرجاع false
            echo "حدث خطأ: " . $e->getMessage();
            return false;
        }
    }
    function connectToDatabase() {
        // إنشاء اتصال قاعدة البيانات هنا
        require_once 'databaes.php';
        $conn = new mysqli($hn, $un, $pw, $db);
    
        // تحقق من وجود خطأ في الاتصال بقاعدة البيانات
        if ($conn->connect_error) {
            throw new Exception("خطأ: تعذر الاتصال بقاعدة البيانات. حاول مرة أخرى لاحقًا.");
        }
    
        return $conn;
    }
    
    function register($firstname, $lastname, $email, $phone, $password, $confirmPassword) {
        try {
            // الاتصال بقاعدة البيانات
            $conn =  $this->connectToDatabase();
    
            // تحقق من وجود البريد الإلكتروني بالفعل في قاعدة البيانات
            $checkQuery = "SELECT * FROM user WHERE email = '$email'";
            $result = $conn->query($checkQuery);
            if ($result->num_rows > 0) {
                throw new Exception("خطأ: البريد الإلكتروني مسجل بالفعل. حاول باستخدام بريد إلكتروني مختلف.");
            }
    
            // تحقق من تطابق كلمة المرور وتأكيدها
            if ($password !== $confirmPassword) {
                throw new Exception("خطأ: كلمة المرور وتأكيد كلمة المرور غير متطابقتين.");
            }
    
            // استعلام SQL لإدخال المستخدم الجديد
            $query = "INSERT INTO user (firstname, lastname, email, phonenumber, password) VALUES ($firstname, $lastname, $email, $phone, $password)";
            $stmt = $conn->prepare($query);
          
            if ($stmt->execute()) {
                // إرجاع معرف المستخدم الجديد
                return $conn->insert_id;
            } else {
                throw new Exception("خطأ: " . $query . "<br>" . $conn->error);
            }
        } catch (Exception $e) {
            // التعامل مع أي استثناءات وإرجاع قيمة خاطئة
            echo "حدث خطأ: " . $e->getMessage();
            return false;
        } finally {
            // إغلاق اتصال قاعدة البيانات
         
        }
    }
    
    // دوال المساعدة للحصول على معلومات المستخدم
    public function getEmail() {
        return $this->email;
    }

     
}

// هذا الجزء يقوم بمعالجة النموذج المرسل من قبل المستخدم
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User('','', $email, '', $password,'');

    // محاولة تسجيل الدخول للمستخدم
    if ($user->login($email, $password)) {
        // إذا نجح تسجيل الدخول، توجيه المستخدم إلى الصفحة الرئيسية
        header('REFRESH:4;URL=home page .php');
        echo 'مرحبا بك مرة أخرى ' . $user->getEmail();
    } else {
        // إذا فشل تسجيل الدخول، إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
      header('REFRESH:5;URL=login.php');
        echo '.Try again' . $email . ',you have not been found .';
    }

}

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
 $confirmPassword = $_POST['confirm'];
    $userregister = new User($firstname, $lastname, $email, $phone, $password, $confirmPassword);
    $userId = $userregister->register($firstname, $lastname, $email, $phone, $password, $confirmPassword);

    if ($userId) {
        // If the registration is successful, redirect the user to the login page
        header('REFRESH:4;URL=login.php');
        echo 'Registration successful! Please log in.';
    } else {
        // If the registration fails, display an error message
        echo 'Registration failed. Please try again.';
        header('REFRESH:4;URL=sinup.php');
    }
}
?>
