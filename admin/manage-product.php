<?php
    include('partials/product.php');
?>
        <!-- Menu section end -->

        <!-- Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Product</h1>
                <br>

                <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>
                <br>
                <br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }


                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['failed-remove'])){
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $sql = "SELECT *FROM tbl_product";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res); 

                        $sn = 1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];



                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        <td>
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image not Added</div>";
                                                }else{
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" width = "150px">
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Product</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete Product</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="7"><div class="error">No Product Added.</div></td>
                            </tr>
                            <?php
                        }
                    ?>



                </table>

            </div>
        </div>

<?php
    include('partials/footer.php');
?>