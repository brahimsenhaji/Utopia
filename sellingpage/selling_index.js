




let menu = document.querySelector('.fa-bars');
menu.addEventListener('click',()=>{
    let Slide = document.querySelector('.Slide');
    Slide.classList.toggle('Slideing');

    menu.classList.toggle('fa-xmark')
})

