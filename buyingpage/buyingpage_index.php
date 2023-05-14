<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./buyingpage_style.css">
     <!-- Include Leaflet CSS and JavaScript -->
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
</head>
</head>
<body>
<header >
            <a href="#" class="Logo"><img src="../Images/Logo3.png" alt="Logo"></a>
            <nav class="Slide">
                <ul>
                    <div class="logo">
                        <img src="../Images/Logo.png" alt="">
                    </div>
                    <li><a href="#">Home</a></li>
                    <li><a href="../buyingpage/buyingpage_index.php">Buy</a></li>
                    <?php 
                      if(isset($_SESSION['UserId'])){
                       echo ' <li><a href="../listingpage/listing_index.php">Sell</a></li>';
                      }
                      else{
                        echo ' <li><a href="../sign-in-up_page/sign_Index.php">Sell</a></li>';
                      }
                    ?>
                    
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <form action="../Includes/logout_inc.php" method="Get" class="logout">
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
            <section class="Filter">
                    <div class="title-wrap">
                        <h1>Filter By</h1>
                        <p>Finde the best property for you</p>
                    </div>
                <form action="" method="get">
                    <div class="input-wrap">
                        <label>City</label>
                        <select name="city" id="input" class="city">
                            <option value="">Select</option>
                            <?php
                            include '../Classes/db_PDS.class.php';

                            $sql = "SELECT * FROM ville";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                 echo "<option value='{$row['ville']}'>{$row['ville']}</option>";
                                }
                            }

                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="input-wrap">
                        <label>Category</label>
                        <select name="category" class="category" id="input">
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                        </select>
                    </div>
                    <div class="input-wrap" id="Floors">
                        <label>Floors</label>
                        <input class="floors" type="text" name="floors" id="input" require>
                    </div>
                    <div class="input-wrap">
                        <label>Rooms</label>
                        <input class="rooms" type="text" name="rooms"  id="input" require>
                    </div>
                    <div class="input-wrap">
                        <label>Kitchen</label>
                        <input class="kitchen" type="text" name="kitchen"  id="input" require>
                    </div>
                    <div class="input-wrap">
                        <label>Bathroom</label>
                        <input class="bathroom" type="text" name="bathroom"  id="input" require>
                    </div>
                   
                </form>
            </section>
            <section class="properties">
                <?php
                        // include database connection file
                        include '../Classes/db_PDS.class.php';

                        // prepare the SQL statement to select all properties
                        $sql = "SELECT * FROM properties;";
                        $result = mysqli_query($conn, $sql);

                        // check if any properties exist
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each property
                        while ($row = mysqli_fetch_assoc($result)) {
                         echo "<div class='Card'>";
                                // display property image(s)
                                
                                $id = $row['id'];
                                $sql2 = "SELECT * FROM images WHERE property_id = $id LIMIT 1;";
                                $result2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($result2) > 0) {
                                    
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                     echo "<img src='../uploads/" . $row2['image_url'] . "' width='200' />";
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
                                        
                                        echo "<p>{$row["floors"] } Floors</p>";
                                        echo "<p>{$row["rooms"] } Rooms</p>";
                                        echo "<p>{$row["kitchen"] } Kitchen</p>";
                                        echo "<p>{$row["bathroom"] } Bathroom</p>";
                                    echo "</div>";
                                    
                                    echo "<div class='description'>";
                                            echo "<p>{$row["disruption"]}</p>";

                                    echo "</div>";
                                    
                                    echo "<div class='More-info'>";
                                      echo "<p class='price'>Price " . $row["price"] . " DH</p>";
                                      echo "<a href='#'>More info</a>";
                                    echo "</div>";
                                    
                                echo "</div>";
                            
                          echo "</div>";
                        }
                        
                        } else {
                           echo "No properties found.";
                        }

                        // close the database connection
                        mysqli_close($conn);
                ?>
            </section>
            <section class="map">
            <div id="map" style="width: 100%; height: 100%; filter: grayscale(50%);"></div>

                        <style>
                            .leaflet-control-attribution{display: none;}
                            .leaflet-touch .leaflet-bar a{background-color: black ; color: white; border: none;}
                        </style>
                <script>

               const map = L.map('map').setView([0, 0], 13);
                const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(position => {
                    const latlng = [position.coords.latitude, position.coords.longitude];
                    map.setView(latlng, 13);
                    L.marker(latlng).addTo(map);

                    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng[0]}&lon=${latlng[1]}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.display_name;
                        console.log(address);
                    })
                    .catch(error => console.log(error));
                });
                } else {
                console.log('Geolocation is not available');
                }

                </script>
               

            </section>
        </main>
        <script src="./buyingpage_script.js"></script>
      
</body>
</html>