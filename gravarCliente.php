<?php
// Conexão com o banco de dados
$con = mysqli_connect(
    "gzp0u91edhmxszwf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", // Host
    "yy4kkvgyo2feducw", // Nome de usuário
    "bvwpl1m00gwhu57w", // Senha
    "jgxcc77h0yuep9la", // Banco de dados
    3306 // Porta
);

// Verifica a conexão
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Captura os dados do formulário (substitua pelos métodos reais que você utiliza)
$nome = $_GET['nome'] ?? null;
$email = $_GET['email'] ?? null;
$telefone_cel = $_GET['tvelefone_cel'] ?? null;
$telefone_fixo = $_GET['telefone_fixo'] ?? null;
$valor = $_GET['valor'] ?? null;
$parcelas = $_GET['parcelas'] ?? null;
$forma_pagamento = $_GET['forma_pagamento'] ?? null;
$motivo = $_GET['motivo'] ?? null;

// Validações básicas
if (!$nome) {
    die("Nome deve ser informado. Sistema interrompido!");
}
if (!$email) {
    die("E-mail deve ser informado. Sistema interrompido!");
}

// Insere os dados no banco
$sql = "INSERT INTO `emprestimo-solicitacoes` (
            nome, 
            email, 
            telefone_cel, 
            telefone_fixo, 
            valor, 
            parcelas, 
            forma_pagamento, 
            motivo
        ) VALUES (
            '$nome',
            '$email',
            '$telefone_cel',
            '$telefone_fixo',
            '$valor',
            '$parcelas',
            '$forma_pagamento',
            '$motivo'
        )";

// Executa a consulta
if (mysqli_query($con, $sql)) {
    echo "$nome, seu cadastro foi inserido com sucesso!";
} else {
    die("Erro na inserção do Cadastro Básico: " . mysqli_error($con));
}

// Fecha a conexão
mysqli_close($con);
?>
