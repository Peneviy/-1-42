
<?php include_once('header.php') ?>
<h2 class="title">Достижения</h2>
<main>
<?php
$host = "127.0.0.1";
$username = "root";
$database = "achievements";
$pass = "";
$conn = new mysqli($host, $username, $pass, $database);
// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Выполнение запроса
$sql = "SELECT id, name, description, img FROM achievments";
$result = mysqli_query($conn, $sql);

// Обработка результатов запроса
if (mysqli_num_rows($result) > 0) {
    // выводим данные каждой строки
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo '<img src="' . $row["img"] . '"></img>';
        echo "</div>";
    }
} else {
    echo "Не найдено достижений";
}

// Закрытие соединения
mysqli_close($conn);
?>
</main>
<?php include_once('footer.php') ?>
