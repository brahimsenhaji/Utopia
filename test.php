<?php
// include database connection file
include './Classes/db_PDS.class.php';

// prepare the SQL statement to select all properties
$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);

// check if any properties exist
if (mysqli_num_rows($result) > 0) {
  // output data of each property
  while($row = mysqli_fetch_assoc($result)) {
    // display property information
    echo "<h2>" . $row["title"] . "</h2>";
    echo "<p>Category: " . $row["category"] . "</p>";
    echo "<p>Floors: " . $row["floors"] . "</p>";
    echo "<p>Rooms: " . $row["rooms"] . "</p>";
    echo "<p>Kitchen: " . $row["kitchen"] . "</p>";
    echo "<p>Bathroom: " . $row["bathroom"] . "</p>";
    echo "<p>Price: $" . $row["price"] . "</p>";
    echo "<p>City: " . $row["city"] . "</p>";
    echo "<p>Street: " . $row["street_name"] . "</p>";
    echo "<p>House number: " . $row["house_number"] . "</p>";
    // display property image(s)
    $id = $row['id'];
    $sql2 = "SELECT * FROM images WHERE property_id = $id;";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) {
    
      echo "<img src='./uploads/" . $row2['image_url']. "' width='200' />";
    
        }
    }

    echo "<hr>";
  }
} else {
  echo "No properties found.";
}

// close the database connection
mysqli_close($conn);
?>
