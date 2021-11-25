<?php
  include('partials-front/menu.php'); 
?>
<?php
    $search = $_POST['search'];
?>
<h1 class="product-heading">Apple on Your Search "<?php echo $search; ?>"</h1>
<section class="product">
<?php
    $search = $_POST['search']; 

    $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%'";

    $res = mysqli_query($conn, $sql); 

    $count = mysqli_num_rows($res);

    if($count>0)
    {
        while($row = mysqli_fetch_assoc($res)){
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
                            <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" alt="" class="product-img" />
                          <?php
                        }
                      ?>
                      <p class="product-name"><?php echo $title; ?></p>
                      <p class="product-price">Price: $<?php echo $price; ?></p>
                      <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="buy">Buy</a> 
                    </div>
                  </div>
            <?php
        }
    }
    else {
        echo "<div class='error'>Apple not Found.</div>";
    }
?>

</section>

<?php
  include('partials-front/footer.php'); 
?>