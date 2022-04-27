
<?php // LOOP TILL END OF DATA
include_once '../admin/ConnectionEST.php';
$caller = new Connection();

if(isset($_POST['user_login_btn'])){
    $pnr = $_POST['pnr_no'];
}

$result = $caller->estConnection("SELECT train.train_no ,train.train_name,train.train_source,train.train_destination,train.departure_time,train.arrival_time,ticket.pnr_no,passenger.first_name,passenger.last_name,passenger.gender,passenger.age FROM (train NATURAL JOIN ticket)NATURAL JOIN passenger WHERE ticket.pnr_no='$pnr';");
?>

<?php
while ($rows = $result->fetch_assoc()) {
    ?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket portal</title>
    <link href="ticketStyles.css" rel="stylesheet">
</head>
<body>
<section class="container">
<h1>Ticket</h1>
<div style="height: 50px;">

</div>
  <div>
    <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <span style="font-size: 5rem;"><img class="mb-4" src="../images/logo-transparent.png" alt="" width="350" height="120"></span>
        </time>
      </section>
      <section class="card-cont">
        <small style="font-size: 1.5rem; letter-spacing: 4px;" id="nameInTicket"><span><?php echo $rows['first_name']; ?></span> <span><?php echo $rows['last_name']; ?></span></small>
        <h3 style="font-size: 4rem; letter-spacing: 4px;" id="source-destination"><span><?php echo $rows['train_source']; ?></span> - <span><?php echo $rows['train_destination']; ?></span></h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
         <span style="font-size: 1.5rem; letter-spacing: 4px; color: #3C3C3C" id="trainNumberInTicket"><strong><?php echo $rows['train_name']; ?> - <?php echo $rows['train_no']; ?></strong></span>
         <span style="font-size: 1.5rem; letter-spacing: 4px;" id="genderInTicket">Gender : <?php echo $rows['gender']; ?></span>
         <span style="font-size: 1.5rem; letter-spacing: 4px;" id="ageInTicket">Age : <?php echo $rows['age']; ?></span>
           <span style="font-size: 1.5rem; letter-spacing: 4px;" id="arrivalTimeInTicket">Arrival time : <?php echo $rows['arrival_time']; ?></span>
           <span style="font-size: 1.5rem; letter-spacing: 4px;" id="departureTimeInTicket">Departure time : <?php echo $rows['departure_time']; ?></span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p style="font-size: 1.5rem; letter-spacing: 4px;" id="amountInTicket">
          ₹6000
          </p>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p style="font-size: 1.5rem; letter-spacing: 4px;" id="pnrNumber">
          PNR number : <span><?php echo $rows['pnr_no']; ?></span>
          </p>
        </div>
        <a href="#" style="background-color: green;">booked</a>
      </section>
    </article>
  </div>
</body>
</html>
<?php
    }
    ?>