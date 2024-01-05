<?php
$lifetime=1800;
$path="/";
$domain=$siteSettingsData['site_url'];
$cookieParams = session_get_cookie_params();
session_set_cookie_params(
    $lifetime,
    $path,
    $domain, 
    true,  // Secure: true (HTTPS üzerinden iletim)
    true   // HttpOnly: true (JavaScript tarafından erişim engellensin)
);
session_start();


if (isset($_SESSION['user_email']) && isset($_SESSION['user_id']) && $_SESSION['loggedIn']==true ) {
    $loggedIn=true;
}
else{
    $loggedIn=false;
}
?>