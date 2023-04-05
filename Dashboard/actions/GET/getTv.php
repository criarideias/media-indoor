<?php

include("../../../conexao.php");

$id = mysqli_real_escape_string($con, $_GET["id"]);

$sql = "SELECT * FROM `tvs` WHERE `id` = '$id'";
$result = mysqli_query($con, $sql);

$arrayTvs = array();

while ($tv = $result->fetch_array()) {
    $arrayTvs[] = $tv;
}

$arrayTvs[0]["anunciantes"] = json_decode($arrayTvs[0]["anunciantes"]);

echo json_encode($arrayTvs[0]);
