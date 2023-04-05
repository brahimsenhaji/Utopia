<?php 
   
    include "../Classes/db_PDS.class.php";


    
    
    
?>
<h1>Password</h1>

<form action="" method="post">
    <div class="input">
        <label>Current password</label>
       <div class="input-field">
            <input class="c-password" type="password" name="c-password" id="password"  required>
            <i class="fa-solid fa-eye" id="eye" onclick="showpass('c-password')"></i>
       </div>
    </div>
    <?php 
    if(isset($_POST['update-btn'])){

        $c_password = $_POST['c-password'];    
        $Uid = $_SESSION['UserId'];
        
       
            $sql = "SELECT * FROM users WHERE user_id = ?;";
    
            $stmt = mysqli_stmt_init($conn);
    
            if(mysqli_stmt_prepare($stmt, $sql)){
                //Bind Param
                mysqli_stmt_bind_param($stmt, "s", $Uid);
    
                //Execute the Prepared Statement inside database
                mysqli_stmt_execute($stmt);
    
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){

                    $Db_password = $row['user_password'];
                    
                    //Check if the password from the database and the pasword from the user input are match
                     $Checkpassword = password_verify($c_password ,  $Db_password);
                    
                        if($Checkpassword == false  ){
                            echo "<p style='color:red;'>The current password is wrong.</p>";
                        }
                        else if($Checkpassword == true  ){
                            $c_password = $_POST['c-password'];
                            $n_password = $_POST['n-password'];
                            $con_password = $_POST['con-password'];
                        
                            $Uid = $_SESSION['UserId'];
                            
                            if($n_password == $con_password){
                                $sql = "UPDATE users SET user_password = ? WHERE user_id = ?;";
                        
                                $stmt = mysqli_stmt_init($conn);
                        
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                                    exit();
                                }
                                else{
                                    $hachpassword = password_hash( $n_password , PASSWORD_DEFAULT);
                                    //Bind Param
                                    mysqli_stmt_bind_param($stmt, "ss",$hachpassword , $Uid );
                        
                                    //Execute the Prepared Statement inside database
                                    mysqli_stmt_execute($stmt);
                        
                                    header("Location: ../UserPage/userpage_index.php?password=");
                                }
                            }
                        }

                }
            }
        }
        

    ?>
    <div class="input">
        <label>New password</label>
       <div class="input-field">
            <input class="n-password" type="password" name="n-password"  id="password"  required>
            <i class="fa-solid fa-eye" id="eye" onclick="showpass('n-password')"></i>
       </div>
    </div>
    <div class="input">
        <label>Confirm password</label>
       <div class="input-field">
            <input class="con-password" type="password" name="con-password"  id="password" required>
            <i class="fa-solid fa-eye" id="eye" onclick="showpass('con-password')"></i>
       </div>
    </div>
    <?php 
 
        if(isset($_POST['update-btn'])){
            if($_POST['n-password'] != $_POST['con-password']){
                echo "<p style='color:red;'>The new password fails to match the confirmation password.</p>";
            }
        }
    ?>

    <div class="buttons">
         <button type="submit" class="update" name="update-btn">Update</button>
         <button type="submit" class="cancel">Cancel</button>
    </div>
</form>

<script>

   
    let password = document.querySelectorAll('#password');
  
  function showpass(index){
        password.forEach(password =>{
               if(index == password.className){
                if (password.type === 'password') {
                  password.setAttribute('type', 'text');
                } 
                else{
                    password.setAttribute('type', 'password');
                }
               }
         })
  }
</script>