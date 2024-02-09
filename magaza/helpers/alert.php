<?php 

if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
    $message = $_SESSION['message'];
    $messageType = $_SESSION['message_type'];

    unset($_SESSION['message']); // Mesajı temizle
    unset($_SESSION['message_type']); // Mesaj tipini temizle

    echo "<script>
            // Toastr bildirimi gösterme
            toastr.$messageType('$message');
          </script>";
}
?>