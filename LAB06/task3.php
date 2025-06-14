<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
$order = "DESC";
if (isset($_GET['order']) && $_GET['order'] === "asc") {
    $order = "ASC";
}
$sql = "SELECT * FROM movies ORDER BY rating $order";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $toggleOrder = $order === "ASC" ? "desc" : "asc";
    $buttonText = $order === "ASC" ? "Сортувати за рейтингом ↓" : "Сортувати за рейтингом ↑";
    echo "<form method='get' style='margin-bottom:10px;'>
            <input type='hidden' name='order' value='$toggleOrder'>
            <button type='submit' style='padding:6px 16px; font-size:16px;'>$buttonText</button>
          </form>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Genre</th>
    <th>Release Year</th>
    <th>Rating</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['title']}</td>
        <td>{$row['genre']}</td>
        <td>{$row['release_year']}</td>
        <td>{$row['rating']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Немає записів";
}
$conn->close();
?>