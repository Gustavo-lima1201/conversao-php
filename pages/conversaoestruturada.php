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


?>