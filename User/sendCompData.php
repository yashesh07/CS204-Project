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
$time=time();
echo $time;

if(isset($_POST['bookingButton'])){
    $passenger_ID=$_POST['passenger_ID']/1000;
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $pincode=$_POST['pincode'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];

    $transaction_ID=$time%1000;
    $pnr_no=($time%1000)+999;
    $amount=$_POST['amount'];

    $train_no = 1122;
    // $train_name = $_POST['train_name'];
    // $train_source = $_POST['train_source'];
    // $train_destination = $_POST['train_destination'];
    // $arrivalTime = $_POST['arrivalTime'];
    // $departureTime = $_POST['departureTime'];
    // $seats_available = $_POST['seats_available'];

    $passenger_bookingDate=$_POST['passenger_bookingDate'];

    echo gettype($passenger_ID);
}


echo $transaction_ID;
echo "/n";
echo $pnr_no;
$sql1 = "INSERT INTO payment (transaction_ID, passenger_ID, pnr_no, amount)
VALUES ('$transaction_ID', '$passenger_ID', '$pnr_no', '$amount')";

$sql2 = "INSERT INTO passenger (passenger_ID, first_name, last_name, pincode, city , state, dob, gender, age)
VALUES ('$passenger_ID', '$first_name', '$last_name', '$pincode', '$city','$state','$dob','$gender','$age')";

$sql3 = "INSERT INTO ticket (pnr_no, train_no, passenger_ID)
VALUES ( '$pnr_no', '$train_no', '$passenger_ID')";

$sql4 = "INSERT INTO traveller (passenger_ID,passenger_bookingDate,train_no)
VALUES ('$passenger_ID','$passenger_bookingDate','$train_no')";

$sql5 = "UPDATE train SET  seats_available=seats_available-1 WHERE train_no='$train_no' AND seats_available>0;";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
  }
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }
if ($conn->query($sql4) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
  }
  if ($conn->query($sql5) === TRUE) {
    echo "Seats updated successfully";
  } else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
  }

  $conn->close();
?>