<?php 
require_once __DIR__ . '/../helpers/errorHandler.php';
$errorModel=new ErrorHandler();

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_id']);
unset($_SESSION['loggedIn']);

session_destroy();

ErrorHandler::showMessageAndRedirect("Çıkış İşlemi Başarılı","../giris-yap","success");
exit();
?>
