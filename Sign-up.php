<?php


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="gallery/logo.png" sizes="450x450">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- stylesheet -->
    <link rel="stylesheet" href="prettyShit/product.css">
    <link rel="stylesheet" href="prettyShit/tstyle.css">
    <link rel="stylesheet" href="prettyShit/sign-up.css">

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- OWL CAROUSEL CSS-->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <title>Sign-up</title>
  </head>
  <body>
    <section id="head">
      <?php
        include 'includes/lower-head.php';
        include 'database.php';
        $name_err = $last_err = $email_err = $pwd_err = $conf_err = "";
      
        if (isset($_POST['submit'])) {
      
          // DATA PREP FUNCTION
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
      
          if (empty($_POST['name'])) {
            $name_err = "field required";
          }
          else {
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $name_err = "Only letters and white spaces allowed";
              $name = "";
            }
          }
      
          if (empty($_POST['lastName'])) {
            $last_err = "field required";
          }
          else{
            $lastname = test_input($_POST['lastName']);
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
              $last_err = "Only letters and white spaces allowed";
              $lastname = "";
            }
          }
      
          if (empty($_POST['email'])) {
            $email_err = "field required";
          }
          else{
            $email = test_input($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $email_err = "Invalid email!";
              $email = "";
            }
          }
      
          if (empty($_POST['password'])) {
            $pwd_err = "field required";
          }
          else{
            $pwd = test_input($_POST['password']);
          }
      
          if (empty($_POST['conf_password'])) {
            $conf_err = "field required";
          }
          else{
            $pwd2 = test_input($_POST['conf_password']);
            if ($pwd === $pwd2) {
              $match = true;
            }
            else{
              $match = false;
              $conf_err = "Password fields don't match"; 
            }
          }
      
          if (!empty($name) && !empty($lastname) && !empty($email) & $match === true) {
      
            // Check if user exists
            $sql1 = "select * from customer where email = '$email'";
            $run1 = mysqli_query($conn,$sql1);
            if(mysqli_fetch_assoc($run1) > 0){
              echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User already exists'
              });</script>";
            }
            else{
              // echo "<script>Swal.fire({
              //   icon: 'success',
              //   title: 'Congratulations',
              //   text: 'Account successesfully created'
              // });</script>";
      
              $sql = "INSERT INTO customer(user_name,last_name,email,pwd) VALUES('$name','$lastname','$email','$pwd')";
              $run = mysqli_query($conn,$sql);
              session_start();
              $_SESSION['user_name'] = $name;
              $_SESSION['last_name'] = $lastname;
              $_SESSION['email'] = $email;

              require 'PHPMailer/PHPMailerAutoload.php';

              $mail = new PHPMailer;

              $mail->SMTPDebug = 3;                               

              $mail->isSMTP(true);                                      
              $mail->Host = 'smtp.gmail.com';  
              $mail->SMTPAuth = true;                               
              $mail->Username = 'thebetongwane365@gmail.com';                 
              $mail->Password = 'Rich4Eva@101';                           
              $mail->SMTPSecure = 'ssl';                            
              $mail->Port = 465;                                    

              $mail->setFrom('thebetongwane365@gmail.com', 'Sender');
              $mail->addAddress($email, 'Thebe');     // Add a recipient
              $mail->addReplyTo('thebetongwane365@gmail.com', 'Information');
              $mail->isHTML(true);                                  

              $mail->Subject = 'New account created';
              $mail->Body = 'Welcome, '.$name.'. we hope you enjoy shopping with us';

              if(!$mail->send()) {
                  echo "<script>alert('Message could not be sent.');</script>";
              } else {
                  echo "<script>alert('Message successfully sent.');</script>";
              }
      
              // ini_set('display_errors',1);
              // error_reporting(E_ALL);

              // $from = "info@hyghtech.co.za";
              // $to = $email;
              // $subject = "Test account creation";
              // $message = "This is just to test email setting";
              // $headers = "From: ".$from;

              // if(mail($to,$subject,$message,$headers)){
              //   echo "<script>alert('Email has been sent!');</script>";
              // }
              // else{
              //   echo "<script>alert('Email has not been sent!');</script>";
              // }
              // header('location: index.php');
            }
            
        }
      }
       ?>
    </section>
    <div class="form-container row">
      <div class="sign-cont col-">
        <h3>Create account</h3>
        <form method="post">
          <!-- FIRST NAME -->
          <div class="data">
            <span id="err" style="color: red; margin-left: auto;"><?php echo $name_err; ?></span><br>
            <input type="text" name="name" value="" placeholder="Name">
          </div>
          <!-- lAST NAME -->
          <div class="data">
            <span id="err" style="color: red; margin-left: auto;"><?php echo $last_err; ?></span><br>
            <input type="text" name="lastName" value="" placeholder="Last Name">
          </div>
          <!-- EMAIL ADDRESS -->
          <div class="data">
            <span id="err" style="color: red; margin-left: auto;"><?php echo $email_err; ?></span><br>
            <input type="email" name="email" value="" placeholder="Email">
          </div>
          <!-- PASSWORD -->
          <div class="data">
            <span id="err" style="color: red; margin-left: auto;"><?php echo $pwd_err; ?></span><br>
            <input type="password" name="password" value="" placeholder="Password">
          </div>
          <div class="data">
            <span id="err" style="color: red;" style="margin-left: auto;"><?php echo $conf_err; ?></span><br>
            <input type="password" name="conf_password" value="" placeholder="Confirm Password">
          </div>
          <!-- SUBMIT -->
          <div class="data-sub">
            <input type="submit" name="submit" value="submit"><br>
            <a href="log-in.php">Already have an account?</a>
          </div>
        </form>
      </div>
    </div>
    <section id="foot-sec">
      <?php
        include 'includes/footer.php';
       ?>
    </section>
  </body>
</html>
