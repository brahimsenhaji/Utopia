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
                    <li><a href="#">Rent</a></li>
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
        <form action="../Includes/iteminforamtion_inc.php" method="post" enctype="multipart/form-data" class="form">
            <div class="input-wrap">
                <label>Title</label>
                <input type="text" name="title"  require>
            </div>
            <div class="input-wrap">
                <label>Category</label>
                <select name="category" class="Category" id="">
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                </select>
            </div>
            <div class="input-wrap">
                <div class="container">
                    <div class="drag-area">
                        <div class="icon">
                             <i class="fa-solid fa-image"></i>
                        </div>

                        <span class="header">Drag & Drop</span>
                        <span class="header">or <span class="SelectImage">browse</span></span>
                        <input type="file" name="file[]" hidden multiple  class="file-input" accept="image/*"/>
                        <span class="support">Supports: JPEG, JPG, PNG</span>
                    </div>
                </div>
            </div>
            <div class="images">
                <div class="image-wrap" >

                </div>
            </div>
            <div class="wrap">
                <div class="input-wrap" id="Floors">
                    <label>Floors</label>
                    <input type="text" name="floors"  require>
                </div>
                <div class="input-wrap">
                    <label>Rooms</label>
                    <input type="text" name="rooms"  require>
                </div>
                <div class="input-wrap">
                    <label>Kitchen</label>
                    <input type="text" name="kitchen"  require>
                </div>
                <div class="input-wrap">
                    <label>Bathroom</label>
                    <input type="text" name="bathroom"  require>
                </div>
            </div>
            <div class="input-wrap">
                <label>Price</label>
                <input type="text" name="price"  require>
            </div>
            <div class="input-wrap">
            <label>City</label>
            <select name="city">
                <option value="">Select</option>
                <?php
                include '../Classes/db_PDS.class.php';

                $sql = "SELECT * FROM ville";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['id'].'">'.$row['ville'].'</option>';
                    }
                }

                mysqli_close($conn);
                ?>
                
            </select>
            </div>
            <div class="input-wrap">
                <label>Street name</label>
                <input type="text" name="street"  require>
            </div>
            <div class="input-wrap">
                <label>Number</label>
                <input type="text" name="number"  require>
            </div>
            <div class="buttons">
                <button type="submit" class="cancel-btn" name="cancel-btn">Cancel</button>
                <button type="submit" class="upload-btn" name="upload-btn">Upload</button>
            </div>
        </form>
    </section>
   </main>

<script src="./sellingpage_script.js"></script>
</body>
</html>