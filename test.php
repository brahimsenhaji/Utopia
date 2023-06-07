<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat System</title>
</head>
<body>
    <?php 
    include './Classes/db_PDS.class.php';

    if(isset($_SESSION['UserId'])){
        $Uid = $_SESSION['UserId'];

        $sql = "SELECT * FROM users where user_id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $Uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                echo "Hello  {$row['user_name']}";
            }
        }
    }
    else{
        echo "no result";
    }

    $Uid = $_SESSION['UserId'];
    $sql = "SELECT * FROM users WHERE user_id != ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $Uid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        echo "<form action='' method='get'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<br><button name='send-msg' value='{$row['user_id']}'> {$row['user_name']} </button><br>";
        }
        echo "</form>";
    }

    $msgSender = '';
    if(isset($_GET['send-msg'])){
        $msgSender = $_GET['send-msg'];
    } else {
        $msgSender = '';
    }
    ?>
    <h1>Chat System</h1>


    <!-- Chat Input -->
    <form action="" method="post">
        <input type="text" id="message" name="message" placeholder="Type your message..." />
        <button type="submit" name="sending">Send</button>
    </form>
    <?php 
    if (isset($_POST['sending'])) {
        include './Classes/db_PDS.class.php';

        $sql = "INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "iis", $_SESSION['UserId'], $msgSender, $_POST['message']);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        } else {
            header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
            exit();
        }
     }
    ?>
      <!-- Chat Display -->
      <div id="chat">
        <?php 
        include './Classes/db_PDS.class.php';

        $sql = "SELECT * FROM messages WHERE receiver_id = ? AND sender_id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ii", $_SESSION['UserId'], $_GET['send-msg']);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                echo "Sender is {$row['sender_id']} message is {$row['content']} <br>";
            }
        }
        ?>
    </div>
</body>
</html>
