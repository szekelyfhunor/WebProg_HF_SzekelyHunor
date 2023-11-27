<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include 'db_config.php';

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: listazas.php");
            exit();
        } else {
            echo "Hibás jelszó.";
        }
    } else {
        echo "Hibás felhasználónév.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        Felhasználónév: <input type="text" name="username" required><br>
        Jelszó: <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Bejelentkezés">
    </form>

</body>
</html>
