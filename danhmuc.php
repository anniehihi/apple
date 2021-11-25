<?php
  include('partials-front/menu.php'); 
?>

<?php
  if(isset($_GET['category_id']))
  {
    $category_id = $_GET['category_id'];

    $sql10 = "SELECT title FROM tbl_category WHERE id = $category_id"; 

    $res10 = mysqli_query($conn, $sql10);

    $row = mysqli_fetch_assoc($res10); 

    $category_title = $row['title'];

  }
  else
  {
    header('location:'.SITEURL.'index.php');
  }
?>

<div class="product-heading"><?php echo $category_title; ?></div>
<section class="product">

<?php

          $sql = "SELECT * FROM tbl_product WHERE category_id=$category_id";

          $res= mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if($count>0)
          {
            while($row=mysqli_fetch_assoc($res)){
              $id = $row['id']; 
              $title = $row['title']; 
              $price = $row['price']; 
              $image_name = $row['image_name'];

              ?>
                  <div class="product-container">
                    <div class="product-box">
                      <?php
                        if($image_name=="")
                        {
                          echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                          ?>
                            <a href="<?php echo SITEURL; ?>chitiet.php?product_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" alt="" class="product-img" /></a>
                          <?php
                        }
                      ?>
                      <p class="product-name"><?php echo $title; ?></p>
                      <p class="product-price">Price: $<?php echo $price; ?></p>
                      <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="buy">Buy Now</a> 
                      <a href="<?php echo SITEURL; ?>cart.php?product_id=<?php echo $id; ?>" class="buy">Add Cart</a>
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
        

    </section>


<?php
  include('partials-front/footer.php');
?>
