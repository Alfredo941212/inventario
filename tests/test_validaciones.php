<?php

require_once __DIR__ . '/../src/validaciones.php';

$casosNombre = [
    ["nombre válido: Teclado", "Teclado", true],
    ["nombre vacío:", "", false],
    ["nombre con espacios", "  ", false],
    ["nombre válido: Mouse", "Mouse", true],
    ["nombre válido: Monitor", "Monitor", true],
];




$correctas = 0;
$fallidas = 0;

foreach ($casosNombre as [$descripcion, $entrada, $esperado]){

    $obtenido = validarNombreProducto($entrada);

    if($obtenido === $esperado){
        echo " - $descripcion \n";
        $correctas++;
    }else{
        echo "FAIL - $descripcion\n";
        echo " Esperado: ". var_export($esperado, true) . "\n";
        echo " Obtenido: ". var_export($obtenido, true) . "\n";

        $fallidas++;
    }

}   
/*
echo "\n -------RESUMEN-**--------\n";
echo "Total: ". count($casos) . "\n";
echo "Correctas: $correctas\n";
echo "Fallidas: $fallidas\n";*/





$casosCantidad = [
    ["cantidad válido: 1", 1, true],
    ["cantidad decimal:", 3.5, false],
    ["cantidad con espacios", "  ", false],
    ["cantidad negativo", -1, false],
    ["cantidad cero", 0, false],
    ["cantidad válido: 2", 2, true],

    
];

//$correctas2 = 0;
//$fallidas2 = 0;

foreach ($casosCantidad as [$descripcion, $entrada, $esperado]){

    $obtenido = validarCantidadProducto($entrada);

    if($obtenido === $esperado){
        echo " - $descripcion \n";
        $correctas++;
    }else{
        echo "FAIL - $descripcion\n";
        echo " Esperado: ". var_export($esperado, true) . "\n";
        echo " Obtenido: ". var_export($obtenido, true) . "\n";

        $fallidas++;
    }

}   

echo "\n -------RESUMEN-**--------\n";
echo "Total: ". (count($casosCantidad) + count($casosNombre)) . "\n";
echo "Correctas: $correctas\n";
echo "Fallidas: $fallidas\n";

exit($fallidas > 0 ? 1 : 0);