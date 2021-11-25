<?php
    include('partials/product.php');
?>

        <!-- Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASBOARD</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
                <div class="col">
                    <div class="col-4 text-center">

                        <?php
                            // Sql query
                            $sql = "SELECT * FROM tbl_category";

                            // Excute query
                            $res = mysqli_query($conn, $sql); 

                            // Count rows
                            $count = mysqli_num_rows($res);
                        ?>

                        <h1><?php echo $count; ?></h1>
                        <br>
                        Categories
                    </div>

                    <div class="col-4 text-center">
                        <?php
                            // Sql query
                            $sql2 = "SELECT * FROM tbl_staff";

                            // Excute query
                            $res2 = mysqli_query($conn, $sql2); 

                            // Count rows
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <h1><?php echo $count2; ?></h1>
                        <br>
                        Staff
                    </div>

                    <div class="col-4 text-center">
                        <?php
                            // Sql query
                            $sql3 = "SELECT * FROM tbl_product";

                            // Excute query
                            $res3 = mysqli_query($conn, $sql3); 

                            // Count rows
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <h1><?php echo $count3; ?></h1>
                        <br>
                        Products
                    </div>

                    <div class="col-4 text-center">
                    <?php
                            // Sql query
                            $sql4 = "SELECT * FROM tbl_oder";

                            // Excute query
                            $res4 = mysqli_query($conn, $sql4); 

                            // Count rows
                            $count4 = mysqli_num_rows($res4);
                        ?>
                        <h1><?php echo $count4; ?></h1>
                        <br>
                        Total Oder
                    </div>

                    <div class="col-4 text-center">
                    <?php
                            // Sql query
                            $sql5 = "SELECT SUM(total) AS Total FROM tbl_oder WHERE status='Delivered'";

                            // Excute query
                            $res5 = mysqli_query($conn, $sql5); 

                            // get the value
                            $row5 = mysqli_fetch_assoc($res5);

                            $total_revenue = $row5['Total'];
                        ?>
                        <h1><?php echo $total_revenue; ?></h1>
                        <br>
                        Revenue Generated
                    </div>
                </div>
            </div>
        </div>

  <?php
    include('partials/footer.php');
  ?>