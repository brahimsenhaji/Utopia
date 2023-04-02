let Log_in = document.querySelector(".Log_in");
let Sign_in = document.querySelector(".Sign_in");





window.onscroll = ()=>{
    let container = document.querySelector('.container');
    if(window.scrollY >= 413){
        container.classList.add('active2');
    }
    //adding the bubble stye
    let video5 = document.querySelector('.video5');
    if(window.scrollY < 950){
        video5.style.display = "none";
    }
    else{
        video5.style.display ="block";
    }

}

let title = document.querySelector('.title');
const Helpabserver1 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            title.classList.add('active1');
        }
    })
});

Helpabserver1.observe(title);



let menu = document.querySelector('.fa-bars');
menu.addEventListener('click',()=>{
    let Slide = document.querySelector('.Slide');
    Slide.classList.toggle('Slideing');

    menu.classList.toggle('fa-xmark')
})

