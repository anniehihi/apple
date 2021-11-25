<?php
    include('../config/constants.php');
?>
<?php
    $output = "";
    if(isset($_POST['export_exel'])){
        $sql = "SELECT * FROM tbl_oder ORDER BY id DESC"; 
         
        $res = mysqli_query($conn, $sql); 

        if(mysqli_num_rows($res) > 0){
            $output .= '
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
            ';
            while($row = mysqli_fetch_array($res)){
                $output .= '
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['product'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['qty'].'</td>
                        <td>'.$row['total'].'</td>
                        <td>'.$row['oder_date'].'</td>
                        <td>'.$row['status'].'</td>
                        <td>'.$row['customer_name'].'</td>
                        <td>'.$row['customer_concat'].'</td>
                        <td>'.$row['customer_email'].'</td>
                        <td>'.$row['customer_address'].'</td>
                    </tr>
                ';                
            }
            $output .= '</table>';
            header("Content-Type: application/xls"); 
            header("Content-Disposition:attachment; filename=download.xls"); 
            echo $output;
        }
    }
?>