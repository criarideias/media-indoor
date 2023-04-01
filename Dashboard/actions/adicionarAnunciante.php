<?php

include("../../conexao.php");

$id = random_int(100000, 999999);
$nome = mysqli_real_escape_string($con, $_POST["nomeAnunciante"]);
$banner = $_FILES["bannerAnunciante"];

$pastaAlvo = "../../uploads/";

$tipoDoBanner = explode(".", $banner["name"])[1];
$nomeDoBanner = md5(time()) . "." . $tipoDoBanner;
$arquivoAlvoBanner = $pastaAlvo . basename($nomeDoBanner);

$mensagem = "Anunciante adicionado com sucesso!";
$sucesso = true;

if (!move_uploaded_file($banner["tmp_name"], $arquivoAlvoBanner)) {
    $mensagem = "ERRO: Não foi possível enviar o arquivo do Banner";
    $sucesso = false;
}

if ($sucesso) {
    $sql = "INSERT INTO `anunciantes` (id, nome, banner) VALUES ('$id', '$nome', '$nomeDoBanner')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        $mensagem = "ERRO: Um erro desconhecido ocorreu ao tentar adicionar o anunciante ao Banco de Dados";
        $sucesso = false;
    }
}

?>
<script>
    window.alert("<?php echo ($mensagem) ?>");
    window.location.href = "../index.php?adicionarAnunciante";
</script>