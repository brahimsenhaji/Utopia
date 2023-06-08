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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>
<body>

  <div class="Contacts">
    <h1>Your Contacts</h1>
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


<script>
   window.onload = function() {
        let chat_window = document.querySelector('.chat-window');
        chat_window.scrollTo(0, chat_window.scrollHeight);
   }
</script>
</body>
</html>