<?php 

class Login{
 
    

    protected function getUser($Uemail, $Upassword){

       include 'db_PDS.class.php';

       $sql = "SELECT * FROM users WHERE user_email = ?;";
       //create a  Prepared Statement
       $stmt = mysqli_stmt_init($conn);

       // Prepared the Prepared Statement

       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("Location: ../index.php?error=sqlstatementfaild");
           exit();
       }
       else{
           //Bind Param
           
           mysqli_stmt_bind_param($stmt, "s", $Uemail);

           //Execute the Prepared Statement inside database
           mysqli_stmt_execute($stmt);

           $result = mysqli_stmt_get_result($stmt);

           if($row = mysqli_fetch_assoc($result)){

            $Db_password = $row['user_password'];
            
            //Check if the password from the database and the pasword from the user input are match
           $Checkpassword = password_verify($Upassword ,  $Db_password);
               
                   if($Checkpassword == false  ){
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                   }
                   elseif($Checkpassword == true  ){
                    //start a session to stor the propertys 
                        session_start();
                        $_SESSION['UserId']  = $row['user_id'];
                        $_SESSION['UserName'] = $row['user_name'];
                        $_SESSION['UserEmail'] = $row['user_email'];
                        header("Location: ../index.php?Welcome". $row['user_name']);
                        exit();
                   }
               

           }else{
               header("Location: ../index.php?error=nouser");
               exit();
           }

       }

    }   

}
