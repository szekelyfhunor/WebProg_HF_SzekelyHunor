<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM hallgatok WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listazas.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();


