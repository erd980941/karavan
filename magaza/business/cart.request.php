<?php 
session_start();
require_once __DIR__ . '/../classes/cart.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';
require_once __DIR__ . '/../classes/product.class.php';



if (isset($_POST['addToCart'])) {
    $cartModel = new Cart();
    $productModel=new Product();
    $cartData=[
        'user_id'=>htmlspecialchars($_SESSION['user_id']),
        'product_id'=>htmlspecialchars($_POST['product_id']),
        'quantity'=>isset($_POST['quantity'])?htmlspecialchars($_POST['quantity']):1
    ];
    $product=$productModel->getProductById($cartData['product_id']);
    $productSef=url($product['product_name']);
    $productId=$product['product_id'];

    
    if($cartData['quantity']>$product['product_quantity']){
        ErrorHandler::showMessageAndRedirect("Ürün Adedi Yetersiz.", "../$productSef-$productId", 'error');
        exit();
    }
    $totalQuantityInCart = $cartModel->getTotalQuantityInCart($cartData['user_id'], $cartData['product_id']);
    
    if (($totalQuantityInCart + $cartData['quantity']) > $product['product_quantity']) {
        ErrorHandler::showMessageAndRedirect("Sepette Yeterli Stok Yok.", "../$productSef-$productId", 'error');
        exit();
    }
    
    $isProductInCart = $cartModel->isProductInCart($cartData['user_id'], $cartData['product_id']);
    
    if ($isProductInCart) {
        $updateCart = $cartModel->updateCartQuantity($cartData['user_id'], $cartData['product_id'], $cartData['quantity']);
        if ($updateCart) {
            ErrorHandler::showMessageAndRedirect("Ürün Miktarı Güncellendi.", "../$productSef-$productId", 'success');
            exit();
        } else {
            ErrorHandler::showMessageAndRedirect("Ürün Miktarı Güncellenirken Hata Oluştu.", "../$productSef-$productId", 'error');
            exit();
        }
    } else {
        $addedToCart = $cartModel->addToCart($cartData);
        if ($addedToCart) {
            ErrorHandler::showMessageAndRedirect("Ürün Sepete Eklendi.", "../$productSef-$productId", 'success');
            exit();
        } else {
            ErrorHandler::showMessageAndRedirect("Ürün Sepete Eklenirken Hata Oluştu.", "../$productSef-$productId", 'error');
            exit();
        }
    }

}


else if(isset($_POST['delete_from_cart'])){
    $cartModel = new Cart();
    $cartId=htmlspecialchars($_POST['cart_id']);
    $userId=htmlspecialchars($_SESSION['user_id']);

    $result=$cartModel->removeFromCart($cartId,$userId);

    if ($result) {
        ErrorHandler::showMessageAndRedirect("Ürün Sepetten Çıkarıldı.", "../sepet", 'success');
        exit();
    } else {
        ErrorHandler::showMessageAndRedirect("Ürün Sepetten Çıkarılırken Bir Hata Oluştu.", "../sepet", 'error');
        exit();
    }
}

else if(isset($_POST['cart_approval'])){
    $cartModel = new Cart();
    $userId=htmlspecialchars($_SESSION['user_id']);
    $result=$cartModel->approveCartItems($userId);

    if ($result) {
        ErrorHandler::showMessageAndRedirect("Sepet Onaylandı.", "../sepet-onay", 'success');
        exit();
    } else {
        ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../sepet", 'error');
        exit();
    }
}
else{
    ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../", 'error');
    exit();
}
?>
