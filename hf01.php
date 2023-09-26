<?php
// 1. feladat

$tomb = array(5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD);

foreach($tomb as $values){
    echo gettype($values);
    echo " ";
    if(is_numeric($values)){
        echo "igen" . '<br>';
    } else {
        echo "nem" . '<br>';
    }
}

echo " ".'<br>';

// 2. feladat

$second = 3600;
$hour = 0;

if($second % 3600 == 0){
    $hour=$second/3600;
    echo "$second masodperc az $hour ora";
} else {
    echo "Hibas ertek";
}

echo " ".'<br>'.'<br>';

// 3. feladat

$num1=10;
$num2=7;
$operator="+";
$result = 0;

if ($operator === "+") {
    $result = $num1 + $num2;
} elseif ($operator === "-") {
    $result = $num1 - $num2;
} elseif ($operator === "*") {
    $result = $num1 * $num2;
} elseif ($operator === "/") {
    $result = $num1 / $num2;
} elseif ($operator === "**") {
    $result = $num1 ** $num2;
} 

echo "$num1 $operator $num2 = $result";
echo " ".'<br>'.'<br>';

// 4. feladat
$sakktabla = <<<EOT
  A B C
1| | | |
2| | | |
3| | | |
EOT;

echo nl2br($sakktabla);
echo " ".'<br>'.'<br>';

// 5. feladat


$szam1 = 10;
$szam2 = 5;
$muveleti_jel = '/';


switch($muveleti_jel) {
    case '+':
        $eredmeny = $szam1 + $szam2;
        break;
    case '-':
        $eredmeny = $szam1 - $szam2;
        break;
    case '*':
        $eredmeny = $szam1 * $szam2;
        break;
    case '/':
        if($szam2 != 0) {
            $eredmeny = $szam1 / $szam2;
        } else {
            echo "Hiba: 0-val nem lehet osztani!";
            exit;
        }
        break;
    default:
        echo "Hiba: Érvénytelen műveleti jel!";
        exit;
}

echo "Az eredmény: " . $eredmeny;
echo " ".'<br>'.'<br>';

// 6. fealdat

$honap_szama = 6;
$evszak = "";

if ($honap_szama == 1 || $honap_szama == 2 || $honap_szama == 12) {
    $evszak = "tel";
} elseif ($honap_szama == 3 || $honap_szama == 4 || $honap_szama == 5) {
    $evszak = "tavasz";
} elseif ($honap_szama == 6 || $honap_szama == 7 || $honap_szama == 9) {
    $evszak = "nyar";
} elseif ($honap_szama == 9 || $honap_szama == 10 || $honap_szama == 11) {
    $evszak = "tel";
}

echo "A $honap_szama. honap $evszak".'<br>';

switch($honap_szama) {
    case 12:
    case 1:
    case 2:
        echo "Tél";
        break;
    case 3:
    case 4:
    case 5:
        echo "Tavasz";
        break;
    case 6:
    case 7:
    case 8:
        echo "Nyár";
        break;
    case 9:
    case 10:
    case 11:
        echo "Ősz";
        break;
    default:
    echo "Hibás hónap";
        break;
}