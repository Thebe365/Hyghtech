<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="gallery/logo.png" sizes="450x450">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- stylesheet -->
    <link rel="stylesheet" href="prettyShit/tstyle.css">
    <link rel="stylesheet" href="prettyShit/profile.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- OWL CAROUSEL CSS-->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <title>Profile</title>
</head>
<body>
    <style>
        .prof-container{
        width: 100%;
        margin: 10px;
        height: 70vh;
        }

        h3{
        letter-spacing: 3px;
        text-align: center;
        }

        .user-item{
            border: 1px solid black;
            margin: 15px;
        }
        .prof-row{
            display: flex;
            justify-content: center;

        }

        .prof-container h3{
            margin: 30px;
        }

        a{
            text-decoration: none;
            color: black;
            
        }

    </style>
    <?php
        include "includes/user-head.php";
        include "includes/lower-head.php";
    ?>
    <div class="prof-container">
        <h3>PROFILE</h3>
        <div class="prof-row row">
            <div class="user-item col-">
                <h3><<?php if(isset($_SESSION['user_name']))
                {
                    echo "a href='user.php'";
                }else
                {
                    echo "a href='log-in.php'";
                }?>>DETAILS</a></h3>
            </div>
            <div class="user-item col-">
                <h3><<?php if(isset($_SESSION['user_name']))
                {
                    echo "a href='user.php'";
                }else
                {
                    echo "a href='log-in.php'";
                }?>>ORDERS</a></h3>
            </div>
            <div class="user-item col-">
                <h3><<?php if(isset($_SESSION['user_name']))
                {
                    echo "a href='user.php'";
                }else
                {
                    echo "a href='log-in.php'";
                }?>>SHIPPING</a></h3>
            </div>
        </div>
    </div>
    
<?php
include 'includes/footer.php';
?>
    
</body>
</html>