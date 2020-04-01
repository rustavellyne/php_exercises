<?php
echo "String chapter <br/>";

/**
 * В  документации  с  сайта  http://php.net  изучите  синтаксис  функций 
 * hightlight_string()  и hightlight_file(), 
 * преобразующих РНР-код в НТМL-код с подсветкой синтаксиса.
 * Создайте скрипт, который выводит собственный код 
 * с подсветкой синтаксиса РНР.
 */
echo 'hightlight_string() РНР-код в НТМL-код с подсветкой синтаксиса' . PHP_EOL;
highlight_string('<?php phpinfo(); ?>');
echo '<br />';

highlight_file('./index.php');

/**
 *  Создайте класс двумерной декартовой точки Point, 
 * объявите объект с координа­тами (1, 1) ,  сохраните сериализованный объект в файле с именем point.txt. 
 * Припомощи другого скрипта извлеките и восстановите объект из файла point.txt. 
 */

class Pointer 
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

}

$a = new Pointer(1, 1);

$serialize = serialize($a);
file_put_contents('point.txt', $serialize);
$get_file = file_get_contents('point.txt');

$unserialize = unserialize($get_file);

echo '<pre>';
print_r($unserialize);
echo '</pre>';

/**
 *  Создайте скрипт, преобразующий число в арабской нотации (от  1  до 2000) 
 * в римское. Арабские числа соотносятся с римскими следующим образом: 
 * 1 - 1, 5 - V,  10- Х, 50- L,  100- С, 500- D,  1000- М. 
 * Например, 116- это CXVI, 199-это CXCIX,  14-это XIV. 
 */

function rumConvertor($num) {
    $rom = [
        ['I', 'V', 'X'],
        ['X', 'L', 'C'],
        ['C', 'D', 'M'],
        ['M', 'IƆƆ', 'CCIƆƆ']
    ];
    $answer = '';
    $discharge = [];
    while($num > 0) {
        $number = $num % 10;
        $discharge[] = $number;
        $num = floor($num / 10); 
    }
    $length = count($discharge);
    for($i = 0; $i < $length; $i++) {
        $dis_num = $discharge[$i];
        $dis_rum = '';
        if($dis_num >= 0 && $dis_num <= 3) {
            $dis_rum = str_repeat($rom[$i][0], $dis_num);
        } else if($dis_num >= 4 && $dis_num <= 8) {
            
            $dis_rum =  $dis_num < 5 ? str_repeat($rom[$i][0], 5 - $dis_num) . $rom[$i][1] :  $rom[$i][1] . str_repeat($rom[$i][0], $dis_num - 5);

        } else if($dis_num == 9) {
            $dis_rum = $rom[$i][0] . $rom[$i][2];
        }
        $answer = $dis_rum . $answer; 
    }
    echo $answer . '<br/>';
    //return $result;
}
/**
 * римские числа
 */
rumConvertor(116);
rumConvertor(199);
rumConvertor(14);
rumConvertor(2001);