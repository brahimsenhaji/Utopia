<?php
// include database connection file
include '../Classes/db_PDS.class.php';
session_start();
 // Get the user input
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
 $userId = $_SESSION['UserId'];

if(isset($_POST['upload-btn'])){
    if(!empty($title) && !empty($category) && !empty($disruption) && !empty($floors) && !empty($rooms) && !empty($kitchen) && !empty($bathroom) && !empty($price) && !empty($city) && !empty($street_name) && !empty($house_number)){
         // Insert property details into the database
    $sql = "INSERT INTO properties (user_id,title, category, floors, rooms, kitchen, bathroom, price, city, street_name, house_number,disruption,latitude,longitude) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
  
mysqli_stmt_bind_param($stmt, "issiiiiissssdd", $userId, $title, $category, $floors, $rooms, $kitchen, $bathroom, $price, $city, $street_name, $house_number, $disruption, $latitude, $longitude);
mysqli_stmt_execute($stmt);
}

// Get the ID of the last inserted property
$property_id = mysqli_insert_id($conn);

// Iterate over the uploaded images
foreach($_FILES['file']['tmp_name'] as $key => $tmp_name){
// Get information about the image
$img_name = $_FILES['file']['name'][$key];
$img_size = $_FILES['file']['size'][$key];
$error = $_FILES['file']['error'][$key];

if($error === 0){
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = '../uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        // Insert image into the database
        $sql = "INSERT INTO images (property_id, image_url) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "is", $property_id, $new_img_name);
            mysqli_stmt_execute($stmt);
        }
    }else {
        $em = "You can't upload files of this type";
        header("Location: index.php?error=$em");
        exit();
    }
} else {
    $em = "An error occurred while uploading the image.";
    header("Location: index.php?error=$em");
    exit();
}

}

// Close the database connection
mysqli_close($conn);

// Redirect to success page
header("Location: ../sellingpage/sellingpage_index.php?success");
exit();
    }
   else{
      header("Location: ../sellingpage/sellingpage_index.php?FildesAreEmpty");
      
    }
}

if(isset($_POST['cancel-btn'])){
   header('Location: ../listingpage/listing_index.php');
}
