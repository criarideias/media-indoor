<?php

include("../conexao.php");

$sqlFilmes = "SELECT * FROM `filmes`";
$resultFilmes = mysqli_query($con, $sqlFilmes);

$arrayFilmes = array();

while ($filme = mysqli_fetch_array($resultFilmes)) {
    $arrayFilmes[] = $filme;
}

$sqlAnunciantes = "SELECT * FROM `anunciantes`";
$resultAnunciantes = mysqli_query($con, $sqlAnunciantes);

$arrayAnunciantes = array();

while ($anunciante = mysqli_fetch_array($resultAnunciantes)) {
    $arrayAnunciantes[] = $anunciante;
}

$sqlTvs = "SELECT * FROM `tvs`";
$resultTvs = mysqli_query($con, $sqlTvs);

$arrayTvs = array();

while ($tv = mysqli_fetch_array($resultTvs)) {
    $arrayTvs[] = $tv;
}

$arrayAnunciantesUsados = array();

foreach ($arrayAnunciantes as $anunciante) {
    foreach ($arrayTvs as $tv) {
        if (str_contains($tv["anunciantes"], $anunciante["id"])) {
            $arrayAnunciantesUsados[] = $anunciante["id"];
            break;
        }
    }
}
