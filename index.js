document.getElementById('selectedTrainTable')
      .addEventListener('click', function (item) {
          var row = item.path[1];
          setCookie('train_number', row.cells[0].innerHTML);
      });

    function setCookie(cName, cValue) {
        document.cookie = cName + "=" + cValue + "; " + "; path=/";
}