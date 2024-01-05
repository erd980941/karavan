<?php 
    include __DIR__.'/../classes/about-us.class.php';

    $abousUsModel=new AboutUs();

    $aboutUs=$abousUsModel->getAbousUs();
?>