<?php

include("../conexao.php");
include("actions/adicionarFilme.php");

$sqlFilmes = "SELECT * FROM `filmes`";
$resultFilmes = mysqli_query($con, $sqlFilmes);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <script src="https://kit.fontawesome.com/0997ab0a05.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <iframe name="hiddenFrame" hidden></iframe>
    <main class="tvs-online">
      <h2 class="tittle">TV's Online</h2>
      <main class="tvs-flow">
        <div class="tv-box">
          <h2>Tv 1</h2>
          <h3>Filme Exibido</h3>
          <button id="editar-btn">Editar</button>
        </div>
        <div class="tv-box">
          <h2>Tv 2</h2>
          <h3>Filme Exibido</h3>
          <button id="editar-btn">Editar</button>
        </div>
        <div class="tv-box">
          <h2>Tv 3</h2>
          <h3>Filme Exibido</h3>
          <button id="editar-btn">Editar</button>
        </div>
        <div class="tv-box">
          <h2>Tv 4</h2>
          <h3>Filme Exibido</h3>
          <button id="editar-btn">Editar</button>
        </div>
        <div class="tv-box">
          <h2>Tv 5</h2>
          <h3>Filme Exibido</h3>
          <button id="editar-btn">Editar</button>
        </div>
      </main>
      <main class="edit-area">
        <div class="top-area">
          <button id="fechar-btn">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <main class="film-select">
          <h2>Escolha o Filme Exibido:</h2>
          <select name="" id="">
            <option>Slider</option>
            <option>Shazam</option>
            <option>John Wick</option>
            <option>dasda</option>
            <option>dsad</option>
          </select>

          <div class="preview-ad">
            <h2>Preview Anunciantes</h2>
            <div class="ad-flow">
              <div class="principal-ads">
                <img src="../assets/logo.png" alt="" />
                <img src="../assets/logo_wbr.jpg" alt="" />
              </div>

              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
              <div class="ad-box">
                <img src="../assets/logo2.png" alt="" />
              </div>
            </div>
          </div>
        </main>

        <main class="ad-select">
          <div class="principal-ads">
            <div class="ad-option">
              <select>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
              </select>
            </div>
            <div class="ad-option">
              <select>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
                <option>Criar Ideias</option>
              </select>
            </div>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
          <div class="ad-option">
            <select>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
              <option>Criar Ideias</option>
            </select>
          </div>
        </main>
      </main>
    </main>

    <main class="add-ads">
      <main class="ads-left-original">
        <h2>Anunciantes Disponiveis</h2>
        <div class="ads-wrap-original">
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
          <div class="ad-box-original">
            <img src="../assets/logo2.png" alt="" />
            <div class="onoff"></div>
            <button class="delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </div>
        </div>
      </main>
      <main class="ads-right">
        <h2>Nome Do Anunciante</h2>
        <input class="input-name" type="text" placeholder="Digite o Nome" />
        <input class="input-file" type="file" placeholder="Adicionar Logo" />
        <button>Adicionar</button>
      </main>
    </main>

    <main class="add-film">
      <form id="adicionarFilmeForm" method="POST" enctype="multipart/form-data" target="hiddenFrame">
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
            window.location.href = `apagarFilme.php?id=${id}`;
          };
        </script>
        <?php

        while ($filme = mysqli_fetch_array($resultFilmes)) {
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
  <script src="dashboard.js"></script>
</body>

</html>