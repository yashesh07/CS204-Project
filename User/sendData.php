<?php
   $insert=false;
   if(isset($_POST['name'])){

      //Set connection variables
$server="localhost:3307";
$username="root";
$password="";
//Create a database connection
$con=mysqli_connect($server,$username,$password);
//Check for connection success
   if(!$con){
       die("Connection to this database failed due to" . mysqli_connect_error());
   }
 $passenger_ID = $_POST['passenger_ID'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $pincode = $_POST['pincode'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $sql = "INSERT INTO `Railway System`.`passenger` (`passenger_ID`, `first_name`, `middle_name`, `last_name`, `pincode`, `city`, `state`,`dob`,`gender`,`age`) VALUES ('$passenger_ID', '$first_name', '$middle_name', '$last_name', '$pincode', '$city', '$state','$dob','$gender','$age');";
//    echo $sql;
//Execute the query
  if($con->query($sql) == true){
   //   echo "Successfully inserted";
   //Flag for successful insertion
   $insert=true;
  }
  else{
      echo "ERROR:$sql <br> $con->error";
  }
  //Close the database connection
  $con->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php 
        if($insert==true){
        echo "<p class='confirmation-text'>Thanks for submitting the form.We hope to see you onboard with us on the US Trip.</p>";
    }
        ?>
    <div>
     <form action="sendData.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your first name">
     <input type="text" name="name" id="name" placeholder="Enter your middle name">
     <input type="text" name="name" id="name" placeholder="Enter your last name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="date" name="date" id="date" placeholder="Enter your date of birth">
            <input type="date" name="date" id="date" placeholder="Enter your date">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="ENter some other descripyion">

            </textarea>
     <button class="btn btn-outline-light btn-lg">Submit</button>
     </form>
     </div>
</body>
</html>