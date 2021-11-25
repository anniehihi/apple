<?php
    include('partials/product.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Staff</h1>
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

                    if(isset($_SESSION['no-staff-found'])){
                        echo $_SESSION['no-staff-found'];
                        unset($_SESSION['no-staff-found']);
                    }

                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['failed-remove'])){
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                ?>

        <br><br>

        <a href="<?php echo SITEURL; ?>admin/add-staff.php" class="btn-primary">Add Staff</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_staff"; 

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res); 

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id']; 
                        $name = $row['name']; 
                        $age = $row['age']; 
                        $address = $row['address']; 
                        $email = $row['email']; 
                        $phone = $row['phone']; 
                        $image_name = $row['image_name'];

                        $sn = 1;
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $age; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php
                                        if($image_name==""){
                                            echo "<div class='error'>Image not Added</div>";
                                        }else{
                                            ?>
                                            <img src="<?php echo SITEURL; ?>img/staff/<?php echo $image_name; ?>" width = 200px>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-staff.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-staff.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Staff Added.</div></td>
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