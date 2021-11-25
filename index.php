<?php
  include('partials-front/menu.php'); 
?>


<main>
      <section class="section-iphone">
        <div class="section-iphone-text">
          <h1 class="heading-primary">iPhone 12</h1>
          <p class="heading-extra">Blast past fast</p>
          <p class="iphone-description">
            From $29.12/mo. for 24 mo. or $699 before trade-in<br />Buy directly
            from Apple with special carrier offers
          </p>
          <a href="chitiet.php" class="btn btn--full">Buy Now</a>
          <a href="#" class="btn btn--optional">Learn More</a>
        </div>
        <div class="section-iphone-img">
          <img src="./img/iphone.webp" alt="iphone 12" class="iphone-img" />
        </div>
      </section>
    <div class="category">
      <?php
          $sql = "SELECT * FROM tbl_category";

          $res= mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if($count>0)
          {
            while($row=mysqli_fetch_assoc($res)){
              $id = $row['id']; 
              $title = $row['title']; 
              $image_name = $row['image_name'];

              ?>
                  <div class="category-container">
                    <div class="container-box">
                      <?php
                        if($image_name=="")
                        {
                          echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                          ?>
                          <a href="<?php echo SITEURL; ?>danhmuc.php?category_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>" alt="" class="category-image" /></a>
                          <?php
                        }
                      ?>
                      <p class="category-name"><?php echo $title; ?></p>
                      <!-- <a href="" class="learn-more">Learn More</a>  -->
                    </div>
                  </div>
              <?php
            }
          }
          else
          {
            echo "<div class='error'>Category not Added</div>";
          }
      ?>
    </div>


      <!-- <div class="category-container">
        <div class="container-box">
          <img src="./img/ipad.png" alt="" class="category-image" />
          <p class="category-name">iPad</p>
        </div>
      </div>

      <div class="category-container">
        <div class="container-box">
          <img src="./img/Mac-1-300x300.png" alt="" class="category-image" />
          <p class="category-name">Mac</p>
        </div>
      </div>

      <div class="category-container">
        <div class="container-box">
          <img src="./img/Watch-1-300x300.png" alt="" class="category-image" />
          <p class="category-name">Apple Watch</p>
        </div>
      </div>

      <div class="category-container">
        <div class="container-box">
          <img
            src="./img/AirPods-Max-300x300.png"
            alt=""
            class="category-image"
          />
          <p class="category-name">AirPods</p>
        </div>
      </div>

      <div class="category-container">
        <div class="container-box">
          <img
            src="./img/Phụ-kiện-1-300x300.png"
            alt=""
            class="category-image"
          />
          <p class="category-name">Accessory</p>
        </div>
      </div>
    </div> -->
  </main>

<?php
  include('partials-front/footer.php');
?>
