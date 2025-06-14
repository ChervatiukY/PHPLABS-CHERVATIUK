<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $release_year = $_POST['release_year'] ?? '';
    $rating = $_POST['rating'] ?? '';
    if (!is_numeric($release_year) || $release_year < 1888 || $release_year > intval(date("Y"))) {
        $message = "Некоректний рік випуску.";
    } elseif (!is_numeric($rating) || $rating < 0 || $rating > 10) {
        $message = "Рейтинг має бути числом від 0 до 10.";
    } else {
        $sql = "INSERT INTO movies (title, genre, release_year, rating) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $title, $genre, $release_year, $rating);
        if ($stmt->execute()) {
            $message = "Фільм успішно додано!";
        } else {
            $message = "Помилка додавання: " . $conn->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>
<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>
<form method="post">
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Genre:</label>
    <input type="text" name="genre" required>
    <label>Release Year:</label>
    <input type="number" name="release_year" required>
    <label>Rating:</label>
    <input type="number" step="0.1" name="rating" required>
    <button type="submit">Додати фільм</button>
</form>