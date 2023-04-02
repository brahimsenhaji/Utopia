
const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");


inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});


toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});



if(window.location.href == "http://localhost/Utopia/sign-in-up_page/sign_Index.php?Sign_up"){
  main.classList.add("sign-up-mode");
}


let sign_up = document.querySelector('#sign-up-btn');
let otp_section = document.querySelector('.otp-section');
sign_up.addEventListener('click',()=>{
 
    let input_field = document.querySelectorAll('.input-field');
    input_field.forEach(input =>{
      if(input.value != ""){
        otp_section.classList.add("active-section");
      }
    })

})

