<?php
    require './vendor/autoload.php';

    $googleClient = new Google_Client();
    $googleClient->setClientId('340220671624-j21dmbqrgd68aksu8pc6acrdnoc4qeuk.apps.googleusercontent.com');
    $googleClient->setClientSecret('1hdysY-ynvH2Hseg-cEHTzOR');
    $googleClient->setRedirectUri('http://localhost/Nazla_PWL_OAuth/index.php');
    $googleClient->addScope('email');
    $googleClient->addScope('profile');

    session_start();