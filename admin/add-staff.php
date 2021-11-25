<?php include('partials/product.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?> 
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" >
                    </td>
                </tr>

                <tr>
                    <td>Age: </td>
                    <td>
                        <input type="text" name="age" >
                    </td>
                </tr>

                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" >
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" >
                    </td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="tel" name="phone" >
                    </td>
                </tr>


                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Catedory" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];


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
                            header("location:" .SITEURL.'admin/add-staff.php');
                            die();
                        }
                }
                }else{
                    $image_name = "";
                }             

                // print_r($_FILES['image']);

                // die();

                $sql5 = "INSERT INTO tbl_staff SET
                    name = '$name',
                    age = '$age',
                    address = '$address',
                    email = '$email',
                    phone = '$phone',
                    image_name='$image_name'
                ";

                $res5 = mysqli_query($conn, $sql5);

                if($res5==true){
                    $_SESSION['add'] = "<div class='success'> Staff Added Successfully. </div>";
                    header('location:'.SITEURL.'admin/manage-staff.php');
                }else{
                    $_SESSION['add'] = "<div class='error'> Failes to Add Staff</div>";
                    header('location:'.SITEURL.'admin/manage-staff.php');
                }

            }

         ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>