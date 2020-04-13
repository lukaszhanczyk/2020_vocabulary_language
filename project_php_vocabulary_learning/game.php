<?php
require_once "header.php";

if (isset($_SESSION['uName']) && isset($_GET['pId']) && isset($_GET['pName'])) {
  require "./includes/dbh.inc.php";
?>
  <div class="row">
    <div class="col-md-2 col-0"></div>
    <div class="col-md-8 col-12 d-flex flex-column align-items-center main_content">
      <div class="interface d-flex justify-content-end">
        <a href="./userpanel.php" class="btn btn-light">Cofnij</a>
      </div>
      <div class="con">
        <div id="fronFlashCard" class="con">1</div>
        <div id="backFlashCard" class="con">2</div>
      </div>
      <div class="interface">
        <div id="pBar" class="progress">
          <div id="progressBar" class="progress-bar"></div>
        </div>
        <div id="buttonsPanel" class="interface d-flex justify-content-center align-items-center">
          <button id="checkA" class="button btn btn-outline-secondary" onclick="checkAnswer()">Sprawdź</button>
        </div>
        <form>
          <div class="custom-control custom-switch">
            <input id="reverse" type="checkbox" class="custom-control-input">
            <label class="custom-control-label" for="reverse">Obróć stronę fiszki</label>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-2 col-0"></div>
  </div>
  <script>
    var vocabulary = [
      <?php
      $pId = $_GET['pId'];
      $sql = "SELECT words_in_pl.word_in_pl, words_in_en.word_in_en
             FROM words_in_en
             INNER JOIN (words_in_pl
               INNER JOIN translations_pl_en
               ON words_in_pl.ID_word_in_pl = translations_pl_en.ID_word_in_pl)
             ON words_in_en.ID_word_in_en = translations_pl_en.ID_word_in_en
             WHERE translations_pl_en.ID_package=?";
      $t = [];
      $i = 0;
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ./userpanel.php?error=sqlError");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "i", $pId);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        echo "[";
        while ($row = mysqli_fetch_assoc($results)) {
          echo "\"" . $row['word_in_pl'] . "\",";
          $t[$i] = $row['word_in_en'];
          $i++;
        }
        echo "],";
        echo "[";
        foreach ($t as $value) {
          echo "\"" . $value . "\",";
        }
        echo "]";
      }
      ?>
    ];
    var mis = [
      [],
      []
    ];
    var i = 0;
    var front = 0;
    var back = 1;
    var amountWords = vocabulary[0].length;

    var fronFlashCard = document.getElementById('fronFlashCard');
    var backFlashCard = document.getElementById('backFlashCard');
    var reverse = document.getElementById('reverse');
    var progressBar = document.getElementById('progressBar');
    var buttonsPanel = document.getElementById('buttonsPanel');

    fronFlashCard.innerHTML = vocabulary[0][0];
    backFlashCard.innerHTML = vocabulary[1][0];

    reverse.addEventListener("change", function() {
      if (!reverse.checked) {
        front = 0;
        back = 1;
        fronFlashCard.innerHTML = vocabulary[front][i];
        backFlashCard.innerHTML = vocabulary[back][i];
      } else {
        front = 1;
        back = 0;
        fronFlashCard.innerHTML = vocabulary[front][i];
        backFlashCard.innerHTML = vocabulary[back][i];
      }
    });

    function barProgress() {
      progressBar.style.width = ((i + 1) / amountWords) * 100 + "%";
    }
    barProgress();

    function hid() {
      fronFlashCard.style.visibility = "hidden";
    }

    function show() {
      fronFlashCard.style.visibility = "visible";
    }

    function check() {
      if (i == vocabulary[0].length) {
        if (mis[0].length != 0) {
          alert("Miałeś " + mis[0].length + " błędów! \n Popraw się!")
          vocabulary = mis;
          i = 0;
          mis = [
            [],
            []
          ];
          amountWords = vocabulary[0].length;
          progressBar.style.width = 0 + "%";
        } else {
          alert("Gratuluje!")
          window.location.href = './userpanel.php';
        }
      }
      barProgress();
      checkButton();
      fronFlashCard.style.visibility = "visible";

      fronFlashCard.removeEventListener("click", hid, false);
      backFlashCard.removeEventListener("click", show, false);
    }

    function checkButton() {
      buttonsPanel.innerHTML = '<button id="checkA" class="button btn btn-outline-secondary" onclick="checkAnswer()">Sprawdź</button>';
    }

    function checkAnswer() {
      buttonsPanel.innerHTML = '<button id="know" class="button btn btn-outline-danger" onclick="dKnowFunction()">Nie wiem</button><button id="dKnow" class="button btn btn-outline-success" onclick="knowFunction()">Wiem</button>';
      fronFlashCard.innerHTML = vocabulary[back][i];
      backFlashCard.innerHTML = vocabulary[front][i];
      fronFlashCard.addEventListener("click", hid);
      backFlashCard.addEventListener("click", show);
    }

    function knowFunction() {
      i++;
      check();
      fronFlashCard.innerHTML = vocabulary[front][i];
      backFlashCard.innerHTML = vocabulary[back][i];

    }

    function dKnowFunction() {
      mis[0].push(vocabulary[0][i]);
      mis[1].push(vocabulary[1][i]);
      i++;
      check();
      fronFlashCard.innerHTML = vocabulary[front][i];
      backFlashCard.innerHTML = vocabulary[back][i];
    }
  </script>
<?php
} else {
  header('Location: ./index.php');
}
require_once "footer.php";
?>