<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"] ?? [];
    $tshirt = $_POST["tshirt"];
    $abstract = $_FILES["abstract"] ?? [];
    $terms = isset($_POST["terms"]);

    echo "<h2>Submitted Data:</h2>";

    echo "<p>First Name: $firstName</p>";
    echo "<p>Last Name: $lastName</p>";
    echo "<p>Email: $email</p>";

    if (!empty($attend)) {
        echo "<p>Events:</p>";
        echo "<ul>";
        foreach ($attend as $event) {
            echo "<li>$event</li>";
        }
        echo "</ul>";
    }

    echo "<p>T-Shirt Size: $tshirt</p>";

    if (!empty($abstract)) {
        $fileType = pathinfo($abstract["name"], PATHINFO_EXTENSION);
        $fileSize = $abstract["size"];
        echo "<p>Abstract:</p>";
        echo "<p>File Type: $fileType</p>";
        echo "<p>File Size: $fileSize bytes</p>";
    }

    echo "<p>Accepted Terms: " . ($terms ? "Yes" : "No") . "</p>";
} else {
    echo "No data submitted.";
}
?>
</body>
</html>

