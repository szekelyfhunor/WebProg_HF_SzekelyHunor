<?php
include 'db_config.php';

if (isset($_POST['submit'])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];
    $id = $_POST['id'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE hallgatok SET nev=?, szak=?, atlag=? WHERE id=?");
    $stmt->bind_param("sssi", $nev, $szak, $atlag, $id);

    if ($stmt->execute()) {
        header("Location: listazas.php");
    } else {
        echo "Műveleti hiba: " . $stmt->error;
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM hallgatok WHERE id=?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Nev:<input type="Text" name="nev" value="<?php echo $row["nev"]; ?>"><br>
    Szak:<input type="Text" name="szak" value="<?php echo $row["szak"]; ?>"><br>
    Atlag:<input type="Text" name="atlag" value="<?php echo $row["atlag"]; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="Submit" name="submit" value="Elkuld">
</form>
