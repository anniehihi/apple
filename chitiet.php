<?php
  include('partials-front/menu.php'); 
?>

<head>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/chitiet.css">
</head>

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

    <section class="instruction">
      <a href="#" class="instruction-name">Home</a>
      <span class="delimiter">&nbsp; / &nbsp;</span>
      <a href="#" class="instruction-name">Shop</a>
      <span class="delimiter">&nbsp; / &nbsp;</span>
      <a href="#" class="instruction-name"><?php echo $title; ?></a>
    </section>

    <section class="product">
    <?php
      if($image_name=="")
      {
          echo "<div class='error'>Image not Available</div>";
      }
      else
      {
          ?>
          <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="selected-imgage" width="350px" style="margin-top: 20px;"> 
          <?php
      }
     ?>
      <div class="details-product">
        <h1 class="product-name" style="text-align:left;"><?php echo $title; ?></h1>
        <p class="product-message" style="text-align:left;">Price only from: $<?php echo $price; ?></p>
        <a href="#" class="button-link" style="text-align:left; font-size: 20px">See how trade-in works</a>
        <p class="product-selection" style="text-align:left; font-size: 20px">Choose your model</p>
        <a href="#" class="select-model" style="text-align:left; font-size: 20px">Which model is right for you?</a>
        <div class="selector mini">
            <div class="container">
                <div class="selection-name" style="font-size: 20px;"><?php echo $title ?></div>
                <div class="selection-price" style="font-size: 20px;">From $<?php echo $price; ?><br>or $24.95/mo.<br>before trade-in</div>
            </div>
        </div>

        <!-- <div class="memory" style="text-align:left;">
          <p class="heading-memory">RAM: 8GB</p>
          <div class="memory-box">
            <a href="" class="memory-8">8GB</a>
            <a href="" class="memory-16">16GB</a>
          </div>
        </div>

        <div class="capacity" style="text-align:left;">
          <p class="heading-capacity">Capacity: 256GB</p>
          <a href="" class="capacity-128">128GB</a>
          <a href="" class="capacity-256">256GB</a>
          <a href="" class="capacity-512">512GB</a>
        </div> -->

        <!-- <div class="product-color">
          <div class="color color-purple">
              <img src="./img/mau1.jpg" alt="" class="purple">
              <h6 class="name-color">Blue</h6>
          </div>

          <div class="color color-midnight">
              <img src="./img/mau2.jpg" alt="" class="black">
              <h6 class="name-color">Midnight</h6>
          </div>

          <div class="color color-pink">
              <img src="./img/mau3.jpg" alt="" class="pink">
              <h6 class="name-color">Pink</h6>
          </div>

          <div class="color color-red">
              <img src="./img/mau4.jpg" alt="" class="red">
              <h6 class="name-color">Red</h6>
          </div>

          <div class="color color-white">
              <img src="./img/mau5.jpg" alt="" class="white">
              <h6 class="name-color">Starlight</h6>
          </div>
        </div> -->
      </div>
    </section>

    <section class="what-this">
      <h2 class="what-heading">What is this box</h2>
      <div class="what-image">
      <?php
      if($image_name=="")
      {
          echo "<div class='error'>Image not Available</div>";
      }
      else
      {
          ?>
          <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="selected-imgage" width="350px" style="margin-top: 20px;"> 
          <?php
      }
     ?>
      <img src="./img/iphone-12-cable-witb-2020.jpg" alt="">
      </div>
      <div class="what-info">
        <p class="info">As part of our efforts to reach our environmental goals, <?php echo $title; ?> do not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning Cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.</p>
        <p class="info">We encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones, which are compatible with these iPhone models. But if you need any new Apple power adapters or headphones, they are available for purchase.</p>
      </div>
    </section>

    <!-- Slideshow container -->



  </body>

  <script src="./js/chitiet.js"></script>
</html>
<?php
  include('partials-front/footer.php');
?>