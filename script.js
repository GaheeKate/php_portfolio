/* This file is only used to demo the transitionend event. */
let square = document.getElementById("sq-three");

square.addEventListener("transitionend", function(){
  console.log("transition ended");
})