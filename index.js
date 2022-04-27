document.getElementById('selectedTrainTable')
      .addEventListener('click', function (item) {
          var row = item.path[1];
          setCookie('train_number', row.cells[0].innerHTML);
          setCookie('amount',row.cells[5].innerHTML);
      });

    function setCookie(cName, cValue) {
        document.cookie = cName + "=" + cValue + "; " + "; path=/";
}

document.getElementById('selectedTrainTable')
.addEventListener('click', function (item) {

    var row = item.path[1];
    row.style.backgroundColor = "#B4FF9F";

    for (var j = 0; j < row.cells.length; j++) {

    }

});

function btnClick() {
    var x = document.getElementById("selectedTrainTable").getElementsByTagName("td");
    
    x[0].style.backgroundColor = "yellow";            
}