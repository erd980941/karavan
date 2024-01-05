<?php

function paginateItems($items, $itemsPerPage, $currentPage) {
    $totalItems = count($items);

    // Toplam sayfa sayısını bulma
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Hangi öğelerin gösterileceğini belirleme
    $offset = ($currentPage - 1) * $itemsPerPage;
    $paginatedItems = array_slice($items, $offset, $itemsPerPage);

    return [
        'paginatedItems' => $paginatedItems,
        'totalPages' => $totalPages
    ];
}
?>