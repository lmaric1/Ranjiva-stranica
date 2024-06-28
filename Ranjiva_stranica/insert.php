<?php
$conn = new mysqli('localhost', 'root', '', 'test_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prihvaćamo korisnički unos direktno, bez ikakve sanitizacije ili provjere
$username = $_POST['username'];

// SQL Injection ranjivost - direktno ubacivanje korisnikovog unosa
$sql = "INSERT INTO users (username) VALUES ('$username')";

try {
    if ($conn->query($sql) === TRUE) {
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
