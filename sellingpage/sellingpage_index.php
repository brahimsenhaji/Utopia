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
    <link rel="stylesheet" href="./sellingpage_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
    
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
                    <li><a href="../listingpage/listing_index.php">Sell</a></li>   
                    <li><a href="../listingpage/listing_index.php">Rent</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <form action="../Includes/logout_inc.php" method="Get" class="logout" id="logout">
                       <button name="settings" class="settings"><i class="fa-regular fa-user"></i></button>
                       <button name="Log_out" class="Log_out"><i class="fa-solid fa-right-from-bracket"></i></i></button>
                </form>        

            </nav>
            <i class="fa-solid fa-bars"></i>
        </header>
   <main>
    <section>
        
    <form action="../Includes/iteminforamtion_inc.php" method="post" enctype="multipart/form-data" class="form" onsubmit="return validateForm(this)">
            <div class="input-wrap">
                <label>Title *</label>
                <input type="text" name="title" id="title" class="title" required>
                <div id="error-message" class="error-message">Please enter a title.</div>
            </div>
            <div class="input-wrap">
                <label>Category *</label>
                <select name="category" class="category" id="input" required>
                    <option value="">Select</option>
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                </select>
                <div id="error-message" class="error-message">Please select category.</div>
            </div>
            <div class="input-wrap">
                <div class="container">
                    <div class="drag-area">
                        <div class="icon">
                             <i class="fa-solid fa-image"></i>
                        </div>

                        <span class="header">Drag & Drop</span>
                        <span class="header">or <span class="SelectImage">browse</span></span>
                        <input type="file" name="file[]" hidden multiple  class="file-input" accept="image/*" id="input" required/>
                        <span class="support">Supports: JPEG, JPG, PNG</span>
                    </div>
                </div>
            </div>
            <div id="error-message" class="error-message">Please add image.</div>
            <div class="images">
                <div class="image-wrap" >

                </div>
            </div>
            <div class="input-wrap" id="Disruption">
                    <label>Description *</label>
                    <textarea class="disruption" name="disruption" id="disruption" cols="30" rows="10" required id="input"></textarea>
                    <div id="error-message" class="error-message">Please add description.</div>
            </div>
            <div class="wrap">
                <div class="input-wrap" id="Floors">
                    <label>Floors *</label>
                    <input class="floors" type="text" name="floors" id="floors" required>
                    <div id="error-message" class="error-message">Please add floors number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Rooms *</label>
                    <input class="rooms" type="text" name="rooms" id="rooms" required>
                    <div id="error-message" class="error-message">Please add rooms number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Kitchen *</label>
                    <input class="kitchen" type="text" name="kitchen" id="kitchen" required>
                    <div id="error-message" class="error-message">Please add kitchen number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Bathroom *</label>
                    <input class="bathroom" type="text" name="bathroom" id="bathroom" required>
                    <div id="error-message" class="error-message">Please add bathroom number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
            </div>
            <div class="input-wrap">
                <label>Price *</label>
                <input class="price" type="text" name="price" id="input" required>
                <div id="error-message" class="error-message">Please add price number.</div>
                <div id="error-message" class="error-message-number">This must be a number.</div>
            </div>
            <div class="input-wrap">
            <label>City *</label>
            <select name="city" id="input" class="city">
                <option value="">Select</option>
                <?php
                include '../Classes/db_PDS.class.php';

                $sql = "SELECT * FROM ville ORDER BY ville ASC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['ville'].'">'.$row['ville'].'</option>';
                    }
                }

                mysqli_close($conn);
                ?>
                <div id="error-message" class="error-message">Please select city.</div>
            </select>
            </div>
            <div class="input-wrap">
                <label>Street name *</label>
                <input class="street" type="text" name="street" id="input" required>
                <div id="error-message" class="error-message">Please add street name.</div>
            </div>
            <div class="input-wrap">
                <label>Number *</label>
                <input class="number" type="text" name="number" id="input"  required>
                <div id="error-message" class="error-message">Please add number.</div>
            </div>
            <div class="map-wrap">
                <label class="showMap">Open the map to add your address</label>
                <div class="map-div">
                  <i class="fa-solid fa-xmark"></i>
                   <div id="map" style="width: 80%; height: 80%; filter: grayscale(50%);" ></div>
                </div>
                <input type="text" name="Latitude" class="Latitude" id="input" style="display:none;" required>
                <input type="text" name="Longitude" class="Longitude" id="input" style="display:none;" required>
                <div id="error-message" class="error-message">Please use the map to enter your address.</div>
            </div>
            <div class="buttons">
                <button type="submit" class="cancel-btn" name="cancel-btn">Cancel</button>
                <button type="submit" class="upload-btn" name="upload-btn" id='upload-btn'>Upload</button>                
            </div>
        </form>
    </section>
   </main>

<script src="./sellingpage_script.js"></script>
<script src="./error_script.js"></script>
<script src="./selling_map.js"></script>
</body>
</html>