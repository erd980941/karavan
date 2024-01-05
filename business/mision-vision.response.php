<?php 
    include __DIR__.'/../classes/mision-vision.class.php';

    $misionVisionModel=new MisionVision();

    $mision=$misionVisionModel->getMisionVision('mision');
    $vision=$misionVisionModel->getMisionVision('vision');
?>