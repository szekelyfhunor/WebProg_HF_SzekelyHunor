<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

    <?php
        if (isset($_POST['submit'])) {
            $nev = $_POST['nev'];
            $szak = $_POST['szak'];
            $atlag = $_POST['atlag'];

            include 'db_config.php';

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nev, $szak, $atlag);

            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                echo "Köszönjük! Az adatokat elmentettük.<br>";
                echo "<a href='bevitel.php'>Új adat</a><br>";
                echo "<a href='listazas.php'>Adatok listázása</a><br>";
            } else {
                echo "Műveleti hiba: " . $stmt->error;
            }
        } else {
            // formot megmutat:
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                Nev:<input type="Text" name="nev"><br>
                Szak:<input type="Text" name="szak"><br>
                Atlag:<input type="Text" name="atlag"><br>
                <input type="Submit" name="submit" value="Elkuld">
            </form>
            <?php
            }
    ?>


    </body>
</html>