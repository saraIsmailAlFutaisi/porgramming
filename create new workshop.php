<!DOCTYPE html>
<html>
  <?php
class WorkshopAnnouncement {
    private $workshopNumber;
    private   $id;;
    private $language;
    private $startTime;
    private $endTime;
    private $date;
    private $seatsAvailable;
    private $location;
    private $topic;

    public function __construct($workshopNumber, $organizerNumber, $language, $startTime, $endTime, $date, $seatsAvailable, $location, $topic) {
        $this->workshopNumber = $workshopNumber;
        $this->organizerNumber = $organizerNumber;
        $this->language = $language;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->date = $date;
        $this->seatsAvailable = $seatsAvailable;
        $this->location = $location;
        $this->topic = $topic;
    }
       public function Checktheworkshoptimeanddata($startTime, $endTime, $date){
        
       
      
        require_once 'databaes.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
              echo "<p>Error: Could not connect to database.<br/>
              Please try again later.</p>";
                die($conn -> error);
             
                
            }
            $query = "SELECT id, firstname, lastname, email, phonenumber, password FROM user WHERE email = '$email' and password = '$password'";
            $result = $conn->query($query);
            $row = mysqli_fetch_assoc($result);
    
            if ($row) {}
       }
      
     
    public function getWorkshopNumber() {
        return $this->workshopNumber;
    }

    public function getOrganizerNumber() {
        return $this->organizerNumber;
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

  
session_start();
if(!empty($_SESSION['userid']))
{$Organizer= $_SESSION['userid'];
}
else{
    $Organizer= $_SESSION['user'];
}

// Example usage\
if(isset($_POST['submit'])){
  
    $Language=$_POST['Language'];
    $StartTime=$_POST['StartTime'];
    $endTime=$_POST['endTime'];
    $Date=$_POST['Date'];
    $SeatsAvailable=$_POST['Seats Available'];
    $Location=$_POST['Location'];
    $Topic=$_POST['Topic'];


$workshop = new WorkshopAnnouncement(
    $WorkshopNumber,
    $Organizer,
    $Language,
    $StartTime,
    $endTime,
    $Date,
    $SeatsAvailable,
    $Location,
    $Topic
);
$workshop->Checktheworkshoptimeanddata($startTime, $endTime, $date);


}
 ?> 
 </html>
   
