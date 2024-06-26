<?php

    require_once("banco.php");

    if (isset($_SESSION['username'])) {
        header("location:home.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require("header.php"); ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 ">
                <form action="logar.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input class="form-control" type="password" name="senha">
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="Logar" >
                    <a href="registrar.php">Registre-se</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>