<?php
/**
 *  Создайте скрипт, который читал бы содержимое текстового файла list.txt 
 *  и вы­водил бы его содержимое в НТМL-форме со списком флажков перед каждой 
 * из строк. После выбора флажков и нажатия на кнопку submit  содержимое 
 * файла list.txt  необходимо переписать таким образом, 
 * чтобы выбранные строки были исключены.
 */

$text = file('./list.txt');

if(!empty($_POST['exclude'])) {
    $exclude = $_POST['exclude'];
    $new = array_diff_key($text, array_flip($exclude));
    
    file_put_contents('./list.txt', implode('', $new));
    header('Location: task3.php');
}
// print_r(implode("\n", $text ));

?>

<form method="post">
    <?php foreach($text as $id => $row): ?>
        <p>
            <label>
                <input type="checkbox" name="exclude[]" value="<?=$id?>"/>
                <?=$row?>
            </label>
        </p>
    <?php endforeach; ?>
    <p>
        <input type="submit" value="удалить строки">
    </p>
</form>