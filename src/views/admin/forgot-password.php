<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    $reset_link = generateResetLink();

    $mail = new PHPMailer;
    $mail->isSMTP();
    // $mail->SMTPDebug = 2;
    $mail->Host = 'smtpout.secureserver.net';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@sporttimefitness.com';
    $mail->Password = 'jP,_Dycma_C$2??';
    $mail->setFrom('support@sporttimefitness.com', 'Sporttime Fitness');
    $mail->addAddress($email);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('Şifre Sıfırlama Talebi') . '?=';
    $mail->isHTML(true);
    $mail->Body = '<p>Şifrenizi sıfırlamak için aşağıdaki bağlantıyı kullanabilirsiniz:</p>' . $reset_link . '
    <div style="height: 3px; width: 100%; background-color: red;"></div>
    <p>test</p>
    ';
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.';
    }
}

function generateResetLink() {
    $token = bin2hex(random_bytes(32));
    
    $encoded_token = base64_encode($token);
    
    $reset_link = 'https://example.com/reset_password.php?token=' . urlencode($encoded_token);
    
    return $reset_link;
}
?>

<section class="admin-login">
    <img src="./img/linrime_logo.png" alt="" width="200px">
    <form action="" method="post" class="form">
        <p class="form__title">Please fill in your unique admin login details below</p>
        <div class="form__field">
        <label for="">Email Address</label>
        <input type="text" name="email" placeholder="Email">
        </div>
        <a href="/sporttime_template/public/admin" class="form__forgot">Are you already a member?</a>
        <button type="submit" name="forgot-password">Forgot Password</button>  
    </form>
</section>