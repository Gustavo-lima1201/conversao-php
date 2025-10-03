<?php

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
function escolherMoeda($moeda, $valor): float {
    if ($moeda === "dolar") {
        return converterDolar($valor);
    } elseif ($moeda === "euro") {
        return converterEuro($valor);
    } elseif ($moeda === "libra") {
        return converterLibra($valor);
    }
}
function obterSimboloMoeda($moeda): string {
    if ($moeda === "dolar") {
        return "US$";
    } elseif ($moeda === "euro") {
        return "€";
    } elseif ($moeda === "libra") {
        return "£";
    }
    return "";
}
function mensagens ($moeda, $valor, $conversao, $simboloMoeda): string {
    if ($conversao === 0) {
        return "Erro na conversão.";
    } else {
        return "O valor de R$ $valor em $moeda é $simboloMoeda " . number_format($conversao, 2, ',', '.') . ".";
    }
}