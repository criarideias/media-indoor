<?php

// As credenciais de acesso ao Banco de Dados MYSQL devem ser setadas como variáveis de ambiente
// include("env.php");
// Caso o servidor tenha suas próprias variáveis de ambiente já definidas, comente a linha acima

$host = "localhost";
$user = "root";
$password = "root";
$db = "tvs";

$con = mysqli_connect($host, $user, $password, $db) or die("Não foi possível conectar-se ao Banco de Dados");
