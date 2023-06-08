<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./buyingpage_style.css">
     <!-- Include Leaflet CSS and JavaScript -->
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
     <link rel="shortcut icon" type="image/x-icon" href="../Images/Logo_W.png" />

     <title>Utopia-buy</title>
</head>
</head>
<body>
        <!--=======================INCKUDE NAV BAR=====================================-->
         
<header >
            <a href="../Index.php" class="Logo"><img src="../Images/Logo3.png" alt="Logo"></a>
            <nav class="Slide">
                <img src="../Images/Logo_B.png" class="side_logo">
                <ul>
                    <li><a href="../Index.php">Home</a></li>
                    <li><a href="../buyingpage/buyingpage_index.php">Buy</a></li>
                    <?php 
                      if(isset($_SESSION['UserId'])){
                       echo ' <li><a href="../listingpage/listing_index.php">Sell</a></li>';
                      }
                      else{
                        echo ' <li><a href="../sign-in-up_page/sign_Index.php">Sell</a></li>';
                      }
                    ?>
                     <?php 
                      if(isset($_SESSION['UserId'])){
                       echo ' <li><a href="../listingpage/listing_index.php">Rent</a></li>';
                      }
                      else{
                        echo ' <li><a href="../sign-in-up_page/sign_Index.php">Rent</a></li>';
                      }
                    ?>
                    <li><a href="../Index.php?#help-page">Help</a></li>
                </ul>
                <form action="../Includes/logout_inc.php" method="Get" class="logout">
                    <?php 
                        if(isset($_SESSION['UserId']))
                        {
                          echo  '<button name="settings" class="settings"><i class="fa-regular fa-user"></i></button>';
                          echo  "<div name='notification' class='notification'>";
                              echo  "<i class='fa-solid fa-bell'></i>";
                                echo "<div class = 'msg'>";
                                    include '../Classes/db_PDS.class.php';
                                    $sql = "SELECT * FROM messages WHERE receiver_id = ? AND is_read = 0";
                                    $stmt = mysqli_stmt_init($conn);
                            
                                    if(!mysqli_stmt_prepare($stmt, $sql)){
                                        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                                        exit();
                                    }
                                    else{
                                        mysqli_stmt_bind_param($stmt, "i", $_SESSION['UserId']);
                                        mysqli_stmt_execute($stmt);
                            
                                        $result = mysqli_stmt_get_result($stmt);
                                        $unreadCount = mysqli_num_rows($result);

                                            
                                        if(isset($_COOKIE['message_id'])){
                                            $isread = $_COOKIE['message_id'];
                                            $receiver_id = $_SESSION['UserId'];

                                            $sql2 = "UPDATE messages SET is_read = 1 WHERE message_id = ?";
                                            $stmt2 = mysqli_stmt_init($conn);


                                            if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                                                header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                                                exit();
                                            } else {
                                                mysqli_stmt_bind_param($stmt2, "i", $isread);
                                                mysqli_stmt_execute($stmt2);
                                            }
                                        }
                                        echo $unreadCount;

                                        mysqli_stmt_close($stmt);
                                    }
                                echo "</div>";
                          echo   "</div>";
                          echo  '<button name="Log_out" class="Log_out"><i class="fa-solid fa-right-from-bracket"></i></i></button>';
                        }
                        ?>
                </form>
                <?php 
                    echo"<div class='notification-wrap'>";
                      echo "<h1>Notification</he>";
                        echo "<form action='../Chat_Page/chatPage_index.php' method='get' class = 'notification-form'>";
                                        include '../Classes/db_PDS.class.php';
                                
                                        $sql = "SELECT * FROM messages WHERE receiver_id = ? AND is_read = 0";
                                        $stmt = mysqli_stmt_init($conn);
                                
                                        if(!mysqli_stmt_prepare($stmt, $sql)){
                                            header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                                            exit();
                                        }
                                        else{
                                            mysqli_stmt_bind_param($stmt, "i", $_SESSION['UserId']);
                                            mysqli_stmt_execute($stmt);
                                
                                            $result = mysqli_stmt_get_result($stmt);
                                            while($row = mysqli_fetch_assoc($result)){
                                                $sql2 = "SELECT * FROM users WHERE user_id = ?;";
                                                $stmt2 = mysqli_stmt_init($conn);

                                                if(!mysqli_stmt_prepare($stmt2, $sql2)){
                                                    header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                                                    exit();
                                                }else{
                                                    mysqli_stmt_bind_param($stmt2, "i", $row['sender_id']);
                                                    mysqli_stmt_execute($stmt2);

                                                    $result2 = mysqli_stmt_get_result($stmt2);
                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            echo "<button class='read_msg' name='user-id' data-message-id='{$row['message_id']}' value='{$row['sender_id']}'>You've got a new message from: {$row2['user_name']}</button>";
                                                        }
                                                }
                                            }
                                            echo "<script>
                                            let read_msg = document.querySelectorAll('.read_msg');
                                            read_msg.forEach(msg => {
                                                msg.addEventListener('click', () => {
                                                    let messageId = msg.getAttribute('data-message-id');
                                                    document.cookie = 'message_id=' + messageId;
                                                });
                                            });
                                        </script>";
                                            
                                        }
                        echo "</form>"; 
                   echo "</div>";
                ?>      
                <form action="" method="Get">
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


        <!--==========================================================================-->
        <main>
        <img src="../Images/image13.png" class="image13">
        <img src="../Images/image13.png" class="image14">
            <section class="Filter">
                    <div class="title-wrap">
                        <h1>Filter By</h1>
                        <p>Finde the best property for you</p>
                    </div>
                <form action="../Includes/Filter_inc.php" method="get">
                    <div class="input-wrap">
                        <label>City</label>
                        <select name="city" id="input" class="city-input">
                            <option value="">Select</option>
                            <?php
                            include '../Classes/db_PDS.class.php';

                            $sql = "SELECT * FROM ville ORDER BY ville ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                 echo "<option>{$row['ville']}</option>";
                                }
                            }

                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="input-wrap">
                        <label>Category</label>
                        <select name="category" class="category-input" id="input">
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                        </select>
                    </div>
                    <div class="input-wrap" id="Floors">
                        <label>Floors</label>
                        <input class="floors-input" type="text" name="floors" id="input" require>
                     

                    </div>
                    <div class="input-wrap">
                        <label>Rooms</label>
                        <input class="rooms-input" type="text" name="rooms"  id="input" require>
                    </div>
                    <div class="input-wrap">
                        <label>Kitchen</label>
                        <input class="kitchen-input" type="text" name="kitchen"  id="input" require>
                    </div>
                    <div class="input-wrap">
                        <label>Bathroom</label>
                        <input class="bathroom-input" type="text" name="bathroom"  id="input" require>
                    </div>
                   
                </form>
            </section>
            <section class="properties">
                <?php
                        // include database connection file
                        include '../Classes/db_PDS.class.php';

                        // prepare the SQL statement to select all properties
                        $sql = "SELECT * FROM properties ORDER BY created_at DESC;";
                        $result = mysqli_query($conn, $sql);

                        // check if any properties exist
                        if (mysqli_num_rows($result) > 0) {
                        // Create an empty array to store the coordinates 
                            $coordinates = []; 
                            $images = [];
                           
                        // output data of each property
                        while ($row = mysqli_fetch_assoc($result)) {    
                                 // display property image(s)
                                
                                 $id = $row['id'];
                                 $sql2 = "SELECT * FROM images WHERE property_id = $id LIMIT 1;";
                                 $result2 = mysqli_query($conn, $sql2);
                                 if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo "<div class='Card' data-value='{$row['id']}' title-value='{$row["title"]}' city-value='{$row["city"]}' category-value='{$row["category"]}' floor-value='{$row["floors"]}' rooms-value='{$row["rooms"]}' kitchen-value='{$row["kitchen"]}' bathroom-value='{$row["bathroom"]}' latitude-value='{$row["latitude"]}' longitude-value='{$row["longitude"]}' image-value='{$row2['image_url']}'>";

    
                                     echo "<img class='card-img' src='../uploads/" . $row2['image_url'] . "' width='200' />";
                                     $images[] = [
                                        'image' => $row2['image_url']
                                      ];
                                    }
                                    $imagesJson = json_encode($images);

                                    //Store the Images JSON as string in localStorage
                                    echo "<script>";
                                    echo "localStorage.setItem('images', JSON.stringify(" .  $imagesJson . "));";
                                    echo "</script>";
                          
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
                                    
                                    echo "<div class='description'>";
                                            echo "<p>{$row["disruption"]}</p>";

                                    echo "</div>";
                                    
                                    echo "<div class='More-info'>";
                                      echo "<p class='price'>Price " . $row["price"] . " DH</p>";
                                      echo "<form action='../Aboutprop/About_prop_index.php?prop-id={$row['id']}&user-id={$row['user_id']}' method='post'>";
                                       echo "<input class='moreinfo' name='More-btn' type='submit' value='More info'>";
                                      echo "</form>";
                                    echo "</div>";
                                echo "</div>";
                          echo "</div>";    
                            // Store latitude and longitude values in the coordinates array
                            
                          $coordinates[] = [
                          'latitude' => $row["latitude"],
                          'longitude' => $row["longitude"]
                          ];
                        }
                           // Convert the coordinates and images array to JSON
                            $coordinatesJson = json_encode($coordinates);

                            // Store the JSON string in localStorage
                            echo "<script>";
                            echo "localStorage.setItem('coordinates', JSON.stringify(" . $coordinatesJson . "));";
                            echo "</script>";

                            
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
                            .leaflet-touch .leaflet-bar a{background-color: black ; color: white; border: none; transition: 0.3S;}
                            .leaflet-touch .leaflet-bar a:hover{color: rgb(0, 0, 0); border: none; background-color: white;}

                        </style>
                <script>

                const map = L.map('map').setView([0, 0], 13);
                const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
            
                if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(position => {

                  
                let markerIcon = L.icon({
                    iconUrl: '../Images/marker_icon1.png',

                    iconSize:     [40, 40], // size of the icon
                    iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });

                let markerCard = L.marker([50.4501, 30.5234],{alt: 'Kyiv'}).addTo(map) // "Kyiv" is the accessible name of this marker
                    .bindPopup('Kyiv, Ukraine is the birthplace of Leaflet!');

                    const latlng = [position.coords.latitude, position.coords.longitude];
                    map.setView(latlng, 13);
                    L.marker([latlng[0], latlng[1]], {icon: markerIcon}).bindPopup("<b>This is your location</b>").openPopup().addTo(map);

                    var circle = L.circle([latlng[0], latlng[1]], {
                        color: 'white',
                        fillColor: 'black',
                        fillOpacity: 0.5,
                        radius: 2500
                    }).addTo(map);
                  

                    
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

                //------------------------------------------------------------------------------------------------------
                
                let coordinates = localStorage.getItem("coordinates");
                
                    if (coordinates) {
                        coordinates = JSON.parse(coordinates);

                        for (let i = 0; i < coordinates.length; i++) {

                           let markerIcon = L.icon({
                                iconUrl: '../Images/marker_icon1.png',

                                iconSize:     [40, 40], // size of the icon
                                iconAnchor:   [20, 40], // point of the icon which will correspond to marker's location
                                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                            });

                            let latitude = coordinates[i].latitude;
                            let longitude = coordinates[i].longitude;

                            let marker = L.marker([latitude, longitude],{icon: markerIcon}).addTo(map);

                                marker.on('click', (e)=>{
                                    //looping through the cards data to get the number of the Coordinate    
                                    cards.forEach(card =>{
                                            let cardValue_latitude = card.getAttribute('latitude-value');
                                            let cardValue_longitude = card.getAttribute('longitude-value');
                                            let cardValue_image = card.getAttribute('image-value');
                                            let cardValue_title = card.getAttribute('title-value');
                                            let images = localStorage.getItem("images");
                                            images = JSON.parse(images);


                                            let popupInfo = L.popup();

                                            
                                          for(let j = 0 ; j < images.length; j++){
                                            
                                            let image = images[j].image;
                                            console.log(image)
                                                if(e.latlng.lat == cardValue_latitude && e.latlng.lng == cardValue_longitude){
                                                    card.classList.remove('hide');
     
                                                        if(image == cardValue_image){
                                                            
                                                        popupInfo
                                                        .setLatLng(e.latlng)
                                                        .setContent(
                                                            "<div><h2>"+cardValue_title+"</h2><br><img style='cursor: pointer;' src='../uploads/" + image + "'></div>"
                                                            )
                                                        .openOn(map);
                                                        
                                                        
                                                       }
                                                      
                                                       
                                                }
                                                else{
                                                    card.classList.add('hide');
                                                }
                                           }
                                    });
                                });
                        }
                    }
                  
                </script>
               

            </section>
        </main>
        <script src="./buyingpage_script.js"></script>
        <script src="../NavBar/Navbar_script.js"></script>
</body>
</html>