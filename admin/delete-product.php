<?php
    // echo "oke";
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // echo "oke";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../img/product/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Product Image </div>";
                header('location:'.SITEURL.'admin/manage-product.php');
                die();
            }
        }
        $sql = "DELETE FROM tbl_product WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Product delete Successfully</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Product</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-product.php');
    }
?>



