<?php
class ErrorHandler
{
    public static function showMessageAndRedirect($message ,$redirectPath, $messageType)
    {
        session_start();
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $messageType;
        header("Location: " . $redirectPath);
        exit();
    }
}
?>