
function changeQuery(index){
    let e = document.getElementsByClassName("queries");
    for(var i = 0; i<e.length; i++){
      if(i==index){
        e[i].style.display = "block";
      }
      else{
        e[i].style.display = "none";
      }
    }
    // e.style.backgroundColor = '#'+(Math.random().toString(16)+'00000').slice(2,8);
}


// (function () {
//     'use strict'
//     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
//     tooltipTriggerList.forEach(function (tooltipTriggerEl) {
//       new bootstrap.Tooltip(tooltipTriggerEl)
//     })
//   })()