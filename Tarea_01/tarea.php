<?php
/* 1. Script Básico en PHP:
- Crea un archivo PHP llamado `tarea.php`.
- Dentro de este archivo, realiza las siguientes tareas:
    a. Declaración de Variables:
- Define al menos cinco variables de diferentes tipos de datos (integer, float, string, boolean, array).
- Asigna valores a estas variables.
b. Operaciones Aritméticas:
- Realiza al menos dos operaciones aritméticas con las variables numéricas que has creado. Muestra el resultado usando la función `echo`.
c. Manipulación de Cadenas:
- Crea una variable de tipo cadena y realiza las siguientes acciones:
- Concatenación de dos cadenas.
- Obtén la longitud de la cadena.
d. Uso de Condicionales:
- Crea una estructura de control condicional que verifique el valor de una variable booleana y muestre un mensaje diferente según sea `true` o `false`.
e. Creación de un Array:
- Define un arreglo con al menos cinco elementos.
- Muestra un elemento específico del arreglo utilizando su índice. */



$nombre = "Pedro_Zambonino";
$edad = 35;
$valor = 9.88;
$es_estudiante = true;
$lista=array("$nombre","$edad","$valor","$es_estudiante","Latacunga","casado");
$num1=123;
$num2= 234;
$suma =($num1+$num2);
$resta = ($num2-$num1);
$multiplicar= ($num1*3);

echo ("TAREA 01 DE APLICACCIONES WEB");
echo " <br> "."<br>";   
echo ("El Nombre : $nombre");
echo " <br> "."<br>";
echo ("La Edad es :  " ."$edad ");
echo " <br> "."<br>";
var_dump ($valor);
echo " <br> "."<br>";
var_dump ($es_estudiante);
echo "<br>  "."<br>";
var_dump($lista);
echo "<br>  "."<br>";

echo ("el num 1 : ". $num1 . "  "."el num 2 :". $num2);
echo "<br>  "."<br>";
echo ("suma es = ". $suma. "");
echo "<br>  "."<br>";
echo ("resta es = ". $resta. "");
echo "<br>  "."<br>";
echo ("la multiplicacion por 3 es = " . $multiplicar. "");
echo "<br>  "."<br>";


$mensaje ="ESTUDIANTE";
$mensaje2= "SOFTWARE";
$MENSAJE_COMPLETO = $mensaje . " " . $mensaje2;
echo $MENSAJE_COMPLETO;
echo "<br>  "."<br>";

$total=strlen($mensaje);
echo "La longitud del mensaje Estudiante es: $total\n";
echo "<br>  "."<br>";
if ($edad >=18 ){
    echo "Es mayor de edad $edad\n";
}
else{
    echo "Es menor de edad";
}
echo "<br>  "."<br>";

echo "El Array en la posicion 2 es: ".$lista[1];
echo "<br>  "."<br>";
foreach ($lista as $lista) {
    echo $lista . "<br>";
}


