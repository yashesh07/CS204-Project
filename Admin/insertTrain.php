<?php
$servername = "localhost:3325";
$username = "root";
$password = "";
$dbname = "railway system";

// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submitTrainDet'])){
    $trainName = $_POST['trainName'];
    $trainNumber = $_POST['trainNumber'];
    $trainSource = $_POST['trainSource'];
    $trainDestination = $_POST['trainDestination'];
    $arrivalTime = $_POST['arrivalTime'];
    $referenceDate = $_POST['referenceDate'];
    $departureTime = $_POST['departureTime'];
    $totalSeats = $_POST['totalSeats'];
}

$sql = "INSERT INTO train (train_no, train_name, train_source, train_destination, arrival_time, departure_time, seats_available,reference_date)
VALUES ('$trainNumber', '$trainName', '$trainSource', '$trainDestination', '$arrivalTime','$departureTime','$totalSeats','$referenceDate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

?>
