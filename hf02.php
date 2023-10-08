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