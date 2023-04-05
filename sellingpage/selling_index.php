<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./selling_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="../Images/Logo.png" />
    <title>Document</title>
</head>
<body>
<header >
            <a href="../Index.php" class="Logo"><img src="../Images/Logo3.png" alt="Logo"></a>
            <nav class="Slide">
                <ul>
                    <div class="logo">
                        <img src="../Images/Logo.png" alt="">
                    </div>
                    <li><a href="../Index.php">Home</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="./selling_index.php">Sell</a></li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <form action="./Includes/logout_inc.php" method="Get" class="logout">
                    <?php 
                        if(isset($_SESSION['UserId']))
                        {
                          echo  '<button name="settings" class="settings"><i class="fa-regular fa-user"></i></button>';
                          echo  '<button name="Log_out" class="Log_out"><i class="fa-solid fa-right-from-bracket"></i></i></button>';

                        }
                        ?>
                </form>        
                <form action="." method="Get">
                      <?php  
                        if(!isset($_SESSION['UserId'])){
                            echo '<button name="Sign_in" class="Log_in" value="Log">Sign in</button>' ;
                            echo '<button name="Sign_up" class="Sign_in" value="Sign">Sign up</button>' ;

                            if(isset($_GET['Sign_in'])){
                                header("Location: ../sign-in-up_page/sign_Index.php?Sign_in");
                            }
                            if(isset($_GET['Sign_up'])){
                                header("Location: ../sign-in-up_page/sign_Index.php?Sign_up");
                            }
                        }
                    ?>
                </form>
            </nav>
            <i class="fa-solid fa-bars"></i>
        </header>
        <main>
            <div class="img1">
                <img src="../Images/image12.png">
            </div>
            <h1 class="text">THANK YOU FOR TRUSTING US</h1>
                
            <div class="cards">
               <div class="container">
                <div class="card">

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="transparent" stroke-width="3" fill="transparent"></path>
                    </svg>
                    
                    <div class="card__content">
                     <p class="card__title">Sell your property</p>
                     <a href=""  class="card-link">GET STARTED</a>
                    </div>
                </div>
                </div>
                <div class="container">
                <div class="card">

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="transparent" stroke-width="3" fill="transparent"></path>
                    </svg>
                    
                    <div class="card__content">
                    <p class="card__title">Rent your property</p>
                    <a href="../Index.php" class="card-link">GET STARTED</a>
                    </div>
                </div>
                </div>
            </div>
        </main>
        <script src="./selling_index.js"></script>
</body>
</html>