<?php 
session_start();
if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
    $message = $_SESSION['message'];
    $messageType = $_SESSION['message_type'];

    $backgroundColor = ($messageType === 'error') ? 'red' : 'green';
    // Hata tipine göre arka plan rengi belirleme

    echo "<div class='alert alert-".$messageType." mt-4'>$message</div>";
    unset($_SESSION['message']); // Mesajı temizle
    unset($_SESSION['message_type']); // Mesaj tipini temizle
}
?>

