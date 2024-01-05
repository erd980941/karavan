<?php 
   session_start(); 
   require_once __DIR__ . '/../helpers/errorHandler.php';
   require_once __DIR__ . '/../classes/user-contact.class.php';

   
   if(isset($_POST['add_user_contact'])){
       $userContactModel=new UserContact();
       $userId=htmlspecialchars($_SESSION['user_id']);

       $addresses=$userContactModel->getUserContact($userId);
       
       $contact_favorite='0';
       if(empty($addresses)){   
        $contact_favorite='1';
       }
       
       $contactData=[
        'contact_title'=>isset($_POST['contact_title'])?htmlspecialchars($_POST['contact_title']):'',
        'contact_city'=>isset($_POST['contact_city'])?htmlspecialchars($_POST['contact_city']):'',
        'contact_district'=>isset($_POST['contact_district'])?htmlspecialchars($_POST['contact_district']):'',
        'contact_address'=>isset($_POST['contact_address'])?htmlspecialchars($_POST['contact_address']):'',
        'postal_code'=>isset($_POST['postal_code'])?htmlspecialchars($_POST['postal_code']):'',
        'user_id'=>$userId,
        'contact_favorite'=>$contact_favorite
       ];

       

    if (empty($contactData['contact_title']) || empty($contactData['contact_city']) || empty($contactData['contact_district']) ||  empty($contactData['contact_address'])||  empty($contactData['postal_code'])) {
        ErrorHandler::showMessageAndRedirect("Lütfen Zorunlu Alanları Doldurun!", "../adreslerim", 'error');
        exit();
    } 
       
       $result=$userContactModel->addUserContact($contactData);
       
       if($result){
        ErrorHandler::showMessageAndRedirect("Adres Eklendi.", "../adreslerim", 'success');
        exit();
       }
       else{
        ErrorHandler::showMessageAndRedirect("Adres Eklenirken Hata Oluştu.", "../adreslerim", 'error');
        exit();
       }
       
   }
   else if(isset($_POST['delete_contact'])){
        $userContactModel=new UserContact();
        $userId=htmlspecialchars($_SESSION['user_id']);
        $contactId=htmlspecialchars($_POST['contact_id']);

        $isFavorite=$userContactModel->getUserContactByContactId($userId,$contactId);
        

        
        $result=$userContactModel->deleteUserContact($userId,$contactId);


        if($result){
            $addresses=$userContactModel->getUserContact($userId);
            if(!empty($addresses) && $isFavorite['contact_favorite']) {
                foreach($addresses as $address) {
                    if($address['contact_favorite'] != 1) {
                        $newFavoriteContactId = $address['contact_id'];
                        break;
                    }
                }
    
                $updateContactFavorite = $userContactModel->updateUserContactFavorite($userId, $newFavoriteContactId);
            }
            ErrorHandler::showMessageAndRedirect("Adres Silindi.", "../adreslerim", 'success');
            exit();
        }else{
            ErrorHandler::showMessageAndRedirect("Adres Silinirken Hata Oluştu.", "../adreslerim", 'error');
            exit();
        }

   }
   else if(isset($_POST['update_favorite'])){
    $userContactModel=new UserContact();
    $userId=htmlspecialchars($_SESSION['user_id']);
    $contactId=htmlspecialchars($_POST['contact_id']);

    $result=$userContactModel->updateUserContactFavorite($userId,$contactId);
    

    if($result){
        ErrorHandler::showMessageAndRedirect("Favori Adres Değiştirildi.", "../adreslerim", 'success');
        exit();
    }else{
        ErrorHandler::showMessageAndRedirect("Favori Adres Değiştirilirken Hata Oluştu.", "../adreslerim", 'error');
        exit();
    }

}
    
?>