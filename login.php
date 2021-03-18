<?php 

    $emailDef = "nazla.118140084@student.itera.ac.id";
    $passDef = "nazla123";

    if(isset($_POST['email']) && isset($_POST['password'])){
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == $emailDef && $password == $passDef){
            session_start();
            $_SESSION['user_first_name'] = "Nazla";
            $_SESSION['user_last_name'] = "Andintya Wijaya";
            $_SESSION['user_email'] = "nazla.118140084@student.itera.ac.id";
            $_SESSION['login'] = "login";

            header("location:index.php"); 
        } else {
            echo " gagal login ";
            echo '<a href="index.php"> Kembali </a>';
        }
    }