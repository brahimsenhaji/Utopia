<?php 

class Signup extends Db_PDO_Handler{
  

     protected function setUser($Uname, $Uemail, $Uphone, $Upassword){
        $stmt = $this->PDOconnect()->prepare('INSERT INTO users (user_name, user_email, user_phone, user_password) VALUES (?,?,?,?);');

     

        $hashedPWD = password_hash($Upassword, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($Uname, $Uemail, $Uphone, $hashedPWD))){
            $stmt = null;

            header("Location: ../index.php?error=stmtfailde");
            exit();
        }

        $stmt = null;
     }


    protected function CheckUser($Uname, $Uemail){

        $stmt = $this->PDOconnect()->prepare('SELECT * FROM users WHERE user_name = ? OR user_email = ? ;');
        
        if(!$stmt->execute(array($Uname, $Uemail))){
            $stmt = null;

            header("Location: ../index.php?error=stmtfailde");
            exit();
        }

         $resultCheck = false;
        if(!$stmt->rowCount() > 0){
            $resultCheck = false ;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;

    }

}
