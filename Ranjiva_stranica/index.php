<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Lukina sigurna knjižnica</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Online Lukina sigurna knjižnica</h1>
    </header>
    <main>
        <section class="search-section">
            <h2>Pretraži Korisnike</h2>
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Unesite korisničko ime">
                <button type="submit">Pretraži</button>
            </form>
        </section>
        <section class="insert-section">
            <h2>Unesi Novog Korisnika</h2>
            <form action="insert.php" method="POST">
                <input type="text" name="username" placeholder="Unesite korisničko ime">
                <button type="submit">Unesi</button>
            </form>
        </section>
        <section class="comment-section">
            <h2>Ostavite Komentar</h2>
            <form action="comment.php" method="POST">
                <input type="text" name="username" placeholder="Vaše ime">
                <textarea name="comment" placeholder="Vaš komentar"></textarea>
                <button type="submit">Pošalji</button>
            </form>
        </section>
        <section class="comments-display">
            <h2>Komentari</h2>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'test_db');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM comments");
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>{$row['username']}:</strong> {$row['comment']}</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>
