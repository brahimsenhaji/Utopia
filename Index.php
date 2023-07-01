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
    <link rel="stylesheet" href="./NavBar/Navbar_style.css">
    <link rel="stylesheet" href="./Chat/chat_style.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./Images/Logo_W.png" />
    <title>Utopia</title>
</head>
<body>
    <div class="startup" value = "true">
    <video src="./Videos/video8..mp4" type="video/mp4" autoplay loop muted plays-inline allow="autoplay" class="video8"></video>

    </div>
    <video src="./Videos/video5.mp4" type="video/mp4" autoplay loop muted plays-inline allow="autoplay" class="video5"></video>
    <section class="Landing-Page">  
   
        <video autoplay loop muted plays-inline  class="video1" allow="autoplay">
            <source src="./Videos/video1.mp4" type="video/mp4">
        </video>
        <!--=======================INCKUDE NAV BAR=====================================-->
            <?php include "./NavBar/Navbar_index.php"?>
         <!--==========================================================================-->
        <main>
          <div class="main-content">
            <h1>Get your dream house</h1>
            <form action="./buyingpage/buyingpage_index.php?city={$_GET['search']}" class="input-group" method="get">
                <input type="text" class="input" id="serch" name="search" placeholder="Enter City name" autocomplete="off" required>
                <script>
                    document.getElementById('serch').addEventListener('invalid', function(event) {
                        event.preventDefault();
                        document.getElementById('serch').setAttribute('placeholder', 'Please Enter city name');
                        document.getElementById('serch').style.border = "1px solid red";
                    });
                    document.getElementById('serch').addEventListener('input', function(event) {
                        event.preventDefault();
                        document.getElementById('serch').style.border = "1px solid transparent";
                    });
                </script>
                <input class="button--submit" value="Search" type="submit">
            </form>
          </div>
        </main>
    </section>

    <section class="Nearby">
        <div class="Nearby-title">
            <p>Find Your Properties</p>
            <h1>Nearby Properties</h1>
        </div>

        <div class="Nearby-container">
        <div class="slider" id="slider">
            <?php 
              
               if(isset($_COOKIE['City'])){
                echo "<script>";
                    echo "let Nearbysection = document.querySelector('.Nearby');";
                    echo "Nearbysection.style.display = 'block';";
                echo"</script>";
                $cityName = $_COOKIE['City'];
                echo "<p>Explore : {$cityName}</p>";
               }else{
                echo "<script>";
                  echo "let Nearbysection = document.querySelector('.Nearby');";
                  echo "Nearbysection.style.display = 'none';";
                echo"</script>";
               }
               
            ?>
            <div class="slide" id="slide">
                
                <?php
                        // include database connection file
                        include './Classes/db_PDS.class.php';

                        if(isset($_COOKIE['City'])){
                            $cityName = $_COOKIE['City'];
                            // prepare the SQL statement to select all properties
                            $sql = "SELECT * FROM properties WHERE city = '{$cityName}';";
                            $result = mysqli_query($conn, $sql);
                            // check if any properties exist
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each property
                                    while ($row = mysqli_fetch_assoc($result)) {    
                                    echo "<div class='Nearby-card'>";
                                            // display property image(s)
                                            $id = $row['id'];
                                            $sql2 = "SELECT * FROM images WHERE property_id = $id LIMIT 1;";
                                            $result2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($result2) > 0) {
    
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo "<div class='card-images'>";
                                                        echo "<img class='img' src='./uploads/". $row2['image_url'] . "' width='100%' />";
                                                    echo "</div>";
                                                    } 

                                            }
                                            echo "<div class='Card-info'>";
                                                // display property information
                                                echo "<h2>" . $row["title"] . "</h2>";
                                                echo "<div class='info'>";
                                                    if($row["category"] == "House"){
                                                        echo '<i class="fa-solid fa-house"></i>';
                                                    }
                                                    else{
                                                        echo '<i class="fa-solid fa-building"></i>';
                                                    }
                                                
                                                    echo "<p class='floors-data' data-value='{$row["floors"]}'>{$row["floors"]} Floors</p>";
                                                    echo "<p>{$row["rooms"] } Rooms</p>";
                                                    echo "<p>{$row["kitchen"] } Kitchen</p>";
                                                    echo "<p>{$row["bathroom"] } Bathroom</p>";
                                            echo "</div>";

                                            echo "<div class='More-info'>";
                                                echo "<p class='price'>Price " . $row["price"] . " DH</p>";
                                                echo "<form action='./Aboutprop/About_prop_index.php?prop-id={$row['id']}' method='post'>";
                                                echo "<input class='moreinfo' name='More-btn' type='submit' value='More info'>";
                                                echo "</form>";
                                        echo "</div>";

                                        echo "</div>";
                                    echo "</div>";     
                                    }
                            } else {
                            echo "No properties found.";
                            }
                        }
                        else{
                            // prepare the SQL statement to select all properties
                            $sql = "SELECT * FROM properties;";
                            $result = mysqli_query($conn, $sql);
                            echo "No properties found.";
                        }
                        // close the database connection
                        mysqli_close($conn);
                ?>
            </div>
        </div>
    <button class="ctrl-btn pro-prev"><i class="fa-solid fa-greater-than"></i></button>
    <button class="ctrl-btn pro-next"><i class="fa-solid fa-less-than"></i></button>
</div>

    </section>

    <section class="help-page" id="help-page">
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
    <section class="About-Utopia" id="About-Utopia">
       
        <h1 class="About-title">About Utopia</h1>
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
          <img src="./Images/Logo_B.png" class="footer-logo" alt="">
            <ul>
               <a href="#"><li>Home</li></a>
               <a href="./listingpage/listing_index.php"><li>Sell</li></a>
               <a href="./buyingpage/buyingpage_index.php"><li>Buy</li></a>
               <a href="./listingpage/listing_index.php"><li>Rent</li></a>
               <a href="#About-Utopia"><li>About</li></a>
               <a href="#help-page"><li>Help</li></a>
               <a href=""><li>Contact</li></a>
            </ul>
           <p class="copyright">Copyright © 2023 Utopia, All Rights Reserved.</p>
        </div>
    </footer>
  
    <script src="./script.js"></script>
    <script src="./NavBar/Navbar_script.js"></script>
    <script src="./Slider_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./startUp_script.js"></script>
</body>
</html>
