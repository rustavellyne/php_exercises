<?php

/**
 *  Пусть имеется массив [ 'fst',  'snd',  'thd' ,  'fth' ]. 
 *  Выведите случайный эле­мент массива
 */

 $arr1 = ['fst', 'snd', 'thd', 'fth'];
 $random_index = array_rand($arr1);

 echo 'task 1, random element = ', $arr1[$random_index], '<br />';

/**
 * Пусть имеется массив ['fst'  =>  1,  'snd'  =>  2,  'thd'  =>  з,  'fth'  =>  4J.
 * Получите на основании его новый массив с ключами его элементов 
 * ['fst', 'snd', 'thd' , 'fth']
 */

$arr2 = ['fst' => 1, 'snd' => 2, 'thd' => 3, 'fth' => 4];
$task2_keys = array_keys($arr2);
echo 'task 2 = ';
print_r($task2_keys);
echo '<br />';

/**
 *  Пусть имеется массив [ 'fst' ,  'snd',  'thd' ,  'fth' ,  'snd',  'thd' ]. 
 *  Получите из него новый массив, содержащий только уникальные элементы 
 * [ 'fst', 'snd' , 'thd', 'fth']. 
 */

 $arr3 = [ 'fst' ,  'snd',  'thd' ,  'fth' ,  'snd',  'thd' ];
 $task3_uniq = array_unique($arr3);
 echo 'task 3 = ';
 print_r($task3_uniq);
 echo '<br />';

 /**
 *  Решите задачу обмена значений двух целочисленных переменных,
 *  не прибегая к конструкции list ()  и использованию третьей промежуточной переменной. 
 */

 $a = 4;
 $b = 10;
 echo "task 4 exchange numbers a = $a, b = $b | ";
 $a = $b - $a;
 $b = $b - $a;
 $a = $a + $b; 
 echo "a = $a, b = $b";

 /**
  *  Создайте массив со случайным количеством элементов от 5  до 1О ,  
  * элементы которого принимают случайное значение от О до 100.  
  * Отсортируйте элементы массива в порядке от наименьших к наибольшим значениям. 
  */
$rand_range = mt_rand(5, 10);

$arr4 = []; 
for($i = 0; $i < $rand_range; $i++) {
    $arr4[] = mt_rand(0, 100);
}
sort($arr4);
echo '<pre>';
print_r($arr4);
echo '</pre><br/>';

/**
 * Создайте текстовый файл с названиями месяцев. 
 * В документации РНР найдите функцию file (), 
 *  изучите приемы ее использования и создайте массив с назва­ниями месяцев из содержимого текстового файла.
 */
$monthes_file = file('./months.txt');
$monthes = [];
if(isset($monthes_file[0])) {
    $monthes = explode(',', $monthes_file[0]);
}
echo '<pre>';
print_r($monthes);
echo '</pre><br/>';