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
    <title>Product</title>
  </head>
  <body>
    <section id="head">
      <?php
        include 'includes/user-head.php';
        include 'includes/lower-head.php';
       ?>
    </section>

    <section id="category">
      <?php
        include 'includes/category-sec.php';
      ?>
    </section>

    <section id="prod-sec">
      <?php

        include 'database.php';
        $product_id = $_GET['p'];

        $query = "SELECT * from product WHERE pid = $product_id";
        $run = mysqli_query($conn,$query);

        if (mysqli_num_rows($run) > 0) {

            $line = mysqli_fetch_assoc($run);
            $prod_name = $line['prod_name'];
            $prod_price = $line['prod_price'];
            $prod_img = $line['prod_image'];
            $prod_desc = $line['prod_desc'];
            $prod_cat = $line['cat_id'];

            echo "<div class='contain-prod'>
              <div class='product-view-cont row'>
                <div class='product-view-img col-'>
                  <img src='gallery/$prod_img' alt='$prod_name'>
                </div>
                <div class='product-details col-'>
                  <h3>$prod_name</h3>
                  <hr>
                    <div class='availability'>
                      <p>Availability:</p>
                      <p>In stock</p>
                    </div>

                    <div class='quan'>
                      <p>Quantity:</p>
                      <input type='number' name='quantity' min='1' value='' style='width: 50px; padding: 5px;'>
                    </div>
                    <div class='cost'>
                      <h4>R$prod_price</h4>
                      <a href='#'><i class='fas fa-heart'></i></a>
                      <a href='#'>Add to cart</a>
                    </div>
                    <div class='desc'>
                      <p>Description</p>
                      <hr>
                      <p>$prod_desc</p>
                    </div>
                </div>
              </div>
            </div>";
        }
        else {
          echo "No records have been selected";
        }
       ?>

       <!-- REV-SECTION -->
       <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#Leave-review" role="tab" aria-controls="Leave-reviews" aria-selected="true">Leave review</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
          </li>
        </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active"  id="Leave-review" role="tabpanel">
      <form class="" action="" method="post">
        <textarea name="comment" rows="8" cols="45" maxlength="300"></textarea><br>
        <input type="submit" name="review" value="Submit review">
      </form>

      <?php
        //  include 'database.php';
         if (isset($_POST['review'])) {


           $prod_rev = $_POST['comment'];
           trim($prod_rev);
          //  $product_id = $_GET['p'];

           if (!empty($prod_rev)) {

             $sql_quer = "INSERT INTO review (prod_id,review) VALUES('$product_id','$prod_rev');";
             $rev_query = mysqli_query($conn,$sql_quer);

             if ($rev_query) {
               echo "<script>Swal.fire({
                       icon: 'success',
                       title: 'Success',
                       text: 'Review successfully uploaded'
                     });</script>";
             }
             else if (!$rev_query){
              echo "<script>Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went Wrong'
                    });</script>";
            }

           }
           else{
            echo "<script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Field cannot be empty'
            });</script>";

           }
           


         }

       ?>
       <!-- <script>
       $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
        })
       </script> -->
    </div>

  <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
      <?php
         $review_query = "SELECT * from review WHERE prod_id = '$product_id'";
         $q = mysqli_query($conn,$review_query);
         $rev_line = mysqli_fetch_assoc($q);

         $review_id = $rev_line['rev_id'];
         $category_id = $rev_line['cat_id'];
         $review = $rev_line['review'];

       ?>
       <div class="cust-review">
         <p><?php echo "$review"; ?></p>
       </div>

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
