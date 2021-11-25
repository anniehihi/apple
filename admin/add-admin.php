<?php
    include('partials/product.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST" >
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your password"></td>
                </tr>

                <tr>
                    <td>Rule: </td>
                    <td><input type="number" name="rule"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value ="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    include('partials/footer.php');
?>

<?php
    if(isset($_POST['submit'])){
        $full_name = $_POST['full_name'];    
        $username = $_POST['username'];    
        $password = md5($_POST['password']); 
        $rule = $_POST['rule'];
        
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username', 
            password = '$password', 
            rule = '$rule',
        ";

        // $conn = mysqli_connect('localhost', 'root', '') or die(mysql_error());
        // $db_connect = mysqli_select_db($conn, 'techone') or die(mysql_error());

        $res = mysqli_query($conn, $sql) or die(mysql_error());


        if($res==TRUE){
            $_SESSION['add'] = "Admin Added Successfully";
            header("location:" .SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = "Failed to Add Admin";
            header("location:" .SITEURL.'admin/add-admin.php');
        }
    }
    
?>
