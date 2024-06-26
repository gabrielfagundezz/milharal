<?php

require_once("banco.php");

?>

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <nav>
        <ul>
            <?php if (!isset($_SESSION['username']) || empty($_SESSION['username'])) : ?>
                <li><a href="registrar.php">Cadastrar</a></li>
                <li><a href="">Postagens</a></li>
            <?php else : ?>
                <li><a href="perfil.php">Meu perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>