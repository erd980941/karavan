<?php
include __DIR__ . '/../classes/magaza-slider.class.php';

$sliderModel = new MagazaSlider();
$sliderItems = $sliderModel->getSliderItems();
?>