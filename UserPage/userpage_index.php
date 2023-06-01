<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Responsive sidebar || Learning Robo</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./userpage_style.css">
    </head>
    <body>
        <div class="s-layout">
            <!-- Sidebar -->
            <div class="s-layout__sidebar">
            <img src="../Images/Logo_W.png" alt="">
              <nav class="s-sidebar__nav">
                 <form method="get" action="">
                   <button class="btn" name="home"><li><i class="fa-solid fa-house"></i>    <span>Home</span></li></button>
                   <button class="btn" name="properties" id="properties"><li><i class="fa-solid fa-city"></i>    <span>My Properties</span></li></button>
                   <button class="btn" name="profile" id="profile"><li><i class="fa-solid fa-user"></i>    <span>My profile</span></li></button>
                   <button class="btn" name="password"><li><i class="fa-solid fa-lock"></i>    <span>Password</span></li></button>
                </form>
              </nav>
              <form method="get" action="">
                 <button name="logout" ><li><i class="fa-solid fa-right-from-bracket"></i>    <span>Logout</span></li></button>
                </form>
            </div>
            
            <!-- Content -->
            <main class="s-layout__content">
                <?php 
                  if(isset($_GET['home'])){
                    header("Location: ../index.php");
                  }
                  if(isset($_GET['profile'])){
                    include "./Myprofile/Myprofile_index.php";
                  }
                  if(isset($_GET['password'])){
                    include "./Password/password_index.php";
                  }
                  if(isset($_GET['properties'])){
                    include "./Properties/propertiespage_index.php";
                  }
                  if(isset($_GET['logout'])){
                    session_start();
                    session_unset();
                    session_destroy();
                  
                    
                    header("Location: ../index.php?error=none");
                  }
                ?>
            </main>
        </div>
    </body>
    <script src="./userpage_script.js"></script>
    <script src="./Properties/propertiespage_script.js"></script>
</html>
