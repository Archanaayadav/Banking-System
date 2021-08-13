
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" media="screen and (max-width:500px)" href="css/mobile.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <title>Banking System</title>
</head>
<body>
 <header>
     <div class="main">
       <div class="logo"><img src="images/logo1.png"></div>
       <ul class="qwer">
         <li><a href="index.php">Home</a></li>
         <li class="active"><a href="Banking.php">Banking</a></li>
         <li><a href="Contact.php">Contact</a></li>
       </ul>
     </div>


<!-- Costumer's details -->

  <section id="table">
    <table class="info">
      <thead>
        <tr>
          <th class="itemHeader">#</th>
          <th class="itemHeader">Name</th>
          <th class="itemHeader">A/c No.</th>
          <!-- <th class="itemHeader">Contact No.</th> -->
          <th class="itemHeader">Email</th>
          <!-- <th class="itemHeader">Current Balance</th> -->
          <th class="itemHeader">Operation</th>
        </tr>
      </thead>
      <?php
      include 'connection.php';
      while($row = mysqli_fetch_array($result)) { ?>
        <tbody class="itemcontainer">
          <tr>
            <td><?php echo $row['Sno']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['A/c No.']; ?></td>
            <!-- <td><?php // echo $row['Contact No.']; ?></td> -->
            <td><?php echo $row['Email']; ?></td>
            <!-- <td><?php// echo $row['Current Balance']; ?></td> -->
            <td><a class="btn" href="transfer.php?idtransfer=<?php  echo $row['Sno']; ?>">Transfer</a></td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
  </section>

</header>
<footer class="footer">
  <div class="inner-footer">
    <div class="footer-items">
      <h1>ABC Bank</h1>
      <p>Premium Banking solutions. Provide safe banking</p>
    </div>

    <div class="footer-items">
      <h2>Quick Links</h2>
      <div class="border"></div>
      <ul>
        <a href="index.php"><li>Home</li></a>
        <a href="Banking.php"><li>Banking</li></a>
        <a href="Contact.php"><li>Contact</li></a>
        <a href=""><li>About</li></a>
      </ul>
    </div>

    <div class="footer-items">
      <h2>Services</h2>
      <div class="border"></div>
      <ul>
        <a href="#"><li>Loan Request</li></a>
        <a href="#"><li>Statement</li></a>
        <a href="#"><li>Debit Card</li></a>
        <a href="#"><li>Credit Card</li></a>
      </ul>
    </div>

    <div class="footer-items">
      <h2>Contact us</h2>
      <div class="border"></div>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i>1,XYZ street ,New Delhi</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>12345678</li>
          <li><i class="fa fa-envolope" aria-hidden="true"></i>support@xyz.com</li>
        </ul>
      <div class="social media">
        <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></li>
        <a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></li>
        <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></li>
        <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></li>
      </div>
     </div>
   </div>
   <div class="footer-bottom"> Copyright &copy; Banking Solutions 2021. All rights reserved. </div>
 </footer>
</body>
</html>
