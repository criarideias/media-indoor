<?php

include("../../conexao.php");

$id = mysqli_real_escape_string($con, $_GET["id"]);

$sql = "DELETE FROM `filmes` where `id` = '$id'";
$result = mysqli_query($con, $sql);

$mensagemFinal = "Filme deletado com sucesso!";

if (!$result) {
    $mensagemFinal = "Ocorreu um erro desconhecido ao deletar esse filme.";
}

?>

<script>
    window.alert("<?php echo ($mensagemFinal) ?>");
    window.location.href = "../index.php?adicionarFilme"
</script>