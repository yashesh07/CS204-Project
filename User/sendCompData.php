<?php
$servername = "localhost:3325";
$username = "root";
$password = "";
$dbname = "railway system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['bookingButton'])){
    $passenger_ID=$_POST['passenger_ID'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $pincode=$_POST['pincode'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];

    $transaction_ID=$_POST['transaction_ID'];
    $pnr_no=$_POST['pnr_no'];
    $amount=$_POST['amount'];

    $train_no = $_POST['train_no'];
    $train_name = $_POST['train_name'];
    $train_source = $_POST['train_source'];
    $train_destination = $_POST['train_destination'];
    $arrivalTime = $_POST['arrivalTime'];
    $departureTime = $_POST['departureTime'];
    $seats_available = $_POST['seats_available'];

    $passenger_bookingDate=$_POST['passenger_bookingDate'];

    
    echo $name;
}


$sql1 = "INSERT INTO payment (transaction_ID, passenger_ID, pnr_no, amount)
VALUES ('$transaction_ID', '$passenger_ID', '$pnr_no', '$amount')";

$sql2 = "INSERT INTO passenger (passenger_ID, first_name, last_name, pincode, city , state, dob, gender, age)
VALUES ('$passenger_ID', '$first_name', '$last_name', '$pincode', '$city','$state','$dob','$gender','$age')";

$sql3 = "INSERT INTO ticket (transaction_ID, passenger_ID, pnr_no)
VALUES ('$transaction_ID', '$passenger_ID', '$pnr_no')";

$sql4 = "INSERT INTO traveller (passenger_ID, train_source, train_destination,passenger_bookingDate,train_no)
VALUES ('$passenger_ID', '$train_source', '$train_destination','$passenger_bookingDate','$train_no')";

if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
if ($conn->query($sql4) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

?>
