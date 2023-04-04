<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./Images/Logo.png" />
    <title>Utopia</title>
</head>
<body>
    <video src="./Videos/video5.mp4" type="video/mp4" autoplay loop muted plays-inline allow="autoplay" class="video5"></video>
    <section class="Landing-Page">  
   
        <video autoplay loop muted plays-inline  class="video1" allow="autoplay">
            <source src="./Videos/video1.mp4" type="video/mp4">
        </video>
       <!---->
       <header >
            <a href="#" class="Logo"><img src="./Images/Logo3.png" alt="Logo"></a>
            <nav class="Slide">
                <ul>
                    <div class="logo">
                        <img src="./Images/Logo.png" alt="">
                    </div>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Sell</a></li>
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
        <main>
          <div class="main-content">
            <h1>Get your dream house</h1>
            <form class="input-group">
                <input type="email" class="input" id="Email" name="" placeholder="Enter an Address, City, State, Zip" autocomplete="off">
                <input class="button--submit" value="Search" type="submit">
            </form>
          </div>
        </main>
    </section>
    <section class="help-page">
        <div class="title">
            See how Utopia can help
        </div>
        <!---------------------------------------------------------------------------->
        <div class="container">
            <div class="testimonial grid">
                 <!-- First testimoinal card details -->
                <div class="testimonal-card">
                    
                   <h1>Increased Accessibility</h1>
                   <p>Providing a convenient platform for individuals to browse and search for properties from anywhere with an internet connection, making it easier to find and compare properties.</p>
                </div>
    
                <!-- Second testimoinal card details -->
                <div class="testimonal-card">
                   
                    <h1>Streamlined Process</h1>
                   <p>Simplify the process of buying, selling, or renting a property by enabling users to communicate with sellers or landlords, view property listings, and even complete transactions online.</p>
                </div>
    
                <!-- thered testimoinal card details -->
                <div class="testimonal-card">
    
                    <h1>Wider Exposure</h1>
                   <p>Provide a larger audience for property listings, making it easier for sellers and landlords to find interested buyers and tenants, and increasing the chances of finding a successful match.</p>
                </div>
    
            </div>
        </div>
    </section>
    <section class="Sell">
         <p>You're In Good Hands</p>
         <h1>SELL YOUR PROPERTY THROUGH Utopia</h1>
         <button>SELL NOW</button>
    </section>
    <!--------------------------------------------------------------------------------------------------------->
  
    
    <!--------------------------------------------------------------------------------------------------------->
    <section class="About-Utopia">
       
        <h1>About Utopia</h1>
        <div class="About-text">
            <p>
                Utopia is a website dedicated to helping people buy, sell, and rent homes. Whether you are a first-time homebuyer or a seasoned real estate investor, Utopia is your one-stop-shop for all your real estate needs. <br><br>

                Utopia has a user-friendly interface that makes it easy to search for properties. You can filter your search by location, price range, property type, and more. The website has a vast database of properties, including single-family homes, townhouses, condos, apartments, and commercial properties. <br><br>
                
                Sellers can list their properties on Utopia for a small fee, and buyers can contact them directly through the website. Utopia provides tools to help sellers market their properties effectively, such as professional photography, virtual tours, and detailed property descriptions. <br><br>
                
                In addition to buying and selling homes, Utopia also allows users to rent properties. Whether you need a temporary rental or a long-term lease, you can find what you're looking for on Utopia. Renters can search for properties by location, price range, and property type. They can also contact landlords directly through the website.
            </p>
           
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <img src="./Images/Logo1.png" alt="">
        </div>
        <div class="footer-text">
            <ul>
                <li>Home</li>
                <li>Sell</li>
                <li>Buy</li>
                <li>Rent</li>
                <li>About</li>
                <li>contact</li>
            </ul>


        </div>
    </footer>
  
    <script src="./script.js"></script>
   
</body>
</html>
