<?php

include("../../conexao.php");

$id = mysqli_real_escape_string($con, $_GET["id"]);

$sql = "SELECT * FROM `filmes` WHERE `id` = '$id'";
$result = mysqli_query($con, $sql);

$arrayFilmes = array();

while ($filme = $result->fetch_array()) {
    $arrayFilmes[] = $filme;
}

echo json_encode($arrayFilmes[0]);
