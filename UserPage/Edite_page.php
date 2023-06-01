<?php 
 if (isset($_POST["btn_delete"])) {
    $propertieID = $_GET['propertie'];
    include "../Classes/db_PDS.class.php";

    // Delete images associated with the property
    $sql = "DELETE FROM images WHERE property_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $propertieID);
        mysqli_stmt_execute($stmt);
    }

    // Delete the property itself
    $sql2 = "DELETE FROM properties WHERE id = ?";
    $stmt2 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt2, "s", $propertieID);
        mysqli_stmt_execute($stmt2);

        // Redirect to a success page or perform other necessary actions
        header("Location: userpage_index.php?properties=");
        exit();
    }
}

?>

<?php
            if(isset($_GET['propertie'])){
                $propertieID = $_GET['propertie'];

                include "../Classes/db_PDS.class.php";
                $sql = "SELECT * FROM properties where id = ?;";
        
                $stmt = mysqli_stmt_init($conn);
        
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                    exit();
                }
        
                else{
                    //Bind Param
                    
                    mysqli_stmt_bind_param($stmt, "s", $propertieID);
        
                    //Execute the Prepared Statement inside database
                    mysqli_stmt_execute($stmt);
        
                    $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                            $title = $row['title'];
                            $category = $row['category'];
                            $disruption = $row['disruption'];
                            $floors = $row['floors'];
                            $rooms = $row['rooms'];
                            $kitchen =$row['kitchen'];
                            $bathroom = $row['bathroom'];
                            $price = $row['price'];
                            $city =$row['city'];
                            $street_name =$row['street_name'];
                            $house_number = $row['house_number'];
                            $latitude =$row['latitude'];
                            $longitude = $row['longitude'];
                        }

                }
            }
                 
        ?>

<link rel="stylesheet" href="./Edite_page_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="goHome"> <i class="fa-solid fa-regular fa-arrow-left"></i> <a href="./userpage_index.php?properties=">Go back</a></div>
<div class="edit">
<form action="" method="post" enctype="multipart/form-data" class="form" onsubmit="return validateForm(this)">
            <div class="input-wrap">
                <?php 
   
                ?>
                <label>Title *</label>
                <input type="text" name="title" id="title" value="<?=$title?>" class="title" required>
                <div id="error-message" class="error-message">Please enter a title.</div>
            </div>
            <div class="input-wrap">
                <label>Category *</label>
                <select name="category"  class="category" id="input" required>
                    <option value="">Select</option>
                    <option value="House" <?php if ($category == 'House') echo 'selected'; ?>>House</option>
                    <option value="Apartment" <?php if ($category == 'Apartment') echo 'selected'; ?>>Apartment</option>
                </select>
                <div id="error-message" class="error-message">Please select category.</div>
            </div>
            <div class="input-wrap" id="Disruption">
                    <label>Description *</label>
                    <textarea class="disruption"  name="disruption" id="disruption" cols="30" rows="10" required id="input"><?=$disruption?></textarea>
                    <div id="error-message" class="error-message">Please add description.</div>
            </div>
            <div class="wrap">
                <div class="input-wrap" id="Floors">
                    <label>Floors *</label>
                    <input class="floors" value="<?=$floors?>" type="text" name="floors" id="floors" required>
                    <div id="error-message" class="error-message">Please add floors number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Rooms *</label>
                    <input class="rooms" value="<?= $rooms?>" type="text" name="rooms" id="rooms" required>
                    <div id="error-message" class="error-message">Please add rooms number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Kitchen *</label>
                    <input class="kitchen" value="<?= $kitchen?>" type="text" name="kitchen" id="kitchen" required>
                    <div id="error-message" class="error-message">Please add kitchen number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
                <div class="input-wrap">
                    <label>Bathroom *</label>
                    <input class="bathroom" value="<?= $bathroom?>" type="text" name="bathroom" id="bathroom" required>
                    <div id="error-message" class="error-message">Please add bathroom number.</div>
                    <div id="error-message" class="error-message-number">This must be a number.</div>
                </div>
            </div>
            <div class="input-wrap">
                <label>Price *</label>
                <input class="price" value="<?= $floors?>" type="text" name="price" id="input" required>
                <div id="error-message" class="error-message">Please add price number.</div>
                <div id="error-message" class="error-message-number">This must be a number.</div>
            </div>
            <div class="input-wrap">
            <label>City *</label>
            <select name="city" id="input"  class="city">
                <option value="">Select</option>
                <?php
                include '../Classes/db_PDS.class.php';

                $sql = "SELECT * FROM ville ORDER BY ville ASC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option " . (($city == $row['ville']) ? "selected" : "") . " value='{$row['ville']}'>{$row['ville']}</option>";
                    }
                }

                mysqli_close($conn);
                ?>
                <div id="error-message" class="error-message">Please select city.</div>
            </select>
            </div>
            <div class="input-wrap">
                <label>Street name *</label>
                <input class="street" value="<?= $street_name?>" type="text" name="street" id="input" required>
                <div id="error-message" class="error-message">Please add street name.</div>
            </div>
            <div class="input-wrap">
                <label>Number *</label>
                <input class="number"value="<?= $house_number?>" type="text" name="number" id="input"  required>
                <div id="error-message" class="error-message">Please add number.</div>
            </div>
            <div class="map-wrap">
                <label class="showMap">Open the map to add your address</label>
                <div class="map-div">
                  <i class="fa-solid fa-xmark"></i>
                   <div id="map" style="width: 80%; height: 80%; filter: grayscale(50%);" ></div>
                </div>
                <input type="text" name="Latitude" value="<?= $latitude?>" class="Latitude" id="input" style="display:none;" required>
                <input type="text" name="Longitude" value="<?= $longitude?>" class="Longitude" id="input" style="display:none;" required>
                <div id="error-message" class="error-message">Please use the map to enter your address.</div>
            </div>
            <div class="buttons">
                <button type="submit" class="cancel-btn" name="cancel-btn">Cancel</button>
                <button type="submit" class="upload-btn" name="Update-btn" id='upload-btn'>Update</button>                
            </div>
        </form>
</div>
<?php 

if(isset($_POST['Update-btn'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $disruption = $_POST['disruption'];
    $floors = $_POST['floors'];
    $rooms = $_POST['rooms'];
    $kitchen = $_POST['kitchen'];
    $bathroom = $_POST['bathroom'];
    $price = $_POST['price'];
    $city = $_POST['city'];
    $street_name = $_POST['street'];
    $house_number = $_POST['number'];
    $latitude = $_POST['Latitude'];
    $longitude = $_POST['Longitude'];

    include "../Classes/db_PDS.class.php";
    $sql = "UPDATE properties SET title=?, category=?, disruption=?, floors=?, rooms=?, kitchen=?, bathroom=?, price=?, city=?, street_name=?, house_number=?, latitude=?, longitude=? WHERE id=?";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    }

    else{
        mysqli_stmt_bind_param($stmt, "sssiiiiisssddi", $title, $category, $disruption, $floors, $rooms, $kitchen, $bathroom, $price, $city, $street_name, $house_number, $latitude, $longitude, $propertieID);
        mysqli_stmt_execute($stmt);

        // Redirect to a success page or perform other necessary actions
        // i want to go here http://localhost/Utopia/UserPage/userpage_index.php?properties=
        header("Location: ./Properties/propertiespage_index.php");
        exit();
    }
}
if(isset($_POST['cancel-btn'])){
    header("Location: ./userpage_index.php?properties=");
    exit();
}
?>

?>