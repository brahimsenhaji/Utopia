<?php
 
session_start();
include "../Classes/EmailVerification.class.php";

if(isset($_POST['verify-btn'])){
     $input1 = $_POST['input1'];
     $input2 = $_POST['input2'];
     $input3 = $_POST['input3'];
     $input4 = $_POST['input4'];

     $otp = $input1. $input2 . $input3 . $input4;
 
       
        //Grabing the data 
        $name =  $_SESSION['name'] ;
        $email =  $_SESSION['email'] ;
        $phone =   $_SESSION['phone'] ;
        $password =  $_SESSION['password']  ;


     if($_SESSION['otp'] == $otp){
        //instantiate signupcontr class
        include '../Classes/db_PDO.class.php';
        include '../Classes/signup.class.php';
        include '../Classes/signup_contr.class.php';

        $signup = new SignupContr($name,  $email, $phone, $password);

        $signup->signupuser();

        //Going to ....

        header("Location: ../sign-in-up_page/sign_Index.php?Sign_up");
        exit();
     
     }

}
