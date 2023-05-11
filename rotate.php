<?php

include("tvCore.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index-rotate.css" />
    <title>Patrocine - Media Indoor</title>
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
            <div class="principal-img">
                <?php
                if (isset($anunciantesPrincipais[1])) {
                    echo '
                    <img src="./uploads/' . $anunciantesPrincipais[1]["banner"] . '" />
                    ';
                }
                ?>
            </div>
            <div class="qr-code">
                <h2>Anuncie Aqui!</h2>
                <img src="./assets/qr-code.png" />
            </div>
            <div class="principal-img">
                <?php
                if (isset($anunciantesPrincipais[0])) {
                    echo '
                    <img src="./uploads/' . $anunciantesPrincipais[0]["banner"] . '" />
                    ';
                }
                ?>
            </div>
        </main>
        <main class="ad-flow">
            <main class="ad-overflow">
                <?php

                $anuncianteIndex = 0;
                for ($i = 0; $i < 3; $i++) {
                    echo '<div class="ad-collum">';
                    for ($j = 0; $j < 3; $j++) {
                        if (isset($anunciantesSecundarios[$anuncianteIndex])) {
                            echo '
                            <div class="ad-box">
                                <img src="./uploads/' . $anunciantesSecundarios[$anuncianteIndex]["banner"] . '"  />
                            </div>
                            ';
                        } else {
                            echo '
                            <div class="ad-box">
                                <img src="" />
                            </div>
                            ';
                        }
                        $anuncianteIndex++;
                    }
                    echo '</div>';
                }

                ?>
            </main>
        </main>
    </section>
    <script src="tvSlider.js"></script>
</body>

</html>