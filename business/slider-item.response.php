<?php 
    include __DIR__.'/../classes/slider-item.class.php';

    $sliderItemModel=new SliderItem();

    $sliderItems=$sliderItemModel->getSliderItems();

    $smallestOrderPriority = PHP_INT_MAX; 
    foreach ($sliderItems as $item) {
        if ($item['order_priority'] < $smallestOrderPriority) {
            $smallestOrderPriority = $item['order_priority'];
        }
    }
?>