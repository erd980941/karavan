<?php 
    include __DIR__.'/../classes/why-us.class.php';

    $whyUsModel=new WhyUs();


    $whyUsItems=$whyUsModel->getWhyUsItems();
?>