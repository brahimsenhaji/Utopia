"use strict";

document.addEventListener("DOMContentLoaded", function() {
  productScroll();
});

function productScroll() {
  let slider = document.getElementById("slider");
  let next = document.getElementsByClassName("pro-next");
  let prev = document.getElementsByClassName("pro-prev");
  let slide = document.getElementById("slide");
  let item = document.getElementById("slide");

  for (let i = 0; i < next.length; i++) {
    let position = 0;

    prev[i].addEventListener("click", function() {
      if (position > 0) {
        position -= 1;
        translateX(position);
      }
    });

    next[i].addEventListener("click", function() {
      if (position >= 0 && position < hiddenItems()) {
        position += 1;
        translateX(position);
      }
    });
  }

  function hiddenItems() {
    let items = getCount(item, false);
    let visibleItems = Math.floor(slider.offsetWidth / (400 + 30)); // Width of item + gap
    return items - visibleItems;
  }
}

function translateX(position) {
  slide.style.left = position * -(400 + 30) + "px"; // Width of item + gap
}

function getCount(parent, getChildrensChildren) {
  let relevantChildren = 0;
  let children = parent.childNodes.length;
  for (let i = 0; i < children; i++) {
    if (parent.childNodes[i].nodeType !== 3) {
      if (getChildrensChildren)
        relevantChildren += getCount(parent.childNodes[i], true);
      relevantChildren++;
    }
  }
  return relevantChildren;
}



