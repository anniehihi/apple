<?php
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // echo  "oke";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../img/staff/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Staff Image </div>";
                header('location:'.SITEURL.'admin/manage-staff.php');
                die();
            }
        }
        $sql = "DELETE FROM tbl_staff WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Staff delete Successfully</div>";
            header("location:".SITEURL.'admin/manage-staff.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Staff</div>";
            header("location:".SITEURL.'admin/manage-staff.php');
        }
    }
    else
    {
        header("location:".SITEURL.'admin/manage-staff.php');
    }
?>