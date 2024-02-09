<?php

// Fiyata göre artan sıralama fonksiyonu
function sortByPriceAsc($a, $b) {
    return $a['discounted_price'] - $b['discounted_price'];
}

// Fiyata göre azalan sıralama fonksiyonu
function sortByPriceDesc($a, $b) {
    return $b['discounted_price'] - $a['discounted_price'];
}

// Product name'e göre artan sıralama fonksiyonu
function sortByNameAsc($a, $b) {
    return strcmp($a['product_name'], $b['product_name']);
}

// Product name'e göre azalan sıralama fonksiyonu
function sortByNameDesc($a, $b) {
    return strcmp($b['product_name'], $a['product_name']);
}

// Sıralama kriterine göre sıralama fonksiyonu
function sortProducts($products, $sorting) {
    switch ($sorting) {
        case 'price_asc':
            usort($products, 'sortByPriceAsc');
            break;
        case 'price_desc':
            usort($products, 'sortByPriceDesc');
            break;
        case 'name_asc':
            usort($products, 'sortByNameAsc');
            break;
        case 'name_desc':
            usort($products, 'sortByNameDesc');
            break;
        // Diğer sıralama kriterleri eklenebilir
        default:
            // Varsayılan olarak artan fiyat sıralaması yap
            usort($products, 'sortByPriceAsc');
            break;
    }
    return $products;
}

?>
