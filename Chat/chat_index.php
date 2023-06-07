<?php  
if (!isset($_SESSION)) {
  session_start();
}

?>
<link rel="stylesheet" href="./chat_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            $propId = $_GET['prop-id'];
            $userId = $_GET['user-id'];

            // Set the header 
            header("Location: ../Aboutprop/About_prop_index.php?prop-id=" . $propId . "&user-id=" . $userId);
            exit();

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