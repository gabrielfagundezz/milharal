<?php 
    session_start();

    require_once("banco.php");

    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if(!empty($nome) && !empty($email) && !empty($senha)){
    
            $sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')";
            $q = $banco->query($sql);
            $_SESSION['username'] = $nome;
            header("location:home.php");
    
        } else {
            echo "<p>Algum dado está faltando!</p>";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
<div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 ">
                <form action="registrar.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input class="form-control" type="password" name="senha">
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="Logar" >
                </form>
            </div>
        </div>
    </div>
</body>
</html>