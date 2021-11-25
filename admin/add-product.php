<?php include('partials/product.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>

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

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Product">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Product"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>

                            <!-- <option value="1">iPhone</option>
                            <option value="2">iPad</option>
                            <option value="3">Macbook</option>
                            <option value="4">iMac</option>
                            <option value="5">Apple Watch</option> -->
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        
        ob_start();
            if(isset($_POST['submit']))
            {
                // echo "oke";
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price']; 
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured']; 
                }else{
                    $featured = "No";
                }

                if(isset($_POST['active'])){
                    $active = $_POST['active']; 
                }else{
                    $active = "No";
                }

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name!= ""){
                        $ex = explode('.', $image_name);
                        $ext = end($ex);

                        $image_name = "Product-Name-".rand(0000,9999).".".$ext;

                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../img/product/".$image_name;

                        $upload = move_uploaded_file($src,$dst);

                        if($upload==false){
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-product.php');
                            die();
                        }
                    }
                }else{
                    $image_name = "";
                }
                $sql7 = "INSERT INTO tbl_product SET
                    title = '$title', 
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                $res7 = mysqli_query($conn, $sql7);

                if($res7==true){
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully</div>";
                    // header('location:'.SITEURL.'admin/manage-product.php');
                }else{
                    $_SESSION['add'] = "<div class='error'>Failed to Add Product.</div>";
                    header('location:'.SITEURL.'admin/manage-product.php');
                }

            }
            ob_end_flush();
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>