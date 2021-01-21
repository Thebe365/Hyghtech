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

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- OWL CAROUSEL CSS-->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <title>product-category</title>
  </head>
  <body>
    <section id="head">
      <?php
        include 'includes/user-head.php';
        include 'includes/lower-head.php';
       ?>
    </section>
    <section id='category'>
      <?php
        include 'includes/category-sec.php';
       ?>
    </section>
    <!----------------------PRODUCT SECTION ------------------>

    <section id="prod-sec">
      <div class="banner">
        <?php
          include 'database.php';
          $categ = $_GET['c'];
          $sql_query1 = "SELECT * from category WHERE cat_id = $categ";
          $run_it1 = mysqli_query($conn,$sql_query1);

          if ($run_it1) {
            $line = mysqli_fetch_assoc($run_it1);
            $banner_img = $line['cat_name'];
            echo "<div class='img-banner'>
              <h2>$banner_img</h2>
            </div>";
          }
         ?>
      </div>

      <!-------------- PRODUCT DISPLAY ---------------->

      <style>
        .prod_desc-display-cont{
          display: flex;
          justify-content: center;
        }
      </style>
      <div class="prod-display-cont">
      <div class="prod-display row">
      <?php
        $sql_query2 = "SELECT * from product WHERE cat_id = $categ";
        $run_it2 = mysqli_query($conn,$sql_query2);

        if (mysqli_num_rows($run_it2) > 0) {
          while ($line2 = mysqli_fetch_array($run_it2)) {
            $pid = $line2['pid'];
            $prod_image = $line2['prod_image'];
            $prod_name = $line2['prod_name'];
            $prod_price = $line2['prod_price'];

            echo "<div class='product col-'>
                <div class='prod-img'>
                    <a href='product.php?p=$pid'><img src='gallery/$prod_image'></a>
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
        else {
          echo "<div class='empty-cont'>
            <div class='empty'>
              <h2>No products to display, Sorry.</h2>
            </div>
          </div>";
        }
       ?>

        </div>
      </div>
    </section>
    <section id="foot-sec">
      <?php
        include 'includes/footer.php';
       ?>
    </section>
  </body>
</html>
