
<link rel="stylesheet" href="../OTP/otp_style.css">
<div class="otp-section" id="otp-section">
  <div class="container">
     <h4 class="title">We've sent a One Time Password (OTP) to your email </h4>
    <p>Please enter your OTP</p>
   
    <form id="otp-form" action="../Includes/otp_verify_inc.php" method="post">
      <div class="inputs">
        <input type="text" class="otp-input" maxlength="1" name="input1">
        <input type="text" class="otp-input" maxlength="1" name="input2">
        <input type="text" class="otp-input" maxlength="1" name="input3">
        <input type="text" class="otp-input" maxlength="1" name="input4">
      </div>
      <button id="verify-btn" name="verify-btn">Verify</button>
    </form>
  </div>
</div>
<script src="../OTP/otp_script.js"></script>