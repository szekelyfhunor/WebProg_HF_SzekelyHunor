<form method="post" action="">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>

<?php
    $genNumber = "generated_number";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['elkuldott'])) {
            
            if (!isset($_COOKIE[$genNumber])) {
                $generaltSzam = rand(1, 10);
                setcookie($genNumber, $generaltSzam, time() + (86400 * 30), "/");
            } else {
                $generaltSzam = $_COOKIE[$genNumber];
            }

            $talalgatas = $_POST['talalgatas'];

            if ($generaltSzam < $talalgatas) {
                echo "A szam nagyobb";
            } elseif ($generaltSzam > $talalgatas) {
                echo "A szam kisebb";
            } else {
                echo "Eltalaltad";
                
                setcookie($genNumber, "", time() - 3600, "/");
            }
        }
    }
?>




