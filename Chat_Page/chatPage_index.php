<?php  
if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./chatPage_style.css">
  <link rel="stylesheet" href="../NavBar/Navbar_style.css">
  <link rel="shortcut icon" type="image/x-icon" href="../Images/Logo_W.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Utopia-Chat</title>
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
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Help</a></li>
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
<main>
  <div class="Contacts">
    <h1>Your Contacts</h1>
    <img src="../Images/image13.png" class="image1">
  <?php 
      echo "<form action='' method='get' class='chat-input'>";
                          //==============================================Read messages===========================
              include '../Classes/db_PDS.class.php';

              // Retrieve sender and receiver IDs
              $sender_id = $_GET['user-id'];
              $receiver_id = $_SESSION['UserId'];

              // Retrieve messages
              $sql = "SELECT DISTINCT sender_id FROM messages WHERE sender_id != ?";
              $stmt = mysqli_stmt_init($conn);

              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfailed");
                  exit();
              } else {
                mysqli_stmt_bind_param($stmt, "i", $receiver_id);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM users WHERE user_id = ?";
                    $stmt2 = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt2, $sql2)) { // Fix: Use $stmt2 instead of $stmt
                        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfailed");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt2, "i", $row['sender_id']);
                        mysqli_stmt_execute($stmt2);

                        $result2 = mysqli_stmt_get_result($stmt2);

                          while ($row2 = mysqli_fetch_assoc($result2)) {
                           echo   "<button name = 'user-id' value = '{$row['sender_id']}' class = 'User-btn'>{$row2['user_name']}</button>";
                          }
                    }
                  }
              }
    echo "</form>";
  ?>    

  </div>
<div class="card" id="card">
    <div class="chat-header">
        <h4>Chat</h4>
      <?php 
            include '../Classes/db_PDS.class.php';   
            $sql = "SELECT * FROM users WHERE user_id = ?";
            $stmt = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
              exit();
            }
            else{
              mysqli_stmt_bind_param($stmt, "i",$_GET['user-id']);
              mysqli_stmt_execute($stmt);

              $result = mysqli_stmt_get_result($stmt);

              while($row = mysqli_fetch_assoc($result)){
                echo $row['user_name'];
              }
            }
      ?>
    </div>
    <div class="chat-window">
        <ul class="message-list">
            <?php 
            //==============================================Read messages===========================   
              include '../Classes/db_PDS.class.php';   
              // Retrieve sender and receiver IDs
              $sender_id = $_GET['user-id'];

              $receiver_id = $_SESSION['UserId'];

                // Retrieve messages
                $sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    
                    while($row = mysqli_fetch_assoc($result)){
                      $style = ($row['sender_id'] == $sender_id) ? "background-color: var(--SecondColor); color: var(--PrimaryColor); align-self: flex-start;" : "background-color: var(--PrimaryColor); align-self: flex-end;";
                      $timestamp = date("H:i", strtotime($row['timestamp']));
                      echo "<li style='$style'>{$row['content']}<p>{$timestamp}</p></li>";
                    }

                }
            ?>            
        </ul>
    </div>

    <form action="" method="post" class="chat-input">
        <input type="text" class="message-input" name="message" placeholder="Type your message here">
        <button class="send-button" name="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
    </form>
    <?php 
        // ========================== send the message==============================
        if(isset($_POST['send-btn'])){
          include '../Classes/db_PDS.class.php';
          $message = $_POST['message'];

          $sql = "INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);

          $msgReceiver = $_GET['user-id'];
          
          if (mysqli_stmt_prepare($stmt, $sql)) {
              mysqli_stmt_bind_param($stmt, "iis", $_SESSION['UserId'], $msgReceiver, $message);
              mysqli_stmt_execute($stmt);

            // Retrieve the variables from the URL parameters
            $userId = $_GET['user-id'];


            echo '<script>
      
            window.location.href = "../Chat_page/chatPage_index.php?user-id=' . $userId . '";

           </script>';
          } else {
              header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
              exit();
          }
        }
    ?>
  </div>
</main>

<script>
   window.onload = function() {
        let chat_window = document.querySelector('.chat-window');
        chat_window.scrollTo(0, chat_window.scrollHeight);
   }
</script>
<script src="../NavBar/Navbar_script.js"></script>
</body>
</html>