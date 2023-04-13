<?php

include("../../db/conexao.php");

$id = mysqli_real_escape_string($con, $_GET["id"]);

$sql = "SELECT * FROM `anunciantes` WHERE `id` = '$id'";
$result = mysqli_query($con, $sql);

$arrayAnunciantes = array();

while ($anunciante = $result->fetch_array()) {
    $arrayAnunciantes[] = $anunciante;
}

echo json_encode($arrayAnunciantes[0]);
