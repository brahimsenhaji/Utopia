<h1>Password</h1>

<form action="" method="get">
    <div class="input">
        <label>Current password</label>
       <div class="input-field">
            <input class="c-password" type="password" name="c-password" id="password"  required>
       </div>
    </div>
    <div class="input">
        <label>New password</label>
       <div class="input-field">
            <input class="n-password" type="password" name="n-password"  id="password"  required>
       </div>
    </div>
    <div class="input">
        <label>Confirm password</label>
       <div class="input-field">
            <input class="con-password" type="password" name="con-password"  id="password" required>
       </div>
    </div>
    
    <div class="buttons">
         <button type="submit" class="update">Update</button>
         <button type="submit" class="cancel">Cancel</button>
    </div>
</form>
<script>
let password = document.querySelectorAll('#password');
let eye = document.querySelector('.fa-eye');



function show() {
   password.forEach(pass =>{
        pass.setAttribute('type', 'text');
   })
}

function hide() {
    password.forEach(pass =>{
     pass.setAttribute('type', 'password');
   })
}

let pwShown = 0;
eye.addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
   


</script>


