<?php 
    include("./configGoogleOAuth.php");

    $btnLogin = ''; 

    if(isset($_GET['code'])){
        $token = $googleClient->FetchAccessTokenWithAuthCode($_GET['code']);
        if(!isset($token['error'])){
            $googleClient->setAccessToken($token['access_token']);
            $_SESSION['access_token'] = $token['access_token'];
            $googleService= new Google_Service_Oauth2($googleClient);

            $data = $googleService->userinfo->get();

            if(!empty($data['given_name'])){ $_SESSION['user_first_name'] = $data['given_name']; }
            if(!empty($data['family_name'])){ $_SESSION['user_last_name'] = $data['family_name']; }
            if(!empty($data['email'])){ $_SESSION['user_email'] = $data['email']; }
            $_SESSION['login'] = "login";
        }
    }

    if(!isset($_SESSION['access_token'])) {
        $btnLogin = '<a href="'. $googleClient->createAuthUrl() .'"> Login With Google </a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem And OAuth With Google</title>
</head>
<body>
    <?php if(isset($_SESSION['login'])){ ?>
        <p>Hello <?php echo $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] ?></p>
        <p>And your E-mail : <?php echo $_SESSION['user_email'] ?></p>
        <p>logout : <a href="./logout.php">Logout</a></p>
    <?php } else { ?>
        <form action="login.php" method="post">
            <p>Login dengan Form Biasa</p>
            <input type="text" name="email" placeholder="email"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="submit" value="Login">
        </form>

        <br> <hr>

        <?php echo $btnLogin; ?>
    <?php } ?>
</body>
</html>