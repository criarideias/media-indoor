<?php

include("tvCore.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <title>HTML Video Player</title>
</head>

<body>
  <section class="video-area">
    <div class="img-fundo">
      <img id="banner" src="./uploads/<?php echo ($filme["banner"]) ?>" alt="john wick" />
    </div>
    <div class="top-video">
      <video id="trailer" autoplay controls src="./uploads/<?php echo ($filme["trailer"]) ?>"></video>
    </div>
  </section>

  <section class="ad-area">
    <main class="top-area">
      <div class="top-img">
        <img src="./uploads/<?php echo ($anunciantesPrincipais[0]["banner"]) ?>" />
      </div>
      <div class="qr-code-area">
        <div class="qr-code">
          <h2>Anuncie Aqui!</h2>
          <img src="./assets/qr-code.png" />
        </div>
      </div>
      <div class="top-img">
        <img src="./uploads/<?php echo ($anunciantesPrincipais[1]["banner"]) ?>" />
      </div>
    </main>
    <main class="ad-flow">
      <main class="ad-overflow">
        <?php

        for ($i = 0; $i < 9; $i++) {
          if (isset($anunciantesSecundarios[$i])) {
            echo '
              <div class="ad-box">
                <img src="./uploads/' . $anunciantesSecundarios[$i]["banner"] . '"  />
              </div>
              ';
          }
        }

        ?>
      </main>
    </main>
  </section>
  <script src="tvSlider.js"></script>
</body>

</html>