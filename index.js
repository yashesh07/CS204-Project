document.getElementById('selectedTrainTable')
      .addEventListener('click', function (item) {
          var row = item.path[1];
          document.getElementById('train_id').value = row.cells[0].innerHTML;
      });
