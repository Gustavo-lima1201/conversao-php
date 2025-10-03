<?php
$moeda = filter_input(INPUT_GET, "moeda", FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_GET, "valor", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$conversao = 0;
$mensagem = "";
$simboloMoeda = "";

if ($moeda === "dolar") {
    $conversao = $valor / 5.34;
    $simboloMoeda = "US$";
} elseif ($moeda === "euro") {
    $conversao = $valor / 6.26;
    $simboloMoeda = "€";
} elseif ($moeda === "libra") {
    $conversao = $valor / 7.19;
    $simboloMoeda = "£";

}

if ($conversao === 0) {
    $mensagem = "Erro na conversão.";
} else {
    $mensagem = "O valor de R$ $valor em $moeda é $simboloMoeda " . number_format($conversao, 2, ',', '.') . ".";
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="resultado">
        <h1>Resultado da Conversão</h1>
        <p><?php echo $mensagem; ?></p>
        <a href="../index.html">← Voltar</a>
    </div>
</body>
</html>
