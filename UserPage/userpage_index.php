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
                <div class="s-sidebar__trigger" href="#0">
                </div>
            
              <nav class="s-sidebar__nav">
                 <form method="get" action="">
                   <button name="home"><li><i class="fa-solid fa-house"></i>    <span>Home</span></li></button>
                   <button name="profile" id="profile"><li><i class="fa-solid fa-user"></i>    <span>My profile</span></li></button>
                   <button name="password"><li><i class="fa-solid fa-lock"></i>    <span>Password</span></li></button>
                   <button name="logout" ><li><i class="fa-solid fa-right-from-bracket"></i>    <span>Logout</span></li></button>
                </form>
              </nav>
            </div>
            
            <!-- Content -->
            <main class="s-layout__content">
                <?php 
                
                  if(isset($_GET['profile'])){
                    include "./Myprofile/Myprofile_index.php";
                  }
                  if(isset($_GET['password'])){
                    include "./Password/password_index.php";
                  }
                  if(isset($_GET['logout'])){
                    header("Location: ../index.php");
                  }
                ?>
            </main>
        </div>
    </body>
    <script src="./userpage_script.js"></script>
</html>
