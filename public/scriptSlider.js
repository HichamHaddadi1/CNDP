/*NAVIGATION_BAR*/
function mynavigation() {
  var x = document.getElementById("topnav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}
/*NAVIGATIONBAR ENDS*/
/*CARD_SCROLLER*/
document.addEventListener("click", closeAllSelect);
function scrollright(){
  document.getElementById("section3").scrollLeft += 400;
}
function scrollleft(){
  document.getElementById("section3").scrollLeft -= 400;
}
/*CARD_SCROLLERENDS*/