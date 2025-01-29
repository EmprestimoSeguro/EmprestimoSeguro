<?php
// Conexão com o banco de dados
$con = mysqli_connect(
    "sql306.infinityfree.com", // Host
    "if0_38162421", // Nome de usuário
    "Motog157", // Senha
    "if0_38162421_emprestimo", // Banco de dados
    3306 // Porta
);

// Verifica a conexão
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se o nome foi preenchido
    // Captura os dados do formulário e previne SQL Injection
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? null);
    $telefone_cel = mysqli_real_escape_string($con, $_POST['telefone_cel'] ?? null);
    $telefone_fixo = mysqli_real_escape_string($con, $_POST['telefone_fixo'] ?? null);
    $valor = mysqli_real_escape_string($con, $_POST['valor'] ?? null);
    $parcelas = mysqli_real_escape_string($con, $_POST['parcelas'] ?? null);
    $forma_pagamento = mysqli_real_escape_string($con, $_POST['forma_pagamento'] ?? null);
    $motivo = mysqli_real_escape_string($con, $_POST['motivo'] ?? null);

    // Aqui, você pode adicionar mais validações, como verificar se o valor é numérico, etc.
    
    // Exemplo de inserção no banco de dados
    $sql = "INSERT INTO emprestimo (nome, email, telefone_cel, telefone_fixo, valor, parcelas, forma_pagamento, motivo)
            VALUES ('$nome', '$email', '$telefone_cel', '$telefone_fixo', '$valor', '$parcelas', '$forma_pagamento', '$motivo')";
    
    if (mysqli_query($con, $sql)) {
        echo "Empréstimo registrado com sucesso!";
    } else {
        echo "Erro: " . mysqli_error($con);
    }
}


// Fecha a conexão
mysqli_close($con);
?>
