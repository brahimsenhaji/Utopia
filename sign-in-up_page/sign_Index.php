<?php 
    
include '../Includes/autoloader_classses.php';

    if (isset($_POST["sign-up-btn"]))
    {
      
        session_start();
        $_SESSION['name']  = $_POST["name"];
        $_SESSION['email']  = $_POST["email"];
        $_SESSION['phone']  = $_POST["phone"];
        $_SESSION['password']  = $_POST["password"];

        $EmailVerification = new EmailVerification();

        $EmailVerification->SendEmail( $_SESSION['email']);


        $dom = new DOMDocument();
        $dom->loadHTMLFile('../OTP/otp_index.php');
        $logo = $dom->getElementById('otp-section');
        $logo->setAttribute('style', ' opacity: 1;  z-index: 1000;');
        echo $dom->saveHTML();

       
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="./Images/Logo.png" />
    <link rel="stylesheet" href="./sign_style.css" />
  </head>
  <body>
    <main>
      <?php
       require '../OTP/otp_index.php'; 
      ?>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="../Includes/login_inc.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo" id="logo">
                <img src="../Images/Logo3.png" alt="Utopia" />
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Password</label>
                  
                </div>
                <input type="submit" value="Sign In" class="sign-btn" id="sign-in-btn" name="sign-in-btn"/>

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>
  
            <form action="" autocomplete="off" class="sign-up-form" method="POST">
              <div class="logo" id="logo">
                <img src="../Images/Logo3.png" alt="Utopia" />
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="name"
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                    <input
                      type="tel"
                      class="input-field"
                      autocomplete="off"
                      required
                      name="phone"
                    />
                    <label>Phone</label>
                  </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="password"
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" id="sign-up-btn" name="sign-up-btn"/>

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <video autoplay loop muted plays-inline  class="video1" allow="autoplay">
                <source src="../Videos/video4.mp4" type="video/mp4">
            </video>

          </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="./sign_script.js" type="module"></script>
  </body>
</html>