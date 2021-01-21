<!DOCTYPE html>
<html lang="en">
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
    <title>Log-in</title>
</head>
<body>
<section id="head">
      <?php
        include 'includes/user-head.php';
        include 'includes/lower-head.php';

        include 'database.php';
        $mail_err = $pwd_err = ""; 
    
        if(isset($_POST['Login'])){
    
            // Make sure both fields are not empty
             if(empty($_POST['email'])){
                $mail_err = "Field required!";
             }
             else{
                $email = $_POST['email'];
             }
    
             if(empty($_POST['password'])){
                $pwd_err = "Field required!";
             }
             else{
                $pwd = $_POST['password'];
             }
    
    
            //  If fields are not empty, check for user details
             if(!empty($email) && !empty($pwd)){
                // check for user details
                $emailSql = "SELECT * from customer WHERE email = '$email'";
                $mailRun = mysqli_query($conn,$emailSql);
                $count = mysqli_num_rows($mailRun);
                
        
    
                if ($count == 1){
    
                    $line = mysqli_fetch_assoc($mailRun);
                    $user_pwd = $line['pwd'];
                    $user_name = $line['user_name'];
                    $user_mail = $line['email'];
                    $user_id = $line['user_id'];

                    if($pwd == $user_pwd){
                        echo "<script>alert('Successfully loged in');</script>";
                        session_start();
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['last_name'] = $lastname;
                        $_SESSION['email'] = $email;
                        header('location: index.php');
                    }
                    else{
                        echo "<script>alert('Password field invalid');</script>";
                    }
                    
                }else{
                    echo"<script>alert('You entered an invalid email address');</script>";
                }
             }
            
        }
       ?>
    </section>
    <div class="form-container row">
      <div class="sign-cont col-">
        <h3>Login</h3>
        <form method="post">
          <!-- EMAIL ADDRESS -->
          <div class="data">
            <span id="err" style="color: red; margin-left: auto;"><?php echo $mail_err; ?></span><br>
            <input type="email" name="email" value="" placeholder="Email">
          </div>
          <!-- PASSWORD -->
          <div class="data">
          <!-- <?php echo $pwd_err; ?> -->
            <span id="err" style="color: red; margin-left: auto;"><?php echo $pwd_err; ?></span><br>
            <input type="password" name="password" value="" placeholder="Password">
          </div>
          <!-- SUBMIT -->
          <div class="data-sub">
            <input type="submit" name="Login" value="Login"><br>
            <a href="Sign-up.php">Don't have an account?</a><br>
            <a href="#">Forgot password?</a>
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