<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
 die("Помилка з'єднання: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
 echo "База даних створена успішно<br>";
} else {
 echo "Помилка створення бази даних: " . $conn->error;
}
$conn->select_db($dbname);
$sql = "CREATE TABLE IF NOT EXISTS movies (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(100),
 genre VARCHAR(50),
 release_year INT,
 rating DECIMAL(2,1)
)";
if ($conn->query($sql) === TRUE) {
 echo "Таблиця створена успішно<br>";
} else {
     echo "Помилка створення таблиці: " . $conn->error;
}
$sql = "INSERT INTO movies (title, genre, release_year, rating) VALUES
 ('Final Destination', 'Horror', 2000, 6.7),
 ('Mission: Impossible', 'Action', 1996, 7.1),
 ('Indiana Jones', 'Adventure', 1981, 8.4)";
if ($conn->query($sql) === TRUE) {
 echo "Дані успішно додані<br>";
} else {
 echo "Помилка додавання даних: " . $conn->error;
}
$conn->close();
?>