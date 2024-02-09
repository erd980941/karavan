<?php 
function filterByPriceRange($products, $minPrice, $maxPrice) {
    return array_filter($products, function ($product) use ($minPrice, $maxPrice) {
        $discountedPrice = $product['discounted_price'];

        return ($discountedPrice >= $minPrice && $discountedPrice <= $maxPrice);
    });
}
?>