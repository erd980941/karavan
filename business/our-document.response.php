<?php 
    include __DIR__.'/../classes/our-document.class.php';

    $ourDocumentModel=new OurDocument();

    $ourDocuments=$ourDocumentModel->getAllDocuments();
?>