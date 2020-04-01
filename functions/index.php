<?php
echo 'functions <br/>';

/**
 *  Создайте функцию sum ( ) ,  которая принимает любое количество 
 *  числовых аргу­ментов и возвращает их сумму. 
 */

function sum (...$values) {
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }
    return $sum;
}

echo sum(1,23,4,5,6,3);