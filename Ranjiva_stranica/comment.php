<?php
$conn = new mysqli('localhost', 'root', '', 'test_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$comment = $_POST['comment'];

// XSS ranjivost 
// <script>alert()</script>
$sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Novi komentar je uspješno dodan";
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
?>
