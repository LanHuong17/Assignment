<?php
          require "PHPMailer-master/src/PHPMailer.php";  
          require "PHPMailer-master/src/SMTP.php"; 
          require 'PHPMailer-master/src/Exception.php'; 
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);  
            try {
              
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  
                $mail->SMTPAuth = true; 
		    $nguoigui = 'ngolequanvh@gmail.com';
		    $matkhau = 'abcdef';
 
		    $tennguoigui = 'Nhập tên người gửi';
                $mail->Username = $nguoigui;
                $mail->Password = $matkhau;  
                $mail->SMTPSecure = 'ssl'; 
                $mail->Port = 465;               
                $mail->setFrom($nguoigui, $tennguoigui ); 
                $to = "ngolequanit@gmail.com";
                $to_name = "lequan";
                
                $mail->addAddress($to, $to_name); 
                $mail->isHTML(true);  
                $mail->Subject = 'Gửi thư từ php';      
                $noidungthu = "<b>Chào bạn!</b><br>Chúc an lành!" ;
                $mail->Body = $noidungthu;
                $mail->AddAttachment("4.jpg","picture");
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
                
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mail.php" enctype="multipart/form-data" method="POST">
    <input type="text" class="form-control" name="email" placeholder="Email">
    <input type="text" class="form-control" name="tieude" placeholder="ten">
    <textarea name="content" id="editor" class="form-control"></textarea>
    <input type="file" class="form-control" name="file"  >
    <button type="submit" class="btn btn-primary">Gửi</button>

</body>
</html>
