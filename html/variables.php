<!DOCTYPE html>
<html>
<body>

<?php
$w = 1;
$x = "Hello World";
$y = 4;
$z = "ever";

echo "<h>" . $x . " " . $y . $z . "</h>";
echo "<p>Number $y is a good Number! \n</p>";
echo "$w + $y = ".($w + $y)."\n";

echo var_dump($w);

$a = $b = $c = 1;

//Global and local scope
function test(){
    $x = "Hello PHP";
    echo "<p>$x</p>";
}
test();
echo $x;

function test2(){
    global $d;
    $d = 'local scope';
    echo "<p>$d</p>";
}
test2();
echo "<p>$d</p>";
//PHP stores all global variables in an array called $GLOBALS[index]

echo "<p>".$GLOBALS['d']."</p>"; 
/* Achtung: innerhalb <p><\p> tags werden nur einfache Variablen erkannt,
keine Arrays oder Objekte! Deshalb wird $GLOBALS[index]
in einem echo Statement als string ausgegeben und muss dann über den
Verkettungsoperator '.' mit dem restlichen String verbunden werden!
*/

//static variables
function test3(){
    static $e = 0;
    echo $e;
    $e++;
}

// Verwendung von print
print "Hello World!<br>"; // Ausgabe: Hello World!
$result = print "Hello World!<br>"; // Ausgabe: Hello World! und $result ist 1


$x = "Hello world!";
$y = 'Hello world!';

echo var_dump($x);
echo "<br>";
echo var_dump($y);



?>

</body>
</html>
