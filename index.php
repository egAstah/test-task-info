<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }

  body {
    padding: 30px;
  }

  .modal-bg {
    display: none;
    justify-content: center;
    align-items: center;
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, .3);
    z-index: 999;
  }

  .modal {
    padding: 30px;
    border-radius: 5px;
    background: #fff;
    width: 50%;
    position: relative;
  }

  .close {
    position: absolute;
    right: 30px;
    top: 30px;
    padding: 10px;
  }

  input {
    padding: 5px 15px;
    margin: 10px 0;
  }

  #result {
    height: 200px;
    overflow: auto;
  }
</style>

<body>
  <button class="btn-modal">Список городов</button>
  <div class="modal-bg">
    <div class="modal">
      <h3>Список городов</h3>
      <input type="text" id="city-name" placeholder="Введите название города" />
      <div id="result"></div>
      <button class="close">x</button>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script>
    function postAjax(data) {
      $.ajax({
        url: "./ajax.php",
        method: "post",
        dataType: "html",
        data: data,
        success: function(data) {
          $("#result").html(data)
        },
      });
    }
    postAjax({
      event: 'start'
    })
    $(document).on('input', '#city-name', function() {
      if ($(this).val().length >= 3) {
        postAjax({
          value: $(this).val(),
          event: 'filter'
        })
      } else {
        $("#result").html('')
      }
    })
    $(document).on('click', '.btn-modal', function() {
      $('.modal-bg').css('display', 'flex')
    })
    $(document).on('click', '.close', function() {
      $('.modal-bg').hide()
    })
  </script>
</body>

</html>
