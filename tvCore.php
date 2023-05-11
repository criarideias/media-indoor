<?php

include("./db/conexao.php");

$tvId = 1;

if (isset($_GET["id"])) {
    $tvId = mysqli_real_escape_string($con, $_GET["id"]);
}

$sqlTV = "SELECT * FROM `tvs` WHERE `id` = $tvId";
$resultTv = mysqli_query($con, $sqlTV);

$tv = mysqli_fetch_array($resultTv);

$filmeId = $tv["filme"];

if ($filmeId == "SLIDER") {
    $sqlFilme = "SELECT * FROM `filmes` WHERE `id` LIMIT 1";
} else {
    $sqlFilme = "SELECT * FROM `filmes` WHERE `id` = '$filmeId'";
}
$resultFilme = mysqli_query($con, $sqlFilme);

$filme = mysqli_fetch_array($resultFilme);

$anunciantesIds = json_decode($tv["anunciantes"]);

$anunciantesPrincipais = array();

foreach ($anunciantesIds->principais as $anuncianteID) {
    if (strval($anuncianteID) != "0") {
        $sqlAnunciante = "SELECT * FROM `anunciantes` WHERE `id` = '$anuncianteID'";
        $resultAnunciante = mysqli_query($con, $sqlAnunciante);
        $anunciantesPrincipais[] = mysqli_fetch_array($resultAnunciante);
    }
}

$anunciantesSecundarios = array();

foreach ($anunciantesIds->secundarios as $anuncianteID) {
    if (strval($anuncianteID) != "0") {
        $sqlAnunciante = "SELECT * FROM `anunciantes` WHERE `id` = '$anuncianteID'";
        $resultAnunciante = mysqli_query($con, $sqlAnunciante);
        $anunciantesSecundarios[] = mysqli_fetch_array($resultAnunciante);
    } else {
        $anunciantesSecundarios[] = null;
    }
}
