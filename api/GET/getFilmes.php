<?php

include("../../db/conexao.php");

$sql = "SELECT * FROM `filmes`";
$result = mysqli_query($con, $sql);

$arrayFilmes = array();

while ($filme = $result->fetch_array()) {
    $arrayFilmes[] = $filme;
}

echo json_encode($arrayFilmes);
