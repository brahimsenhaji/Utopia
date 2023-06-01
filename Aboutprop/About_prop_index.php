<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./About_prop_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header >
          <a href="#" class="Logo"><img src="../Images/Logo1.png" alt="Logo"></a>
            <nav class="Slide">
                <ul>
                    <div class="logo">
                        <img src="../Images/Logo.png" alt="">
                    </div>
                    <li><a href="#">Home</a></li>
                    <li><a href="./buyingpage/buyingpage_index.php">Buy</a></li>
                    <?php 
                      if(isset($_SESSION['UserId'])){
                       echo ' <li><a href="./listingpage/listing_index.php">Sell</a></li>';
                      }
                      else{
                        echo ' <li><a href="./sign-in-up_page/sign_Index.php">Sell</a></li>';
                      }
                    ?>
                    
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
  <?php 
       if(isset($_POST['More-btn'])){
        $propId = $_GET['prop-id'];


         // include database connection file
         include '../Classes/db_PDS.class.php';

         // prepare the SQL statement to select all properties
         $sql = "SELECT * FROM properties WHERE id = $propId;";
         $result = mysqli_query($conn, $sql);

         // check if any properties exist
         if (mysqli_num_rows($result) > 0) {
                 //display property image(s)
                while ($row = mysqli_fetch_assoc($result)) {    
                    $id = $row['id'];
                    $sql2 = "SELECT * FROM images WHERE property_id = $id LIMIT 1 ;";
                    $result2 = mysqli_query($conn, $sql2);

                    $sql3 = "SELECT * FROM images WHERE property_id = $id;";
                    $result3 = mysqli_query($conn, $sql3);
                    echo "<div class='main'>";             
                        echo "<div class='Image-wrap'>";
                            echo "<div class='wrap'>";
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    if (mysqli_num_rows($result3) > 0) {
                                        echo  "<img  class='img' id='img' src='../uploads/" . $row3['image_url'] . "'/>";
                                    }  
                                }
                            echo "</div>"; 
                            while ($row2 = mysqli_fetch_assoc($result2)) {                   
                                if (mysqli_num_rows($result2) > 0) {
                                    echo  "<img class='index-img' src='../uploads/" . $row2['image_url'] . "'/>";
                                }     
                            }
                        echo "</div>";  
                        echo "<div class='Info-wrap'>";
                             // display property information
                             echo "<h1>" . $row["title"] . "</h1>";
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

                             echo "<div class='price'>";
                                echo "<h2>Price</h2>";
                                echo "<p>{$row["price"]} DH</p>";
                             echo "</div>";

                             echo "<div class='description'>";
                                     echo "<h2>Description</h2>";
                                     echo "<p>{$row["disruption"]}</p>";
                             echo "</div>";

                             echo "<div class='adresse'>";
                                     echo "<h2>Adresse</h2>";
                                        echo "<div class='ad'>";
                                            echo "<p>City : {$row["city"]}</p>";
                                            echo "<p>Street : {$row["street_name"]}</p>";
                                        echo "</div>";
                                     echo "</div>";  
                             echo "</div>";
                                 
                        echo "</div>";  
                        
                    echo "</div>";    
                }
         }else {
            echo "No properties found.";
         }

         // close the database connection
         mysqli_close($conn);

       }
    ?>
    <footer>

    </footer>
    <script src="./About_prop_script.js"></script>
</body>
</html>