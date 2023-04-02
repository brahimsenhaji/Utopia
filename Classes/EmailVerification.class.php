<?php
     
   //Import PHPMailer classes into the global namespace

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';
class EmailVerification {
   public $Active;
   public $email;
   
    //Methode to send verifaction email.
    function SendEmail($email){
    
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //Enable SMTP authentication
            $mail->SMTPAuth = true;

            //SMTP username
            $mail->Username = 'utopia.website1@gmail.com';

            //SMTP password
            $mail->Password = 'ipoazeppmamdimoo';

            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('your_email@gmail.com', 'Utopia');

            //Add a recipient
            $mail->addAddress($email);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 4);

            $mail->Subject = 'Email verification';
            $mail->Body    = '     
                <!DOCTYPE html>
                <html>
                <head>
                  <title>Email Confirmation</title>
                  <style type="text/css">
                    body {
                      font-family: Arial, sans-serif;
                      background-color: #f2f2f2;
                      padding: 0;
                      margin: 0;
                    }
                    .container {
                      max-width: 600px;
                      margin: 0 auto;
                      padding: 20px;
                      background-color: #ffffff;
                      border-radius: 5px;
                      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    }
                    h1 {
                      font-size: 24px;
                      color: #333333;
                      margin-bottom: 20px;
                    }
                    p {
                      font-size: 16px;
                      color: #666666;
                      line-height: 1.5;
                      margin-bottom: 20px;
                    }
                    button {
                      background-color: #1e90ff;
                      color: #ffffff;
                      border: none;
                      border-radius: 5px;
                      padding: 10px 20px;
                      font-size: 16px;
                      cursor: pointer;
                    }
                    button:hover {
                      background-color: #0077ff;
                    }
                    footer {
                      font-size: 14px;
                      color: #999999;
                      text-align: center;
                      margin-top: 20px;
                    }
                    .logo{
                      font-size:30px;
                      color:white;
                    }
                  </style>
                </head>
                <body>
                  <div class="container">
                   <h1 class="logo">Utopia</h1>
                    <h2>Email verification</h2>
                    <p>Thank you for signing up for our service. This is your verification Code."'.$verification_code.'" </p> 
                    
                    <footer>If you did not sign up for this service, please ignore this email.</footer>
                  </div>
                </body>
                </html>';
            
            
          $_SESSION['otp'] = $verification_code;

          $mail->send();

            
            
        }catch (Exception $e) {
          echo "Message could not be sent. : {$mail->ErrorInfo}";
       }
    }

   
  
}

