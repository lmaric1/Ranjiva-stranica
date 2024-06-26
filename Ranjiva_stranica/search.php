<?php
$conn = new mysqli('localhost', 'root', '', 'test_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];

// SQL Injection ranjivost
$sql = "SELECT * FROM users WHERE username = '$query'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultati Pretrage</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Online Lukina knjižnica - Rezultati Pretrage</h1>
    </header>
    <main>
        <section class="search-results">
            <h2>Rezultati za: <?php echo htmlspecialchars($query); ?></h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row["id"] . " - Ime: " . $row["username"] . "</p>";
                }
            } else {
                echo "<p>Nema rezultata</p>";
            }
            $conn->close();
            ?>
            <a href="index.php">Nazad</a>
        </section>
    </main>
</body>
</html>
