<?php 

include "../Classes/db_PDS.class.php";
   if(isset($_SESSION['UserId'])){
    $Uid = $_SESSION['UserId'];
    $sql = "SELECT * FROM users where user_id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    }

    else{
        //Bind Param
        
        mysqli_stmt_bind_param($stmt, "s", $Uid);

        //Execute the Prepared Statement inside database
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            $_SESSION['Uname'] = $row['user_name'];
            $_SESSION['Uemail'] = $row['user_email'];
            $_SESSION['Uphone'] = $row['user_phone'];
        }
    }
    
 }

?>
<h1>Account Settings</h1>

<form action="../Includes/updateProfile_inc.php" method="post">
                    <div class="inputs">
                        <label>Name</label>
                        <input type="text" name="name" id="" value="<?php echo $_SESSION['Uname'] ?>">

                    </div>
                    <div class="inputs">
                        <label>Email</label>
                        <input type="email" name="email" id="" value="<?php echo $_SESSION['Uemail'] ?> " disabled>
                    </div>
                    <div class="inputs">
                        <label>Phone number</label>
                    <input type="tel" name="phone" id="" value="<?php echo $_SESSION['Uphone'] ?>">
                    </div>
                    <div class="buttons">
                        <button type="submit" class="update" name="update">Update</button>
                        <button type="submit" class="cancel" name="cancel">Cancel</button>
                    </div>
</form>
