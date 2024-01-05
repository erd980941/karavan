<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendVerificationEmail($mailData)
{
    // PHPMailer dosyalarını dahil edin
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // PHPMailer sınıfını kullanarak e-posta gönderme işlemi
    $mail = new PHPMailer(true);

    try {
        // Sunucu ayarlarını yapılandırma
        $mail->SMTPDebug = 0;  // Debug modunu kapatmak için 0 kullanın, 2 yazarsanız detaylı bilgi alırsınız
        $mail->isSMTP(); // SMTP kullanarak gönderim yapacağımızı belirtiyoruz
        $mail->Host = $mailData['SMTP_Host'];  // SMTP sunucu adresi
        $mail->SMTPAuth = true; // SMTP kimlik doğrulaması etkinleştir
        $mail->Username = $mailData['SMTP_Username']; // SMTP kullanıcı adı
        $mail->Password = $mailData['SMTP_Password']; // SMTP şifre
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Güvenli bağlantı türü, tls veya ssl olarak ayarlayabilirsiniz
        $mail->Port = $mailData['SMTP_Port']; // SMTP bağlantı noktası

        // E-posta gönderim işlemi için gerekli diğer ayarları yapılandırın
        $mail->setFrom($mailData['SMTP_Email'], $mailData['site_name']);
        $mail->addAddress($mailData['user_email']);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $mailData['mail_subject'];
        $mail->isHTML(true);
        $mail->Body = $mailData['mail_body'];

        // E-postayı gönder
        $mail->send();
        echo 'E-posta başarıyla gönderildi!';
        return true; // Başarıyla gönderildiğinde true dön
    } catch (Exception $e) {
        return false; // Gönderirken hata oluştuğunda false dön
    }
}
?>