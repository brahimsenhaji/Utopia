<?php

    if(isset($_POST['sign-in-btn'])){
        //Grabing the data 
        $email = $_POST['email'];
        $password = $_POST['password'];

        //instantiate signupcontr class
        include '../Classes/db_PDS.class.php';
        include '../Classes/login.class.php';
        include '../Classes/login_contr.class.php';

        $login = new LoginContr($email, $password);

        $login->loginuser();

        //Going to ....
        
         header("Location: ../index.php?error=none");
         exit();

    }       