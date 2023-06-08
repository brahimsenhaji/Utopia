<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./listing_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="../Images/Logo.png" />
    <link rel="stylesheet" href="../NavBar/Navbar_style.css">
    <title>Document</title>
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


        <!--==========================================================================-->
        <main>
            <div class="img1">
                <img src="../Images/image12.png">
            </div>
            <h1 class="text">THANK YOU FOR TRUSTING US</h1>
                
            <div class="cards">
               <div class="container">
                <div class="card">

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="transparent" stroke-width="3" fill="transparent"></path>
                    </svg>
                    
                    <div class="card__content">
                     <p class="card__title">Sell your property</p>
                     <a href="../sellingpage/sellingpage_index.php"  class="card-link">GET STARTED</a>
                    </div>
                </div>
                </div>
                <div class="container">
                <div class="card">

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="transparent" stroke-width="3" fill="transparent"></path>
                    </svg>
                    
                    <div class="card__content">
                    <p class="card__title">Rent your property</p>
                    <a href="../sellingpage/sellingpage_index.php" class="card-link">GET STARTED</a>
                    </div>
                </div>
                </div>
            </div>
        </main>
        <script src="./selling_index.js"></script>
        <script src="../NavBar/Navbar_script.js"></script>
</body>
</html>