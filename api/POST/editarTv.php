<?php

include("../../db/conexao.php");

$json = file_get_contents("php://input");
$data = json_decode($json);

$id = mysqli_real_escape_string($con, $_GET["id"]);
$filme = mysqli_real_escape_string($con, $data->filme);
$anunciantes = mysqli_real_escape_string($con, json_encode($data->anunciantes));

$sql = "UPDATE `tvs` SET `filme` = '$filme', `anunciantes` = '$anunciantes' WHERE `id` = $id";
$result = mysqli_query($con, $sql);
