<?php
  include('partials-front/menu.php'); 
?>
<style>
    .cart-container{
        max-width: 1000px;
        margin: 0 auto;
    }
    .title{
        font-size:30px;
    }
    .container-box{
        display: flex;
        justify-content: space-between;
        border: 1px solid black;
        padding: 10px
    }
    .cart-image{
        width: 150px;
    }
    .product-cart{
        display:flex;
        flex-direction: column;
        gap: 30px;
    }
    .title-product{
        font-size: 18px;
        font-weight: bold;
    }
    .name-product,
    .price-cart,
    .total-price-product{
        font-size: 16px;
        font-weight: bold;
    }
    .input-responsive{
        width: 70px;
        outline: none;
    }
    .title{
        text-align: center;
        margin-bottom: 30px;
    }
</style>


<body>
<h1 class="title">Cart</h1>
<section class="cart-container">
    <div class="container-box">
        <?php
            if($image_name=="")
            {
                echo "<div class='error'>Image not Available</div>";
            }
            else
            {
                ?>
                <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="selected-imgage" width="150px"> 
                <?php
            }
        ?>
        <div class="product-cart">
            <p class="title-product">
                Product
            </p>
            <p class="name-product">
                <?php echo $title; ?>
            </p>
        </div>
        <div class="product-cart">
            <p class="title-product">
                Price
            </p>
            <p class="price-cart">
                <?php echo $price; ?>
            </p>
        </div>
        <div class="product-cart">
            <p class="title-product">
                Quantity
            </p>
            <input type="number" name="qty" class="input-responsive" value="1" required>
        </div>
        <div class="product-cart">
            <p class="title-product">
                Total Money
            </p>
            <p class="total-price-product">
                $899
            </p>
        </div>
    </div>
</section>
</body>
<?php
  include('partials-front/footer.php'); 
?>