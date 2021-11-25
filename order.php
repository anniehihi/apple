<?php   include('partials-front/menu.php');  ?>


<?php
  if(isset($_GET['product_id']))
  {
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM tbl_product WHERE id = $product_id"; 

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res); 

    if($count==1){
      $row = mysqli_fetch_assoc($res); 
      $title = $row['title']; 
      $price = $row['price']; 
      $image_name = $row['image_name'];
    }else{
      header('location:'.SITEURL.'danhmuc.php');
    }
  }
  else
  {
    header('location:'.SITEURL.'danhmuc.php');
  }
?>

<?php
    if(isset($_SESSION['order'])){
      echo $_SESSION['order'];
      unset($_SESSION['order']);
    }
?>

<section class="product-search">
        <div class="container-order">
            
            <h2 class="text-center">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Apple</legend>
                    <div class="box">
                        <div class="food-menu-img">
                            <?php
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="selected-imgage" width="200px"> 
                                    <?php
                                }
                            ?>
                        </div>
        
                        <div class="food-menu-desc">
                            <h3><?php echo $title; ?></h3>
                            <input type="hidden" name="product" value="<?php echo $title; ?>">

                            <p class="food-price">$ <?php echo $price?></p>
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Nguyen Van Toan" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. toannn21@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn">
                </fieldset>

            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $product = $_POST['product']; 
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; 

                    $order_date = date("Y-m-d h:i:sa"); 

                    $status = "Ordered"; 

                    $customer_name = $_POST['full-name']; 
                    $customer_concat = $_POST['contact']; 
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql9 = "INSERT INTO tbl_oder(product, price, qty, total, oder_date, status, customer_name, customer_concat, customer_email, customer_address) VALUES ('".$product."', '".$price."', '".$qty."', '".$total."', '".$order_date."', '".$status."', '".$customer_name."', '".$customer_concat."', '".$customer_email."', '".$customer_address."')";

                    $res9 = mysqli_query($conn, $sql9); 

                    if($res9 == true){
                        $_SESSION['order'] = "<div class='success'>Product Order Successfully</div>";
                        // header("location:".SITEURL.'danhmuc.php');
                    }else{
                        $_SESSION['order'] = "<div class='error'>Failed to Order Product</div>";
                        header('location:'.SITEURL);
                    }
                   
                }
            ?>

        </div>
    </section>

    <?php   include('partials-front/footer.php');  ?>