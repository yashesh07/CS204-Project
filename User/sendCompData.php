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
date_default_timezone_set('Asia/Kolkata');

$dateYmd = date('Y-m-d');
// echo "Current Year Month Day: $dateYmd";
// echo $_COOKIE['train_number'];
// echo $_COOKIE['amount'];

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
    $amount=$_COOKIE['amount'];

    $train_no = $_COOKIE['train_number'];
    // $train_name = $_POST['train_name'];
    // $train_source = $_POST['train_source'];
    // $train_destination = $_POST['train_destination'];
    // $arrivalTime = $_POST['arrivalTime'];
    // $departureTime = $_POST['departureTime'];
    // $seats_available = $_POST['seats_available'];

    $passenger_bookingDate=$dateYmd;

    // echo $dob;
    // echo $age;
}

// echo date(now);

// echo $transaction_ID;
// echo "/n";
// echo $pnr_no;
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
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
  }
if ($conn->query($sql3) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
if ($conn->query($sql1) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
  }
if ($conn->query($sql4) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
  }
  if ($conn->query($sql5) === TRUE) {
    // echo "Seats updated successfully";
  } else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
  }

  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-left logo p-2 px-5"> <img src="../images/whiteDopa.jpeg" width="400"> </div>
                    
                    <div class="invoice p-5">
                        <hr>
                        <h5>Your Booking Confirmed !</h5> <span class="font-weight-bold d-block mt-4"><?php echo "Hello $first_name," ?></span>
                        <span>You booking has been confirmed and your PNR is <?php echo $pnr_no ?></span><br>

<hr>
                        <p class="font-weight-bold mb-0">Thanks for booking with us !</p> <span>Dopa Team</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>