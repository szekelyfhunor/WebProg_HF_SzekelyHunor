<?php
//1.feladat

$color = 'lightblue';

$generateMultiplicationTable = function ($n) use ($color) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th style='background-color:$color'></th>";

    for ($i = 1; $i <= $n; $i++) {
        echo "<th style='background-color:$color'>$i</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= $n; $i++) {
        echo "<tr><th style='background-color:$color'>$i</th>";
        for ($j = 1; $j <= $n; $j++) {
            echo "<td>" . ($i * $j) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
};

$generateMultiplicationTable(10);


// 2.feladat

$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest",
"Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");

foreach ($orszagok as $country => $city) {
    echo $country." fovarosa ".'<span style="color: red;">'.$city.'</span>'.'<br>';
}

echo '<br><br>';

// 3. feladat

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelv => $week){
    echo $nyelv.': '; 
    foreach ($week as $day){
        if ($nyelv === "HU" && in_array($day, ["K", "Cs", "Szo"])) {
            echo '<b>' . $day . '</b>, ';
        } elseif ($nyelv === "EN" && in_array($day, ["Tu", "Th", "Sa"])) {
            echo '<b>' . $day . '</b>, ';
        } elseif ($nyelv === "DE" && in_array($day, ["Di", "Do", "Sa"])) {
            echo '<b>' . $day . '</b>, ';
        } else {
            echo $day . ', ';
        }
    }
    echo '<br>';
}

echo '<br><br>';

//4. feladat
function atalakit_array_map($tomb, $mod) {
    if ($mod === "kisbetus") {
        return array_map('strtolower', $tomb);
    } elseif ($mod === "nagybetus") {
        return array_map('strtoupper', $tomb);
    }
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

$szinek_kisbetus = atalakit_array_map($szinek, "kisbetus");

$szinek_nagybetus = atalakit_array_map($szinek, "nagybetus");

print_r($szinek_kisbetus);
print_r($szinek_nagybetus);

//5. feladat

class BevasarloLista
{
    private $lista = [];

    // Elem hozzáadása a bevásárlólistához
    public function hozzaadElem($nev, $mennyiseg, $egysegar)
    {
        $this->lista[] = ["nev" => $nev, "mennyiseg" => $mennyiseg, "egysegar" => $egysegar];
    }

    // Elem eltávolítása a bevásárlólistáról név alapján
    public function eltavolitElem($nev)
    {
        foreach ($this->lista as $index => $elem) {
            if ($elem["nev"] === $nev) {
                unset($this->lista[$index]);
                return true;
            }
        }
        return false; // Ha nem található az elem a listán
    }

    // Bevásárlólista elemek kiírása
    public function kiir()
    {
        foreach ($this->lista as $elem) {
            echo "Név: {$elem['nev']}, Mennyiség: {$elem['mennyiseg']}, Egységár: {$elem['egysegar']} \n";
        }
    }

    // Összköltség kiszámítása
    public function osszKoltseg()
    {
        $osszeg = 0;
        foreach ($this->lista as $elem) {
            $osszeg += $elem['mennyiseg'] * $elem['egysegar'];
        }
        return $osszeg;
    }
}

// Példa használat:
$bevasarloLista = new BevasarloLista();

// Elemek hozzáadása
$bevasarloLista->hozzaadElem("Kenyer", 2, 8.5);
$bevasarloLista->hozzaadElem("Viz", 1, 2.5);

// Bevásárlólista kiírása
echo "Bevásárlólista:\n";
$bevasarloLista->kiir();

// Összköltség kiszámítása
echo "\nÖsszköltség: " . $bevasarloLista->osszKoltseg() . "\n";

// Elem eltávolítása (példa)
$bevasarloLista->eltavolitElem("Kenyer");

// Frissített bevásárlólista kiírása
echo "\nFrissített bevásárlólista:\n";
$bevasarloLista->kiir();

// Frissített összköltség kiszámítása
echo "\nFrissített összköltség: " . $bevasarloLista->osszKoltseg() . "\n";


