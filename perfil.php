<?php
session_start();
require_once("banco.php");
require_once("header.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

$username = $_SESSION['username'];

// Obtenha os dados do usuário usando a coluna correta
$sql = "SELECT nome, email FROM usuarios WHERE nome = '$username'";
$q = $banco->query($sql);

if ($q->num_rows === 0) {
    echo "Usuário não encontrado.";
    exit;
}

$user = $q->fetch_assoc();
$nome = $user['nome'];
$email = $user['email'];

// Se o formulário for enviado, atualize os dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];

    // Certifique-se de usar a coluna correta na cláusula WHERE
    $sql = "UPDATE usuarios SET nome = '$novo_nome', email = '$novo_email' WHERE nome = '$username'";
    if ($banco->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso!";
        // Atualize os valores exibidos no formulário
        $nome = $novo_nome;
        $email = $novo_email;
        // Atualize a sessão com o novo nome
        $_SESSION['username'] = $novo_nome;
    } else {
        echo "Erro ao atualizar os dados: " . $banco->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do usuário</title>
</head>
<body>
    <h1>Perfil do usuário</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="perfil.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= htmlspecialchars($nome); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="Atualizar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
