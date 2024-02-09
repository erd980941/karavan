<?php
include __DIR__ . '/../classes/slider-item.class.php';

$sliderItemModel = new SliderItem();

$sliderItems = $sliderItemModel->getSliderItems();

$smallestOrderPriority = PHP_INT_MAX;
foreach ($sliderItems as $item) {
    if ($item['order_priority'] < $smallestOrderPriority) {
        $smallestOrderPriority = $item['order_priority'];
    }
}

function sliderExplodeText($slider_title)
{
    $pos = strpos($slider_title, '-');
    if ($pos !== false) {
        $sliderH1 = substr($slider_title, 0, $pos);
        $sliderH2 = substr($slider_title, $pos + 1);
    } else {
        $sliderH1 = "";
        $sliderH2 = "";
    }
    
    return [
        'slider_h1' => $sliderH1,
        'slider_h2' => $sliderH2,
    ];
}

?>