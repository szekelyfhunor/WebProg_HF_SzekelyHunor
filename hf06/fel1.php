<h3>Online conference registration</h3>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"];
    $tshirt = $_POST["tshirt"];
    $abstract = $_FILES["abstract"];
    $terms = isset($_POST["terms"]);

    if (empty($firstName) || empty($lastName) || empty($email)) {
        $errors[] = "Minden mező kitöltése kötelező.";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Hibás email  formatum.";
    }


    if (isset($_POST["attend"]) && is_array($_POST["attend"])) {
        $attend = $_POST["attend"];
    } else {
        $errors[] = "Legalább egy eseményt ki kell választani.";
    }


    if ($tshirt === "P") {
        $errors[] = "Kérlek válassz polo méretet.";
    }

    if (isset($_FILES["abstract"])) {
        $abstract = $_FILES["abstract"];
        if ($abstract["error"] !== UPLOAD_ERR_OK) {
            $errors[] = "Hiba történt a fajl feltöltése során.";
        } else {
            $fileType = pathinfo($abstract["name"], PATHINFO_EXTENSION);
            $fileSize = $abstract["size"];

            if ($fileType !== "pdf" || $fileSize > 3000000) {
                $errors[] = "Csak PDF fajlokat fogadunk el 3MB-ig.";
            }
        }
    }

    if (!$terms) {
        $errors[] = "Kerlek fogadd el a felteteleket.";
    }

    if (!empty($errors)) {
        echo "<div style='color: red;'>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo "</div>";
    } else {
        header("Location: fel1_feldolgoz.php");
        exit();
    }
}
?>


<form method="post" action="">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

