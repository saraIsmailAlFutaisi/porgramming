<!DOCTYPE html>
<html>
  <?php
class WorkshopAnnouncement {
    private $workshopNumber;
    private $organizerNumber;
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
        
       }
       public function databeseconected(){
        require_once 'databaes.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
              echo "<p>Error: Could not connect to database.<br/>
              Please try again later.</p>";
                die($conn -> error);

                
            }
           
       }
       public function Storingdatainthedatabase($db){
       
         
            $sql = "INSERT INTO workshops (workid,organizerid, language,starttime,endtime,date,numberofseatsavailable,location,thetopic)
                    VALUES (:workshopNumber, :organizerNumber, :language, :startTime, :endTime, :date, :availableSeats, :location, :topic)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':workshopNumber', $this->workshopNumber);
            $stmt->bindParam(':organizerNumber', $this->organizerNumber);
            $stmt->bindParam(':language', $this->language);
            $stmt->bindParam(':startTime', $this->startTime);
            $stmt->bindParam(':endTime', $this->endTime);
            $stmt->bindParam(':date', $this->date);
            $stmt->bindParam(':availableSeats', $this->availableSeats);
            $stmt->bindParam(':location', $this->location);
            $stmt->bindParam(':topic', $this->topic);
            $stmt->execute();

    

       }
       public function updatetimeordata(){}
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

    public function displayAnnouncement() {
        echo "Workshop Number: " . $this->workshopNumber . "\n";
        echo "Organizer Number: " . $this->organizerNumber . "\n";
        echo "Language: " . $this->language . "\n";
        echo "Start Time: " . $this->startTime . "\n";
        echo "End Time: " . $this->endTime . "\n";
        echo "Date: " . $this->date . "\n";
        echo "Seats Available: " . $this->seatsAvailable . "\n";
        echo "Location: " . $this->location . "\n";
        echo "Topic: " . $this->topic . "\n";
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

$workshop->displayAnnouncement();

}
 ?> 
 </html>
   
