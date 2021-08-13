<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" media="screen and (max-width:500px)" href="css/mobile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <title>Banking System</title>
  <style>

   input{
      margin-top:10px;
      border:#ccc 1px solid;
      background: transparent;
      padding: 0.2rem;
      text-align: center;
      color: #fff
  }

 ::placeholder{
     color:#ccc;
 }

button{
  border: 1px solid #fff;
  padding: 10px 30px;
  margin-left: 10px;
  color: #fff;
  text-decoration: none;
  transition: 0.6s ease;
  background-color: #fff;
  color: #000;
  font-weight: bold;
}

button:hover
 {
     color:white;
     background:#4CAF50;
     border:none;
 }

.container{
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding-top: 7rem;
}


/* @media(min-width: 765px){
  .col-sm-4{
    margin: 0 80rem;
  }
 */
@media(min-width: 765px) and (max-width: 1370px){
  header{
    height: 130vh;
  }
  
  .container{
    padding-top: 0;
  }

  .row{
    display: flex;
    flex-direction: column;
  }

  .col-sm-4{
    padding: 20px 0;
  }
}

@media(min-width:769px) and (max-width:1025px){
  header{
    height: 100vh;
  }
}

 </style>

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


    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card text-center" style="height:340px;width:350px;background:transparent;color:#fff;border:black 1px solid " >
            <form method="POST">

            <?php
            include 'connection.php';
            $ids=$_GET['idtransfer'];
            $showquery="select * from `customertable` where Sno = '$ids' ";
            $showdata=mysqli_query($conn,$showquery);
            if (!$showdata) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
            }
            $arrdata=mysqli_fetch_array($showdata);

            ?>

              <div class="card-body">
                <h3>Transfer From</h3>
                  <label>Name</label>
                  <input type="text"  name="name1" value="<?php echo $arrdata['Name']; ?>" required placeholder="Enter your name"/><br><br>
                  <label>Email</label>
                  <input type="text" name="email1" value="<?php echo $arrdata['Email']; ?>" required placeholder="Enter email id"/><br><br>
                  <label>Amount</label>
                  <input type="text" name="amount1" value="" style="width:210px;" required placeholder="Enter amount"/><br><br>
              </div>
          </div>
       </div>

      <div class="col-sm-4">
         <div class="card text-center" style="height:340px;width:350px;background:transparent;color:#fff;border:black 1px solid">
            <div class="card-body">
               <img src="images/transaction.jpg" style="width:270px;height:200px;margin:20px;">
               <button name="submit">Transfer Money</button>
            </div>
         </div>
      </div>

      <div class="col-sm-4">
        <div class="card text-center" style="height:340px;width:350px;background:transparent;color:#fff;border:black 1px solid">
           <div class="card-body">
              <h3>Transfer To</h3>
                <label>Name</label>
                <input type="text"  name="name2" value="" required placeholder="Enter your name"/><br><br>
                <label>Email</label>
                <input type="text" name="email2" value="" required placeholder="Enter email id"/><br><br>
           </div>
        </div>
      </div>

     </div>
    </div>
 </form>
<?php

include 'connection.php';

if(isset($_POST['submit']))
{


    $Sender_name=$_POST['name1'];
    $Sender_email=$_POST['email1'];
    $Sender=$_POST['amount1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_email=$_POST['email2'];



    $ids=$_GET['idtransfer'];
    $senderquery="select * from `customertable` where Sno = '$ids' ";
    $senderdata=mysqli_query($conn,$senderquery);

    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="select * from `customertable` where Email='$Receiver_email' ";
    $receiver_data=mysqli_query($conn,$receiverquery);

    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['Sno'];


    if($arrdata['Current Balance'] >= $Sender)
    {
      $decrease_sender=$arrdata['Current Balance'] - $Sender;
      $increase_receiver=$receiver_arr['Current Balance'] + $Sender;
       $result="UPDATE `customertable` SET `Sno`=$ids,`Current Balance`= $decrease_sender  where `Sno`=$ids ";
       $rec_query="UPDATE`customertable` SET `Sno`=$id_receiver,`Current Balance`= $increase_receiver where  `Sno`=$id_receiver ";
       $row= mysqli_query($conn,$result);
       $rec_res= mysqli_query($conn,$rec_query);
      // $res_receiver=mysqli_query($con,$result_receiver);
       if($row && $rec_res)
      {
       ?>
       <script>
       swal("Done!", "Transaction Successful!", "success");
        </script>

      <?php

      }
    else
      {
      ?>
           <script>
       swal("Oops!", "Customer not found!", "error");
        </script>

      <?php

      }
    }


  else
   {
  ?>
    <script>
       swal("Insufficient Balance", "Transaction Not Successful!", "warning");
    </script>
  <?php
   }
  }
 ?>


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
   <div class="footer-bottom"> Copyright &copy; ABC Banking Solutions 2021. All rights reserved. </div>
 </footer>
</body>
</html>
