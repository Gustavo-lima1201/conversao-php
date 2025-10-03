<?php
$moeda = filter_input(INPUT_GET, "moeda", FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_GET, "valor", FILTER_SANITIZE_NUMBER_FLOAT);
$cotacao = 0;
$mensagem = "";


function validarEntrada($moeda, $valor): bool {
    $moedasValidas = ["dolar", "euro", "libra"];
   
    if (
        !in_array($moeda, $moedasValidas) ||
        $valor <= 0 ||
        !preg_match('/^\d+(\.\d+)?$/', $valor)
    ) {
        return false;
    }
    return true; 
}


function converterDolar($valor): float {
    $cotacao = 5.34;
    $valorconvertido = $valor / $cotacao;
    return $valorconvertido;
}
function converterEuro($valor): float {
    $cotacao = 6.26;
    $valorconvertido = $valor / $cotacao;
    return $valorconvertido;
}
function converterLibra($valor): float {
    $cotacao = 7.19;
    $valorconvertido = $valor / $cotacao;
    return $valorconvertido;
}
function converterMoeda($moeda, $valor): float {
    if ($moeda === "dolar") {
        return converterDolar($valor);
    } elseif ($moeda === "euro") {
        return converterEuro($valor);
    } elseif ($moeda === "libra") {
        return converterLibra($valor);
    }
}
function simboloMoeda($moeda): string {
    if ($moeda === "dolar") {
        return "US$";
    } elseif ($moeda === "euro") {
        return "€";
    } elseif ($moeda === "libra") {
        return "£";
    }
    return "";
}
function mensagens ($moeda, $valor, $cotacao): string {
    if ($cotacao === 0) {
        return "Erro na conversão.";
    } else {
        return "O valor de R$ $valor em $moeda é " . simboloMoeda($moeda) . converterMoeda($moeda, $valor) . number_format($cotacao, 2, ',', '.') . ".";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <?php echo mensagens($moeda, $valor, $cotacao); ?>
    <a href="../index.html">← Voltar</a>
    
</body>
</html>