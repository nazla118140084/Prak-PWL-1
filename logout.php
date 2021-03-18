<?php

    include('./configGoogleOAuth.php');

    // $googleClient->revokeToken($_SESSION['access_token']);

    session_destroy();

    header('location:index.php');