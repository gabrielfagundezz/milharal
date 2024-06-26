<?php
session_start();

require_once("banco.php");


$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' ";

$resp = $banco->query($sql);

if($resp->num_rows > 0){

    $_SESSION['username'] = $nome;
    header("location: home.php");

}else {
    echo "<p>Nome ou senha incorretos!</p>";
}