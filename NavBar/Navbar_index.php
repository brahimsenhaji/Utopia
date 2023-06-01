
<header >
            <a href="#" class="Logo"><img src="Images/Logo3.png" alt="Logo"></a>
            <nav class="Slide">
                <img src="Images/Logo_B.png" class="side_logo">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="./buyingpage/buyingpage_index.php">Buy</a></li>
                    <?php 
                      if(isset($_SESSION['UserId'])){
                       echo ' <li><a href="./listingpage/listing_index.php">Sell</a></li>';
                      }
                      else{
                        echo ' <li><a href="./sign-in-up_page/sign_Index.php">Sell</a></li>';
                      }
                    ?>
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
                                header("Location: ./sign-in-up_page/sign_Index.php?Sign_in");
                            }
                            if(isset($_GET['Sign_up'])){
                                header("Location: ./sign-in-up_page/sign_Index.php?Sign_up");
                            }
                        }
                    ?>
                </form>
            </nav>
            <i class="fa-solid fa-bars"></i>
        </header>

