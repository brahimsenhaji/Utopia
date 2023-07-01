let startup = document.querySelector('.startup');





window.onload = ()=>{
  setTimeout(()=>{
    if (startup.value === 'true') {
        // Disable scrolling
        document.body.style.overflow = "hidden";
      } else {
        // Enable scrolling
        document.body.style.overflow = "scroll";
      }

    startup.style.display = "none";
   },7000);
}