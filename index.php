<!DOCTYPE html>
<html>
    <?php include_once('header.php') ?>
    <main>
      <h2 class="title">Авторизация</h2>
      <form class="reg" action="" method="POST">
        <input name="login" type="text"><p>Логин</p></input>
        <input name="password" type="password"><p>Пароль</p></input>
        <a class="order__form" href="reg.php">Регистрация</a>
        <button type="submit">Отправить</button>
      </form>
    </main>
    <?php include_once('footer.php') ?>
  </body>
</html>
<?php
  if ($_POST) {
    try {
        $host = "127.0.0.1";
        $username = "root";
        $database = "achievements";
        $pass = "";
        $conn = new mysqli($host, $username, $pass, $database);
        // Проверка соединения
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $res =  $conn->query("SELECT `login` FROM `users` WHERE `login`='" . $_POST['login'] . "' AND `password` = '" . $_POST['password'] . "'");
        if ($result = $res->num_rows > 0) : ?>
          <script>
            alert('Успешная авторизация');
            window.location.href = 'blog.php';
          </script>
        <?php else : ?>
          <script>
            alert('Не удалось авторизироваться.');
          </script>
        <?php endif;
    } catch (Exception $e) {
        echo 'Не удалось авторизироваться.';
    }
    
    // Закрытие соединения
    mysqli_close($conn);
  }
?>