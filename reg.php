<?php include_once('header.php') ?>
<main>
<h2 class="title">Регистрация</h2>
<form class="reg" action="" method="POST">
    <p>Логин</p>
    <input required name="login" type="text"></input>
    <p>Пароль</p>
    <input required name="password" type="password"></input>
    <p>Фамилия</p>
    <input required name="lastname" type="text"></input>
    <p>Имя</p>
    <input required name="name" type="text"></input>
    <p>Отчество</p>
    <input required name="fathername" type="text"></input>
    <p>Почта</p>
    <input required name="email" type="text"></input>
    <a href="index.php">На главную</a>
    <button type="submit">Отправить</button>
</form>
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
            $res = $conn->query("SELECT `id` FROM `users` WHERE `login`= '". $_POST['login'] ."'");
            // узнаем количество строк, если не 0 - логин уже занят
            $result = $res->num_rows;
            if ($result > 0) : ?>
                <script>
                    alert("Логин уже занят");
                </script>
            <?php else : ?>
                <?php $reg = $conn->query("INSERT INTO users (login, password, lastname, name, fathername, email, role_id) VALUES ('".$_POST['login']."', '".$_POST['password']."', '".$_POST['lastname']."', '".$_POST['name']."', '".$_POST['fathername']."', '".$_POST['email']."', 1)"); ?>
                    <script>
                        alert("Успешная регистрация");
                        window.location.href = 'index.php'
                    </script>
                <?php endif; 
        } catch (Exception $ex) {
            echo $ex;
        }
        
        // Закрытие соединения
        mysqli_close($conn);
    }
?>
</main>
<?php include_once('footer.php') ?>