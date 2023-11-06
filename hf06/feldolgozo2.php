<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST["nev"];
    $email = $_POST["email"];
    $jelszo = $_POST["jelszo"];
    $jelszo_megerositese = $_POST["jelszo_megerositese"];
    $szuletesi_datum = $_POST["szuletesi_datum"];
    $nem = $_POST["nem"];
    $erdeklodes = isset($_POST["erdeklodes"]) ? $_POST["erdeklodes"] : array();
    $orszag = $_POST["orszag"];

    $errors = array();

    // Validációk
    if (empty($nev)) {
        $errors[] = "Név mező nem lehet üres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Az e-mail cím érvénytelen.";
    }

    if (strlen($jelszo) < 8 || !preg_match('/[A-Z]/', $jelszo) || !preg_match('/[0-9]/', $jelszo) || !preg_match('/[^A-Za-z0-9]/', $jelszo)) {
        $errors[] = "A jelszónak legalább 8 karakterből kell állnia, tartalmazzon legalább egy nagybetűt, egy számot és egy speciális karaktert.";
    }

    if ($jelszo !== $jelszo_megerositese) {
        $errors[] = "A jelszó és a jelszó megerősítése nem egyezik.";
    }

    if (!strtotime($szuletesi_datum)) {
        $errors[] = "A születési dátum nem érvényes.";
    }

    // Sikeres validáció
    if (empty($errors)) {
        echo "<h2>Sikeres regisztráció</h2>";
        echo "<p>Név: $nev</p>";
        echo "<p>E-mail: $email</p>";
        echo "<p>Születési dátum: $szuletesi_datum</p>";
        echo "<p>Nem: $nem</p>";

        if (!empty($erdeklodes)) {
            echo "<p>Érdeklődési területek: " . implode(", ", $erdeklodes) . "</p>";
        }

        echo "<p>Ország: $orszag</p>";
    } else {
        // Hibák megjelenítése
        echo "<h2>Hibák történtek:</h2>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}


