<?php

//Conexão
$host = "localhost";//aplicação local
$user = "usuario";
$pass = "senha";
$data = "meu_BD";

try
{
    $PDO = new PDO( "mysql:host=$host;dbname=$data; charset=utf8", $user, $pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}