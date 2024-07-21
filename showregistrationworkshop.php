<?php
include 'C:\xampp\htdocs\php\porgramming\interface.php';

class showregistrationworkshop
{
    // دالة لإنشاء اتصال بقاعدة البيانات
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

    // دالة لبحث عن الورش التدريبية
    public function searchWorkshops($registrationdate, $confirmationstatus) {
        // استخدم معرف المستخدم المسجل في الجلسة
        $id = $_SESSION['userid']; 
        $conn = $this->connectToDatabase();

        // استعلام SQL للبحث عن الورش التدريبية
        $query = "SELECT registrationworkshop.datare, registrationworkshop.confirmation, workshop.language, workshop.startTime, workshop.endTime, workshop.location, workshop.numberofseatsavailable, workshop.thetopic, workshop.data
                  FROM registrationworkshop
                  INNER JOIN workshop ON registrationworkshop.workshop = workshop.workid
                  WHERE registrationworkshop.datare = '$registrationdate'
                    AND registrationworkshop.confirmation LIKE '%$confirmationstatus%'
                    AND registrationworkshop.userid = '$id'";

        $result = $conn->query($query);

        // تحقق من نجاح تنفيذ الاستعلام
        if (!$result) {
            echo "<p>Unable to execute the query.</p>";
            echo $query;
            die($conn->error);
        }

        // إنشاء جدول HTML لعرض نتائج البحث
        if ($result->num_rows > 0) {
            echo '<table class="workshop-table">';
            echo '<tr>
                    <th>registrationworkshop data</th>
                    <th>confirmation</th>
                    <th>Language</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>
                    <th>Number of Seats Available</th>
                    <th>Topic</th>
                    <th>Date</th>
                    <th>Register for the workshop</th>
                </tr>';

            while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $data['datare']; ?></td>
                    <td><?php echo $data['confirmation']; ?></td>
                    <td><?php echo $data['language']; ?></td>
                    <td><?php echo $data['startTime']; ?></td>
                    <td><?php echo $data['endTime']; ?></td>
                    <td><?php echo $data['location']; ?></td>
                    <td><?php echo $data['numberofseatsavailable']; ?></td>
                    <td><?php echo $data['thetopic']; ?></td>
                    <td><?php echo $data['data']; ?></td>
                    
                    <td>
                    <button>confirmationstatus</button>
                    </td>
                </tr>
                <?php
            }
            echo '</table>';
        } 
        
        else {
            echo "<p>No workshops found.</p>";
        }

        $conn->close();
    }
}
// HTML form
?>
<form method="post">
    <center>
        <p><strong>Choose Search registration workshop :</strong></p>
        <p><strong>Choose registration-date </strong><br />
        <label for="registration-date">Registration Date:</label>
        <input type="date" id="registration-date" name="registration-date" required>

        <label for="confirmation-status">Confirmation Status:</label>
        <select id="confirmation-status" name="confirmation-status" required>
            <option value="">Select status</option>
            <option value="confirmed">Confirmed</option>
            <option value="maybe">maybe</option>
        </select>

        <input type="submit" name="submit" value="Search">
    </center>
</form>

<?php
if (isset($_POST['submit'])) {
    $registrationdate = $_POST['registration-date'];
    $confirmationstatus = $_POST['confirmation-status'];

    if (!$registrationdate || !$confirmationstatus) {
        echo '<p>You have not entered search details.<br/>
        Please go back and try again.</p>';
        exit;
    }

    // whitelist the searchtype
    $validStatuses = array('confirmed', 'maybe');
    if (!in_array($confirmationstatus, $validStatuses)) {
        echo '<p>That is not a valid search type. <br/>
        Please go back and try again.</p>';
        exit;
    }

    $showRegistrationWorkshop = new showregistrationworkshop();
    $showRegistrationWorkshop->searchWorkshops($registrationdate, $confirmationstatus);
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    .workshop-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f9f9f9;
    }

    .workshop-table th,
    .workshop-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .workshop-table th {
        background-color: #f1f1f1;
    }

    .row-match {
        background-color: #ffcdd2;
    }

    .no-workshops {
        text-align: center;
        color: #888;
        font-style: italic;
    }
</style>