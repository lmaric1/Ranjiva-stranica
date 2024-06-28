<?php
$conn = new mysqli('localhost', 'root', '', 'test_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];

// SQL Injection ranjivost
// test'); DROP TABLE users; --
// test'); DROP DATABASE test_db; --
$sql = "INSERT INTO users (username) VALUES ('$username')";

try {
    if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
        $message = "Novi korisnik '$username' je uspješno dodan.";
    } else {
        $message = "Došlo je do greške prilikom dodavanja korisnika: " . $conn->error;
    }
} catch (Exception $e) {
    $message = "Došlo je do greške prilikom izvršavanja SQL upita: " . $e->getMessage();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultati Unosa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Online Lukina knjižnica - Rezultati Unosa</h1>
    </header>
    <main>
        <section class="insert-results">
            <h2><?php echo htmlspecialchars($message); ?></h2>
            <a href="index.php">Nazad</a>
        </section>
    </main>
</body>
</html>
