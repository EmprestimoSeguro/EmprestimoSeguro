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

    // Verifica se o nome foi preenchido
    // Captura os dados do formulário e previne SQL Injection
$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$telefone_cel = $_POST['tvelefone_cel'] ?? null;
$telefone_fixo = $_POST['telefone_fixo'] ?? null;
$valor = $_POST['valor'] ?? null;
$parcelas = $_POST['parcelas'] ?? null;
$forma_pagamento = $_POST['forma_pagamento'] ?? null;
$motivo = $_POST['motivo'] ?? null;

    // Aqui, você pode adicionar mais validações, como verificar se o valor é numérico, etc.
    
    // Exemplo de inserção no banco de dados
    $sql = "INSERT INTO emprestimo (nome, email, telefone_cel, telefone_fixo, valor, parcelas, forma_pagamento, motivo)
            VALUES ('$nome', '$email', '$telefone_cel', '$telefone_fixo', '$valor', '$parcelas', '$forma_pagamento', '$motivo')";
    
    if (mysqli_query($con, $sql)) {
        echo "Empréstimo registrado com sucesso!";
    } else {
        echo "Erro: " . mysqli_error($con);
    }


// Fecha a conexão
mysqli_close($con);
?>
