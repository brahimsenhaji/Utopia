let fa_bars = document.querySelector('.fa-bars');
let nav_Slide = document.querySelector('.Slide');
fa_bars.addEventListener('click', ()=>{
  fa_bars.classList.toggle("xmark");
  nav_Slide.classList.toggle("show-nav");
});

let notification = document.querySelector(".notification");
let notification_wrap = document.querySelector(".notification-wrap");
notification.addEventListener("click", ()=>{
  notification_wrap.classList.toggle("show-notification");
});