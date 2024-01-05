<?php
session_start();
require_once __DIR__ . '/../classes/cart.class.php';
require_once __DIR__ . '/../classes/order.class.php';
require_once __DIR__ . '/../classes/order-detail.class.php';
require_once __DIR__ . '/../classes/order-shipping-info.class.php';
require_once __DIR__ . '/../helpers/errorHandler.php';
require_once __DIR__ . '/../helpers/url-function.php';
require_once __DIR__ . '/../classes/product.class.php';
require_once __DIR__ . '/../classes/user-contact.class.php';

if (isset($_POST['add_order'])) {
    $cartModel = new Cart();
    $orderModel = new Order();
    $productModel = new Product();
    $orderDetailModel = new OrderDetail();
    $userContactModel = new UserContact();
    $shippingInfoModel = new OrderShippingInfo();
    $total_amount = 0;
    $order_number;
    $userId = htmlspecialchars($_SESSION['user_id']);

    // Ürün Kargo Bilgileri
    $recipientName=htmlspecialchars($_POST['user_first_name']);
    $recipientSurname=htmlspecialchars($_POST['user_last_name']);
    $phoneNumber=htmlspecialchars("+90 ".$_POST['user_phone_number']);

    // Fatura Kargo Bilgileri
    $invoiceRecipientName=htmlspecialchars($_POST['invoice_user_first_name']);
    $invoiceRecipientSurname=htmlspecialchars($_POST['invoice_user_last_name']);
    $invoiceRecipientPhoneNumber=htmlspecialchars("+90 ".$_POST['invoice_user_phone_number']);

    //Ürün ve Fatura Aynı Kargolansın mı CheckBox'ı
    if (isset($_POST['same_address']) && $_POST['same_address'] == 'on') {
        $sameAddress= 1; // Checkbox işaretliyse on değer atanır
    } else {
        $sameAddress = 0; // Checkbox işaretli değilse off  değer atanır
    }

    // Ürün ve Fatura Adresi ID'leri
    $cargoAddressId=htmlspecialchars($_POST['cargo_address']);
    $invoiceAdressId=htmlspecialchars($_POST['învoice_address']);
    

    

    if(empty($recipientName) || empty($recipientSurname) || empty($phoneNumber)){
        ErrorHandler::showMessageAndRedirect("Lütfen Zorunlu Alanları Doldurun!", "../sepet-onay", 'error');
        exit();
    }


    $cartItems = $cartModel->getCartByUserIdCartApproved($userId);

    function generateOrderNumber()
    {
        date_default_timezone_set('Europe/Istanbul');
        $min = 10000;
        $max = 99999;
        $uniqid = mt_rand($min, $max);
        $date = date('ymdHis');
        return 'ORD' . $uniqid . $date;
    }

    $isStockUpdateSuccessful = true;
    foreach ($cartItems as $cartItem) {
        $decrementProductQuantity = $productModel->decrementProductQuantity($cartItem['product_id'], $cartItem['quantity']);
        if (!$decrementProductQuantity) {
            $isStockUpdateSuccessful = false;
            break;
        }
    }

    if ($isStockUpdateSuccessful) 
    {
        foreach ($cartItems as $cartItem) {
            $subtotal = $cartItem['discounted_price'] * $cartItem['quantity'];
            $total_amount += $subtotal;
        }
        $orderData = [
            'order_number' => generateOrderNumber(),
            'user_id' => $userId,
            'total_amount' => $total_amount,
        ];

        $isAddOrder = $orderModel->addOrder($orderData);

        if ($isAddOrder) {
            $lastOrder = $orderModel->getLatestOrderByUserId($userId);
            
            
            $cargoAddress=$userContactModel->getUserContactByContactId($userId,$cargoAddressId);

            $shippingInfoDataForCargo = [
                'order_id' => $lastOrder['order_id'],
                'recipient_name' => $recipientName,
                'recipient_surname' => $recipientSurname,
                'phone_number' => $phoneNumber,
                'recipient_address' => $cargoAddress['contact_address'],
                'recipient_city' => $cargoAddress['contact_city'],
                'recipient_district' => $cargoAddress['contact_district'],
                'postal_code' => $cargoAddress['postal_code'],
                'shipping_type' => 'Ürün',
            ];

            $addedShippingInfoForCargo = $shippingInfoModel->addShippingInfo($shippingInfoDataForCargo);

            if(!$sameAddress){
                $cargoAddress=$userContactModel->getUserContactByContactId($userId,$invoiceAdressId);
            }
            $shippingInfoDataForInvoice = [
                'order_id' => $lastOrder['order_id'],
                'recipient_name' => $invoiceRecipientName,
                'recipient_surname' => $invoiceRecipientSurname,
                'phone_number' => $invoiceRecipientPhoneNumber,
                'recipient_address' => $cargoAddress['contact_address'],
                'recipient_city' => $cargoAddress['contact_city'],
                'recipient_district' => $cargoAddress['contact_district'],
                'postal_code' => $cargoAddress['postal_code'],
                'shipping_type' => 'Fatura',
            ];
            $addedShippingInfoForInvoice = $shippingInfoModel->addShippingInfo($shippingInfoDataForInvoice);
            

            foreach ($cartItems as $cartItem) {
                $orderDetailData = [
                    'order_id' => $lastOrder['order_id'],
                    'order_number' => $lastOrder['order_number'],
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'unit_price' => $cartItem['discounted_price'],
                    'subtotal' => $cartItem['discounted_price'] * $cartItem['quantity']
                ];

                $addedOrderDetail = $orderDetailModel->addOrderDetail($orderDetailData);
            }
            $clearCart = $cartModel->clearCart($userId);
            $_SESSION['order_id']=$lastOrder['order_id'];
            ErrorHandler::showMessageAndRedirect("Siparişiniz Oluşturuldu.", "../odeme", 'success');
            exit();
        } else {
            ErrorHandler::showMessageAndRedirect("Sipariş Oluşturulurken Hata Oluştu.", "../sepet-onay", 'error');
            exit();
        }
    } else {
        ErrorHandler::showMessageAndRedirect("Stok Yetersiz. Sipariş Oluşturulamadı.", "../sepet-onay", 'error');
        exit();
    }

} else if (isset($_POST['cancel_shop'])) {
    $cartModel = new Cart();
    $userId = htmlspecialchars($_SESSION['user_id']);
    $result = $cartModel->removeFromCartAllProduct($userId);

    if ($result) {
        ErrorHandler::showMessageAndRedirect("Alışveriş İptal Edildi.", "../sepet", 'success');
        exit();
    } else {
        ErrorHandler::showMessageAndRedirect("Alışveriş İptal Edilirken Bir Hata Oluştu.", "../sepet-onay", 'error');
        exit();
    }
} else if(isset($_POST['delete_from_cart'])){

    $cartModel = new Cart();
    $cartId=htmlspecialchars($_POST['cart_id']);
    $userId=htmlspecialchars($_SESSION['user_id']);

    $result=$cartModel->removeFromCart($cartId,$userId);

    if ($result) {
        ErrorHandler::showMessageAndRedirect("Ürün Sepetten Çıkarıldı.", "../sepet-onay", 'success');
        exit();
    } else {
        ErrorHandler::showMessageAndRedirect("Ürün Sepetten Çıkarılırken Bir Hata Oluştu.", "../sepet-onay", 'error');
        exit();
    }

} else {
    ErrorHandler::showMessageAndRedirect("Bir Hata Oluştu.", "../", 'error');
    exit();
}
?>