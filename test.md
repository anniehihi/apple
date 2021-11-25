
<?php
    if(isset($_POST['submit'])){
        include('lib/PHPMailerAutoload.php');
        $mail             = new PHPMailer();
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'toannn21@gmail.com';                     //SMTP username
        $mail->Password   = '21122001aA';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->isHTML(true);   
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($_POST['email'], 'Joe User');
        $mail->Subject = $_POST['fullname'];
        $mail->Body    = $_POST['address'];        
        if($mail->send()){
            echo 'Message could not be sent ';
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }else{
            echo 'Message has been sent';
        }
    }
?>


 $mail = new PHPMailer(true);  
                    try{
                        $mail->SMTPDebug = 2;  
                        $mail->isSMTP();   
                        $mail->Host       = 'localhost';  
                        // $mail->SMTPAuth   = false;     
                        $mail->Username   = 'toannn21@gmail.com';                     //SMTP username
                        $mail->Password   = '21122001';     
                        $mail->SMTPAuth = false; 
                        $mail->SMTPSecure = false;
                        $mail->SMTPAutoTLS = false;       //Enable implicit TLS encryption
                        // $mail->Port       = 80;     

                        $mail->setFrom('from@example.com', 'Shopping');
                        $mail->addAddress($_POST['email'], $_POST['full-name']);

                        $mail->isHTML(true);  
                        $mail->Subject = 'Cam on b da mua hang';
                        $mail->Body    = 'Noi dung mua hang';

                        $mail->send();
                            echo 'Thanh cong';
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    
<?php
    include('./PHPMailer-master/src/PHPMailer.php');
    include('./PHPMailer-master/src/Exception.php');
    include('./PHPMailer-master/src/OAuth.php');
    include('./PHPMailer-master/src/POP3.php');
    include('./PHPMailer-master/src/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>