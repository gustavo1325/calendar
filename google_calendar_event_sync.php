<?php
session_start();

//Include Google client library 
//include_once 'src/Google_Client.php';
//include_once 'src/contrib/Google_Oauth2Service.php';
require_once 'vendor/autoload.php';

/*
 * Configuration and setup Google API
 */
$clientId = '';
$clientSecret = '';
$redirectURL = '';

//Call Google API
$client = new Google_Client();
$client->setApplicationName('drupal-9');
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURL);
//$gClient->addScope('profile');

$client->addScope(Google_Service_Calendar::CALENDAR);
$client->getAccessToken();
//$google_oauthV2 = new Google_Oauth2Service($gClient);

//$authUrl = $client->createAuthUrl();

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
   
    // get profile info
   //$google_oauth = new Google_Service_Oauth2($client);
   /*  $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
  */
    // now you can use this profile info to create account in your website and make user logged in.
  } else {
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  }
  //if (isset($_GET['code'])) {echo "devuelve codigo";}
  $service = new Google_Service_Calendar($client);
  if($service){
    echo "creado servicio";
    $calendar = new Google_Service_Calendar_Calendar();
$calendar->setSummary('calendario 23');
$calendar->setDescription('este calendario es una prueba');
$calendar->setTimeZone('America/Mexico_City');
$createdCalendar = $service->calendars->insert($calendar);
$calendarId = $createdCalendar->getId();
  }
?>
