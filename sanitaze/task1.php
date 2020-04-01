<?php
/**
 * Создайте форму регистрации, которая бы сохраняла имя, фамилию и 
 * электрон­ный адрес пользователя в файл. 
 * Для каждого пользователя в файле должна отво­диться одна строка. 
 * Не допускается появление дублирующих записей. 
 * Все поля формы обязательны для заполнения и должны быть корректны.
 *  Имя и фамилия должны быть набраны на русском языке и содержать не менее двух и не более 20  символов. 
 * В случае некорректного заполнения элементов управ­ления формы или если такой пользователь уже 
 * зарегистрирован, необходимо выводить предупреждающие сообщения. 
 *
 */
$register_db = './users.txt';
$users = file($register_db);
echo '<pre>';
print_r($users);
echo '</pre>';
$errors = [];

function checkName($value) {
    if(!(preg_match('/^[\p{Cyrillic}]+$/u', $value))) return false;
    $value = (mb_strlen($value) > 20 || mb_strlen($value) < 3 ) ? '' : $value;
    return strip_tags($value);
}

function checkEmail($value) {
    global $users;
    if(!(preg_match('/^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m', $value))) return false;
    foreach($users as $user) {
        if(stripos($user, $value) !== false) {
            return 'unique';
        }
    }
    return strip_tags($value);
}

function saveUser($name, $surname, $email) {
    global $register_db;
    global $users;
    $user = "$name|$surname|$email \r\n";
    $users[] = $user;
    file_put_contents($register_db, $users);
}

if(isset($_POST['submit'])) {
    $name    = filter_input(INPUT_POST, 'name', FILTER_CALLBACK, ['options' => 'checkName']);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_CALLBACK, ['options' => 'checkName']);
    $email   = filter_input(INPUT_POST, 'email', FILTER_CALLBACK, ['options' => 'checkEmail']);;

    if(empty($name)) {
        $errors['name'] = 'Имя должно быть на русском и длинее 3 символом и меньше 20';
    }
    if(empty($surname)) {
        $errors['surname'] = 'Фамилия должно быть на русском и длинее 3 символом и меньше 20';
    }
    if(empty($email)) {
        $errors['email'] = 'НЕ валидный email';
    }
    if($email == 'unique') {
        $errors['email'] = 'email занят';
    }
    
    if(empty($errors)) {
        //write to file
        saveUser($name, $surname, $email);
        header('location: http://127.0.0.1/domains/lessons/sanitaze/task1.php');
    }
}



?>


<?php if(!empty($errors)):?>
<pre>
    <?php print_r($errors)?>
</pre>
<?php endif;?>
<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?=$_POST['email'] ?? ''?>"/>
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required value="<?=$_POST['name'] ?? ''?>"/>
    </div>
    <div>
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" required value="<?=$_POST['surname'] ?? ''?>"/>
    </div>
    <input type="submit" name='submit' value="registrate">
</form>