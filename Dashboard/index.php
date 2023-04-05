<?php

include("./actions/getDadosIndex.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./dashboard.css" />
  <title>Dashboard</title>
</head>

<body>
  <section class="dashboard-left">
    <button id="tvs-btn">TV's Online</button>
    <button id="create-ad-btn">Criar Anuncio</button>
    <button id="add-movie-btn">Adicionar Filme</button>
  </section>

  <section class="dashboard-right">
    <main class="tvs-online">
      <h2 class="tittle">TV's Online</h2>
      <main class="tvs-flow">
        <?php
        while ($tv = $resultTvs->fetch_array()) {
          $nomeDoFilme = "SLIDER";

          if ($tv["filme"] != "SLIDER") {
            $filmeExibido = array_values(array_filter($arrayFilmes, function ($filme) use ($tv) {
              return $filme["id"] === $tv["filme"];
            }))[0];
            $nomeDoFilme = $filmeExibido["nome"];
          }

          echo ('
            <div class="tv-box">
            <h2>Tv ' . $tv["id"] . '</h2>
            <h3>' . $nomeDoFilme . '</h3>
            <button onClick="definirTv(' . $tv["id"] . ')" id="editar-btn">Editar</button>
          </div>
            ');
        }
        ?>
      </main>
      <main class="edit-area">
        <div class="top-area">
          <button id="fechar-btn">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <main class="film-select">
          <h2>Escolha o Filme Exibido:</h2>
          <select id="filme-exibido">
            <option value="SLIDER">Slider</option>
            <?php
            foreach ($arrayFilmes as $filme) {
              echo "<option value='" . $filme["id"] . "'>" . $filme["nome"] . "</option>";
            }
            ?>
          </select>

          <div class="preview-ad">
            <h2>Preview Anunciantes</h2>
            <div class="ad-flow">
              <div class="principal-ads">
                <img id="anunciante-thumb" src="../assets/logo.png" />
                <img id="anunciante-thumb" src="../assets/logo_wbr.jpg" />
              </div>

              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box-original">
                <img id="anunciante-thumb" src="../assets/logo2.png" alt="" />
              </div>
            </div>
          </div>
        </main>

        <main class="ad-select" id="ads">
          <div class="principal-ads" id="main-ads">
            <?php

            for ($i = 0; $i < 2; $i++) {
              echo "
              <div class='ad-option'>
              <select id='principal-" . $i . "'>
              ";
              foreach ($arrayAnunciantes as $anunciante) {
                echo "<option value='" . $anunciante["id"] . "'>" . $anunciante["nome"] . "</option>";
              }
              echo "
              <option value='null'>Nenhum</option>
              </select>
              </div>
              ";
            }
            ?>
          </div>
          <?php

          for ($i = 0; $i < 9; $i++) {
            echo "
            <div class='ad-option'>
            <select id='secundario-" . $i + 2 . "'>
            ";
            foreach ($arrayAnunciantes as $anunciante) {
              echo "<option value='" . $anunciante["id"] . "'>" . $anunciante["nome"] . "</option>";
            }
            echo "
            <option value='null'>Nenhum</option>
            </select>
            </div>
            ";
          }
          ?>
        </main>
      </main>
    </main>

    <main class="add-ads">
      <main class="ads-left-original">
        <h2>Anunciantes Disponiveis</h2>
        <div class="ads-wrap-original">
          <script>
            // Botão de apagar filme
            function handleDeleteAnunciante(id) {
              window.location.href = `../api/DELETE/apagarAnunciante.php?id=${id}`;
            };
          </script>
          <?php

          foreach ($arrayAnunciantes as $anunciante) {
            echo ('
            <div class="ad-box-original">
            <img src="../uploads/' . $anunciante["banner"] . '" />
            <div class="onoff on"></div>
            <button onClick="handleDeleteAnunciante(' . $anunciante["id"] . ')" class="delete">
              <i class="fa-solid fa-trash"></i>
            </button>
          </div>
            ');
          }

          ?>
        </div>
      </main>
      <main class="ads-right-original">
        <form method="POST" action="../api/POST/adicionarAnunciante.php" enctype="multipart/form-data">
          <h2>Nome Do Anunciante</h2>
          <input name="nomeAnunciante" class="input-name" type="text" placeholder="Digite o Nome" autocomplete="off" />
          <input name="bannerAnunciante" class="input-file" type="file" placeholder="Adicionar Logo" autocomplete="off" accept="image/*" required />
          <button type="submit">Adicionar</button>
        </form>
      </main>
    </main>

    <main class="add-film">
      <form method="POST" action="../api/POST/adicionarFilme.php" enctype="multipart/form-data">
        <h2>Adicionar Filme</h2>

        <label>Nome:</label>
        <input name="nomeFilme" type="text" class="input-name" placeholder="Digite o Nome" autocomplete="off" required />

        <label>Fundo:</label>
        <input name="bannerFilme" class="input-file" type="file" accept="image/*" autocomplete="off" required />

        <label>Vídeo/Trailer: </label>
        <input name="trailerFilme" class="input-file" type="file" accept="video/*" autocomplete="off" required />

        <button name="submitFilme" type="submit">Adicionar Filme</button>
      </form>


      <main class="film-flow">
        <script>
          // Botão de apagar filme
          function handleDeleteClick(id) {
            window.location.href = `../api/DELETE/apagarFilme.php?id=${id}`;
          };
        </script>
        <?php

        foreach ($arrayFilmes as $filme) {
          $data = explode(" ", $filme["dataDeCriacao"])[0];
          $dadosData = explode("-", $data);
          $dataReversa = array_reverse($dadosData);

          echo ("
          <div class='film-box'>
            <h2>" . $filme["nome"] . "</h2>
            <h3>Adicionado em " . join("/", $dataReversa) . "</h3>
            <button onClick=\"handleDeleteClick('" . $filme["id"] . "')\">Apagar</button>
         </div>
          ");
        }

        ?>
      </main>
    </main>
  </section>
  <script src="./scripts/dashboard.js"></script>
  <script src="./scripts/editarTv.js"></script>
</body>

</html>