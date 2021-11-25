<?php
    include('partials/product.php');
?>
        <!-- Menu section end -->

        <!-- Main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Order</h1>
                <br>

                <form action="exel.php" method="POST">
                    <input type="submit" name="export_exel" class="btn-secondary" value="Export">
                </form>

                <br>
                <br>

                <?php
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>QTY.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM tbl_oder ORDER BY id DESC"; 

                        $res = mysqli_query($conn, $sql); 

                        $count = mysqli_num_rows($res); 
                        
                        $sn=1; 
                        if($count >0){
                            while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id']; 
                                $product = $row['product']; 
                                $price = $row['price']; 
                                $qty = $row['qty']; 
                                $total = $row['total']; 
                                $oder_date = $row['oder_date']; 
                                $status = $row['status']; 
                                $customer_name = $row['customer_name']; 
                                $customer_contact = $row['customer_concat'];
                                $customer_email = $row['customer_email'];  
                                $customer_address = $row['customer_address']; 

                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $product; ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $oder_date; ?></td>
                                        <td>
                                            <?php
                                                if($status=="Ordered"){
                                                    echo "<label>$status</label>"; 
                                                }elseif($status=="On Delivery"){
                                                    echo "<label style='color: orange'>$status</label>"; 
                                                }elseif($status=="Delivered"){
                                                    echo "<label style='color: green'>$status</label>"; 
                                                }elseif($status=="Cancelled"){
                                                    echo "<label style='color: red'>$status</label>"; 
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>



                </table>

            </div>
        </div>

<?php
    include('partials/footer.php');
?>