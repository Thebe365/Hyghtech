<?php
   include 'database.php';

?>

<!doctype html>
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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- OWL CAROUSEL CSS-->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

    <style>
    .img-cont{
      background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url("gallery/hector-martinez-EG49vTtKdvI-unsplash.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      width: 350px;
      height:35vh;
      margin: 20px;
    }
    .phone{
      background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url("gallery/daniel-romero.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      width: 350px;
      height:35vh;
      margin: 20px;
    }
    .gaming{
      background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url("gallery/norbert-levajsics-dUx0gwLbhzs-unsplash.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      width: 350px;
      height:35vh;
      margin: 20px;
    }
    .cat2-cont{
      background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),url("gallery/ady-teenagerinro-sQ0xXxQdfeY-unsplash.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      border: 1px solid #888888;
      width: 100%;
      margin: 20px;
    }

    </style>
    <title>Hyghtech</title>
  </head>
  <body>
    
    <?php
      include 'includes/user-head.php';
      include 'includes/lower-head.php';
     ?>

     <!------------------- IMAGE CAROUSEL ------------------>
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="gallery/tamas-pap-xjKjHHZVmKQ-unsplash.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="gallery/fabian-albert--yePUylDPJQ-unsplash.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="gallery/luis-cortes-28jE7Ul1L8I-unsplash.jpg" class="d-block w-100" alt="...">
    </div>
    <div id="cap" class="carousel-caption d-none d-md-block">
      <h3>FREE FOR FIRST DELIVERY</h3>
      <p>Sign up today and get free delivery on your first order</p>
      <a href="#">Shop</a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

     <!--------------------- CATEGORY ---------------------->
     <div class="category">
       <h3>SHOP BY CATEGORY</h3>
     </div>
    <div class="cont row">
      <div class="img-cont col-">
          <h3>ACCESSORIES</h3>
          <div class="shop">
            <a href='product-category.php?c=1'>Shop</a>
          </div>
      </div>

      <div class="phone col-">
          <h3>MOBILE PHONES</h3>
          <div class="shop">
            <a href="product-category.php?c=2">Shop</a>
          </div>
      </div>

      <div class="gaming col-">
          <h3>GAMING</h3>
          <div class="shop">
            <a href="product-category.php?c=3">Shop</a>
          </div>
      </div>
    </div>

    <div class="cat2 row">
      <div class="cat2-cont col-md-10">
        <h3>SHOP BY CATEGORY</h3>
        <a href="#">Shop</a>
      </div>
    </div>
    <!-------------------products (NEW ARIVALS) ----------------->

    <div class="cont-for-prod">
      <h3>New arrivals</h3>
      <div class="prod-cont owl-carousel owl-theme row">
        <?php
          // PRODUCT LOOP
         
          $query = "SELECT * from product";
          $run = mysqli_query($conn,$query);

          if (mysqli_num_rows($run) > 0) {

            while ($line = mysqli_fetch_array($run)) {

              $prod_id = $line['pid'];
              $prod_name = $line['prod_name'];
              $prod_price = $line['prod_price'];
              $prod_img = $line['prod_image'];

              echo "<div class='product item col-'>
                  <div class='prod-img'>
                      <a href='product.php?p=$prod_id'><img src='gallery/$prod_img'></a>
                  </div>
                  <div class='prod-info'>
                    <div class='top-info'>
                        <a href='#'><p>$prod_name</p></a>
                          <p>R$prod_price</p>
                    </div>
                    <div class='bottom-info'>
                      <a href='#'>Add to cart</a>
                      <a href='#'><i class='fas fa-heart'></i></a>
                    </div>
                  </div>
                </div>";
            }
          }
         ?>

      </div>
    </div>

    <!--------------- ON SALE ------------------------>
    <div class="contain">
      <h3>Gaming</h3>
      <div class="prod-cont owl-carousel owl-theme row">
        <?php
          // PRODUCT LOOP
         

          $query = "SELECT * from product where cat_id = 3";
          $run = mysqli_query($conn,$query);

          if (mysqli_num_rows($run) > 0) {

            while ($line = mysqli_fetch_array($run)) {

              $prod_id = $line['pid'];
              $prod_name = $line['prod_name'];
              $prod_price = $line['prod_price'];
              $prod_img = $line['prod_image'];

              echo "<div class='product item col-'>
                  <div class='prod-img'>
                      <a href='product.php?p=$prod_id'><img src='gallery/$prod_img'></a>
                  </div>
                  <div class='prod-info'>
                    <div class='top-info'>
                        <a href='#'><p>$prod_name</p></a>
                          <p>R$prod_price</p>
                    </div>
                    <div class='bottom-info'>
                      <a href='#'>Add to cart</a>
                      <a href='#'><i class='fas fa-heart'></i></a>
                    </div>
                  </div>
                </div>";
            }
          }
         ?>

      </div>
    </div>


<?php
  include 'includes/footer.php';
 ?>



    <!-----------------------JQUERY------------------------>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL JS -->
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="owlcarousel/main.js"></script>
  </body>
</html>
