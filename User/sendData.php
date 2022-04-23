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
  $passenger_ID=$_POST['passenger_ID'];
  $first_name=$_POST['first_name'];
//   $middle_name=$_POST['middle_name'];
//   $name_last=$_POST['name_last'];
//   $pincode=$_POST['pincode'];
//   $city=$_POST['city'];
//   $state=$_POST['state'];
//   $dob=$_POST['dob'];
//   $gender=$_POST['gender'];
//   $age=$_POST['age'];
//   $sql = "INSERT INTO `railway system`.`passenger` (`passenger_ID`, `first_name`, `middle_name`, `last_name`, `pincode`, `city`, `state`,`dob`,`gender`,`age`) VALUES ('$passenger_ID', '$first_name', '$middle_name', '$name_last', '$pincode', '$city', '$state','$dob','$gender','$age');";
   $sql = "INSERT INTO 'railway system'.'passeger' ('passenger_ID', 'first_name') VALUES ('$passenger_ID','$first_name');";
   echo $sql;

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
}
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
       <input type="text" id="passenger_ID" name="passenger_ID">
      <input type="text" id="first_name" name="first_name">
      <!-- <input type="text" id="middle_name">
      <input type="text" id="pincode">
      <input type="text" id="city">
      <input type="text" id="state">
      <input type="date" id="dob">
      <input type="text" id="gender">
      <input type="text" id="age"> -->
      <!-- <input type="text" id="name_last"> -->

     <button class="btn btn-outline-light btn-lg">Submit</button>
     </form>
     </div>
</body>

</html>