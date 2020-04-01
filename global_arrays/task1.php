<?php
/**
 *  Создайте скрипт,  который бы запрашивал у пользователя его имя и фамилию. 
 * Добейтесь, чтобы при каждом обращении к страницам сайта выводилось
 * приветствие пользователя в зависимости от текущего времени суток: 
 * С 5 до 11  часов: Доброе утро, ... ! 
 * С 11 до 16 часов: Добрый день, ... ! 
 * С 16 до О часов: Добрый вечер,  ... ! 
 * С О до 5 часов: Доброй ночи,  ... ! 
 * Вместо многоточия скрипт должен подставлять имя и фамилию пользователя. 
 */
$hello_message = '';

$greetings = '';
$time = date('G');
if ($time >= 5 && $time < 11) {
    $greetings = 'Доброе утро, ';
} else if($time >= 11 && $time < 16) {
    $greetings = 'Добрый день, ';
} else if($time >= 16 && $time < 24) {
    $greetings = 'Добрый вечер, ';
} else if($time >= 0 && $time < 5) {
    $greetings = 'Доброй ночи, ';
}
if(!empty($_POST['name'])) {
    setcookie('name', $_POST['name']); 
    header('location: task1.php');
}

$name = $_COOKIE['name'] ?? 'anonymous';

$hello_message = $greetings . $name;

 ?>
    <h3>
        <?=$hello_message?>
    </h3>
 <form method="post">
    <label>
        your name
        <input type="text" name="name">
    </label>
    <input type="submit">
 </form>