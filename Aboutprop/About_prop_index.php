<?php 
 session_start();
 ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./About_prop_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../NavBar/Navbar_style.css">
    <link rel="stylesheet" href="../Chat/chat_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../Images/Logo_W.png" />
    <title>Utopia</title>
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

        <!--==============================================================================================-->

  <?php 
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

    ?>
    <button name = 'contact-btn' class ='Contact-btn' onclick="showMesageBox()"><i class='fa-sharp fa-solid fa-message'></i>Contact</button>
    <?php 
    if(isset($_SESSION['UserId'])){
        include "../Chat/chat_index.php";

        echo "  <script>
        function showMesageBox(){

            let card = document.querySelector('#card');
            card.classList.toggle('showBox');
        }
       </script>";
    }
    else{
        echo "<div class = 'message'><h1>To contact the owner, you have to sign in.</h1></div>";

        echo " <script>
        function showMesageBox(){
            let message = document.querySelector('.message');
            message.classList.toggle('ShowMessage');
        }
        </script>";
    }
     
    ?>
    <style>
        .message{
            position: absolute;
            width: 350px;
            text-align: center;
            padding: 5px;
            background-color: var(--PrimaryColor);
            color: var(--SecondColor);
            right: 5%;
            top: 70%;
            border: 1px solid var(--SecondColor);
            display: none;
            transition: 0.3s;
        }
        .ShowMessage{
            display: block;
        }
    </style>
    <footer>

    </footer>
    <script src="./About_prop_script.js"></script>
    <script src="../NavBar/Navbar_script.js"></script>
</body>
</html>