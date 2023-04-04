<?php
 include "../Classes/db_PDS.class.php";

session_start();

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Uid = $_SESSION['UserId'];

    $sql = "UPDATE users SET user_name = ?, user_email = ?, user_phone = ? WHERE user_id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    }

    else{
        //Bind Param
        
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $phone, $Uid);

        //Execute the Prepared Statement inside database
        mysqli_stmt_execute($stmt);

        header("Location: ../UserPage/userpage_index.php?profile=");
    }

}