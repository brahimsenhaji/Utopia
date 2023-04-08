<?php 
 $regionId;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sellingpage_style.css">
    <title>Document</title>
</head>
<body>
    
   
   <main>
    <section>
        <form action="" method="post">
            <div class="input-wrap">
                <label>Title</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Category</label>
                <select name="Category" class="Category" id="">
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                </select>
            </div>
            <div class="input-wrap">
            <div class="container">
        <h3>Upload your File :</h3>
        <div class="drag-area">
            <div class="icon">
                <i class="fas fa-images"></i>
            </div>

            <span class="header">Drag & Drop</span>
            <span class="header">or <span class="button">browse</span></span>
            <input type="file" hidden />
            <span class="support">Supports: JPEG, JPG, PNG</span>
        </div>
        <div>
            <button class="download">Download</button>
        </div>
    </div>
               

            </div>
            <div class="input-wrap" id="Floors">
                <label>Floors</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Rooms</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Kitchen</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Bathroom</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Price</label>
                <input type="text" name=""  require>
            </div>
            <div class="input-wrap">
                <label>Contact information</label>
                <input type="text" name="contact"  require>
            </div>
            <div class="input-wrap">
            <label>Select a city</label>
            <select name="Cities">
                <option value="">Select</option>
                <?php
                include '../Classes/db_PDS.class.php';

                $sql = "SELECT * FROM ville";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['region'].'">'.$row['ville'].'</option>';
                    }
                }

                mysqli_close($conn);
                ?>
            </select>
            </div>
            <div class="input-wrap">
                <label>Street name</label>
                <input type="text" name="contact"  require>
            </div>
            <div class="input-wrap">
                <label>Number</label>
                <input type="text" name="contact"  require>
            </div>
        </form>
    </section>
   </main>

<script src="./sellingpage_script.js"></script>
</body>
</html>