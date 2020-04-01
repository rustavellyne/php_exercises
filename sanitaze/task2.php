<?php

/**
 *  Создайте НТМL-форму, состоящую из двух текстовых полей, 
 * в первом из кото­рых вводится количество товарных позиций, 
 * а во втором их цена в формате ###. ##.  
 * Обработчик формы должен проверить, является ли введенная в первом 
 * поле информация целым числом, а во втором - удовлетворяющим денежному 
 * формату. Если все верно, необходимо вывести произведение этих двух чисел.
 */

    $calc = 0;

    $errors = [];
    if(isset($_POST['calc'])) {
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_CALLBACK, ["options" => function($value){
                $result = round((float)$value, 2);
            return $result > 1000 ? 999.99 : $result;
        }]);
        if($quantity === false) {
            $errors['quantity'] = 'Введите целое число';
        }
        if($price == false) {
            $errors['price'] = 'Введите число в вформате ###.##';
        }
        if(empty($errors)) {
            $multiply = $price * $quantity;
            $calc = number_format($multiply, 2);
            // header('location: http://127.0.0.1/domains/lessons/sanitaze/task2.php');
        }
    }

    if(!empty($errors)) {
        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    }

?>

<form method="post">
    <div>
        <label for="quantity">Количество товара</label>
        <input type="number" name="quantity" id="quantity" value="<?=$_POST['quantity'] ?? ''?>"/>
    </div>
    <div>
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" step="0.01" value="<?=$_POST['price'] ?? ''?>"/>
    </div>
    <input type="submit" name="calc" value="Calc" />
</form>

<p>
    <?=$calc?>
</p>