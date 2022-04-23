
function changeColor(){
    let e = document.getElementById("test");
    e.style.backgroundColor = '#'+(Math.random().toString(16)+'00000').slice(2,8);
}


(function () {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()