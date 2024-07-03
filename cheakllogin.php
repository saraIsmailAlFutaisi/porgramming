<?php
//  سارة إسماعيل الفطيسي
// التحقق من أن الأشخاص الذين قاموا بالدخول إلى الصفحة مسجلين في قاعدة البيانات

class User {
    // هذه الخصائص الخاصة بالمستخدم
    private $id;
    private $firstname;
    private $lastname;
    private $phone;
    private $email;
    private $password;

    // هذا هو البناء الخاص بالفصل
    public function __construct($id, $firstname, $lastname, $email, $phone, $password) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    // هذه الدالة تقوم بتسجيل الدخول للمستخدم
    public function login($email, $password) {
        try {
            // تتم عملية الاتصال بقاعدة البيانات هنا
            require_once 'databaes.php';
            $conn = new mysqli($hn, $un, $pw, $db);

            // التحقق من وجود خطأ في الاتصال بقاعدة البيانات
            if ($conn->connect_error) {
                throw new Exception("خطأ: تعذر الاتصال بقاعدة البيانات. الرجاء المحاولة مرة أخرى لاحقًا.");
            }
          
            // استعلام SQL للتحقق من البريد الإلكتروني وكلمة المرور
            $query = "SELECT id, firstname, lastname, email, phonenumber, password FROM user WHERE email = '$email' and password = '$password'";
            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);

            // إذا تم العثور على المستخدم في قاعدة البيانات
            if ($row) {
                $this->id = $row['id'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
                $this->email = $row['email'];
                $this->phone = $row['phonenumber'];
                $this->password = $row['password'];

                // التحقق من تطابق البريد الإلكتروني وكلمة المرور
                if ($this->email == $email && $this->password == $password) {
                    // بدء جلسة جديدة وتخزين معلومات المستخدم
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
        } catch (Exception $e) {
            // معالجة أي استثناءات وإرجاع false
            echo "حدث خطأ: " . $e->getMessage();
            return false;
        }
    }

    // دوال المساعدة للحصول على معلومات المستخدم
    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }
}

// هذا الجزء يقوم بمعالجة النموذج المرسل من قبل المستخدم
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(0, '', '', $email, '', $password);

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
?>
