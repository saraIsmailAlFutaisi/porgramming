

<?php
include 'C:\xampp\htdocs\php\porgramming\create new workshop.php';

// هذا الكلاس هو امتداد لكلاس WorkshopAnnouncement الذي تم تعريفه في الملف "create new workshop.php"
class showworkshop extends WorkshopAnnouncement
{
    // هذه الدالة تستخدم للبحث عن الورش التدريبية التي تطابق معايير البحث المقدمة
    public function searchWorkshops($date, $startTime, $endTime)
    {
        // إذا لم يتم إدخال أي معايير للبحث، يتم عرض رسالة تطلب من المستخدم إعادة المحاولة
        if (!$date && !$startTime && !$endTime) {
            echo '<p class="no-workshops">You have not entered search details.<br/>
                  Please go back and try again.</p>';
            return false;
        }

        try {
            // الاتصال بقاعدة البيانات
            $conn = $this->connectToDatabase();
            // استعلام SQL للبحث عن الورش التدريبية التي تطابق معايير البحث
            $query = "SELECT * FROM workshop WHERE data = '$date' AND (('$startTime' BETWEEN startTime AND endTime) OR ('$endTime' BETWEEN startTime AND endTime))";
            $result = $conn->query($query);

            // إذا تم العثور على ورش تدريبية، يتم عرضها في جدول
            if ($result->num_rows > 0) {
                echo '<table class="workshop-table">';
                echo '<tr>
                        <th>Language</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Date</th>
                        <th>Number of Seats Available</th>
                        <th>Location</th>
                        <th>Topic</th>
                        <th>Register for the workshop</th>
                      </tr>';

                // عرض البيانات الخاصة بكل ورشة تدريبية في الجدول
                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                    $rowClass = '';
                    // تحديد أي الورش تطابق معايير البحث
                    if (($data['startTime'] >= $startTime && $data['startTime'] <= $endTime) || ($data['endTime'] >= $startTime && $data['endTime'] <= $endTime)) {
                        $rowClass = 'row-match';
                    }
                    echo '<tr class="' . $rowClass . '">
                            <td>' . $data['language'] . '</td>
                            <td>' . $data['startTime'] . '</td>
                            <td>' . $data['endTime'] . '</td>
                            <td>' . $data['data'] . '</td>
                            <td>' . $data['numberofseatsavailable'] . '</td>
                            <td>' . $data['location'] . '</td>
                            <td>' . $data['thetopic'] . '</td>
                            <td>
                                <a href="registrationinworshop.php?iduser=' . $data['iduser'] . '&workid=' . $data['workid'] .'&language=' . $data['language']  .'&startTime=' . $data['startTime'] .'&endTime=' . $data['endTime'] .'&data=' . $data['data'] .'&numberofseatsavailable=' . $data['numberofseatsavailable'] .'&location=' . $data['location'] . '&thetopic=' . $data['thetopic'] .'">
                                    <button style="font-size: 16px; padding: 10px 20px;">register</button>
                                </a>
                            </td>
                        </tr>';
                }
                echo '</table>';
            } else {
                // إذا لم يتم العثور على ورش تدريبية، يتم عرض رسالة تبليغ المستخدم
                echo '<p class="no-workshops">There are no available workshops that match your search criteria.</p>';
                return false;
            }
        } catch (Exception $e) {
            // في حالة حدوث خطأ، يتم عرض الرسالة الخاصة به
            echo '<p class="no-workshops">Unable to execute the query: ' . $e->getMessage() . '</p>';
         
        }

        
    }
}

// HTML form
?>
<form method="post">
    <center>
        <p><strong>Choose Search a date:</strong></p>
        <label>date</label>
        <input type="date" name="DATE" />
        <label>time start</label>
        <input type="time" name="tim1" />
        <label>time end </label>
        <input type="time" name="time2" />
        <input type="submit" name="search" value="Search">
    </center>
</form>
<?php

if (isset($_POST['search'])) {
    // الحصول على معايير البحث من نموذج الاستمارة
    $date = $_POST['DATE'];
    $startTime = $_POST['tim1'];
    $endTime = $_POST['time2'];
    $workshop = new showworkshop('', '', '', '', '', '', '', '');
    // إذا توافرت ورش تدريبية، عرضها للمستخدم
    $workshop->searchWorkshops($date, $startTime, $endTime);
       
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
</body>


   
</html>