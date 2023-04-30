let category = document.querySelector('.category');
let Floors = document.querySelector('#Floors');

category.addEventListener('click',()=>{
    if(category.value == "Apartment"){
        Floors.setAttribute('style',' display: none;');
    }
    else if(category.value == "House"){
        Floors.setAttribute('style',' display: bolck;');
    }
})


let selectImage = document.querySelector('.SelectImage');
let fileInput = document.querySelector('.file-input');
let imageWrap = document.querySelector('.image-wrap');
let images = document.querySelector('.images');
let imageCount = 0;

selectImage.addEventListener('click', () => {
  images.setAttribute('style', 'display:block;');
  fileInput.click();
});

fileInput.addEventListener('change', (event) => {
  const files = event.target.files;

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();

    if (file.type.match(/image.*/)) {
      reader.addEventListener('load', () => {
        let url = reader.result;
        let img = document.createElement('div');
        img.setAttribute('style', "background-image: url(" + url+ ");");
        img.setAttribute('class', 'img');
        imageWrap.appendChild(img);

      });

      reader.readAsDataURL(file);
    }
  }
});
