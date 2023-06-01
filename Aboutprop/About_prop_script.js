let image = document.querySelectorAll('.img');
let index_img = document.querySelector('.index-img');
image.forEach(img =>{
  img.addEventListener("mouseover", ()=>{
    let src =  img.getAttribute("src");
    index_img.setAttribute("src",src);
  });
});

