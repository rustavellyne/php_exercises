<?php
/**
 *  Создайте форму, содержащую текстовую область textarea и кнопку suЬmit. 
 *  При нажатии на кнопку содержимое тестовой области должно сохраняться 
 * в файл content.txt.  При повторной загрузке формы в другом окне 
 * содержимое файла content.txt должно подставляться в тестовую форму. 
 */
if(!empty($_POST['content'])){
    file_put_contents('content.txt', $_POST['content']);
}
$content = '';
if(file_exists('./content.txt')) {
    $content = file_get_contents('./content.txt') ?: '';
}

?>

<form method="post">
    <div>
        <label for="content">Введите/измените текст</label> <br>
        <textarea name="content" id="content" cols="30" rows="10"><?=trim($content)?>
        </textarea>
    </div>
    <input type="submit" value="отправить">
</form>