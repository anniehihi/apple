<?php include('partials/product.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Staff</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                // echo "getting data";
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_staff WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $name = $row['name'];
                    $age = $row['age'];
                    $address = $row['address'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $current_image = $row['image_name'];
                }
                else
                {
                    $_SESSION['no-staff-found'] = "<div class='error'>Category not Found</div>";
                    header("location:".SITEURL.'admin/manage-category.php');
                }
            } 
            else
            {
                header("location:".SITEURL.'admin/manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Age: </td>
                    <td>
                        <input type="text" name="age" value="<?php echo $age; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="number" name="phone" value="<?php echo $phone; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>img/staff/<?php echo $current_image; ?>" width = "200px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Image not added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Staff" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                // echo "oe";
                $id = $_POST['id'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $current_image = $_POST['current_image'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != ""){
                        $ext = end(explode('.', $image_name));

                        $image_name = "Staff_".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../img/staff/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload == false){
                            $_SESSION['upload'] = "<div class='error'> Failes to Upload Image</div>";
                            header("location:" .SITEURL.'admin/manage-staff.php');
                            die();
                        }

                        if($current_image !=""){
                            $remove_path = "../img/staff/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove == false){
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image</div>";
                                header('location:'.SITEURL.'admin/staff.php');
                                die();
                            }
                        }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql2 = " UPDATE tbl_staff SET
                    name = '$name',
                    age = '$age',
                    address = '$address',
                    email = '$email',
                    phone = '$phone',
                    image_name = '$image_name'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){
                    $_SESSION['update'] = "<div class='success'>Staff Update Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-staff.php');
                }
                else{
                    $_SESSION['update'] = "<div class='error'>Failed to Update Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-staff.php');
                }
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
