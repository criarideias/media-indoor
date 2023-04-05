<?php

include("../../conexao.php");

$id = random_int(100000, 999999);
$nome = mysqli_real_escape_string($con, $_POST["nomeFilme"]);

$banner = $_FILES["bannerFilme"];
$trailer = $_FILES["trailerFilme"];

$pastaAlvo = "../../uploads/";

$tipoDoBanner = explode(".", $banner["name"])[1];
$tipoDoTrailer = explode(".", $trailer["name"])[1];

$nomeDoBanner = md5(time()) . "." . $tipoDoBanner;
$nomeDoTrailer = md5(time()) . "." . $tipoDoTrailer;

$arquivoAlvoBanner = $pastaAlvo . basename($nomeDoBanner);
$arquivoAlvoTrailer = $pastaAlvo . basename($nomeDoTrailer);

$mensagem = "Filme adicionado com sucesso!";
$sucesso = true;

if (!move_uploaded_file($banner["tmp_name"], $arquivoAlvoBanner)) {
    $mensagem = "ERRO: Não foi possível enviar o arquivo do Banner";
    $sucesso = false;
}

if (!move_uploaded_file($trailer["tmp_name"], $arquivoAlvoTrailer)) {
    $mensagem = "ERRO: Não foi possível enviar o arquivo do Trailer";
    $sucesso = false;
}

if ($sucesso) {
    $sql = "INSERT INTO `filmes` (id, nome, banner, trailer) VALUES ('$id', '$nome', '$nomeDoBanner', '$nomeDoTrailer')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        $mensagem = "ERRO: Um erro desconhecido ocorreu ao tentar adicionar o filme ao Banco de Dados";
        $sucesso = false;
    }
}


?>
<script>
    window.alert("<?php echo ($mensagem) ?>");
    window.location.href = "../../dashboard/index.php?adicionarFilme";
</script>