<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['order_id'])) {
        $_SESSION['order_id'] = $_POST['order_id'];
        // Ödeme sayfasına yönlendir
        header("Location: ../magaza/odeme");
        exit();
    }
    else{
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu", "../magaza/", 'error');
        exit();
    }
}
else{
    ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu", "../magaza/", 'error');
    exit();
}
?>