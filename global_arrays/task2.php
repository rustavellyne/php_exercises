<?php
/**
 *  Создайте скрипт,  который бы отслеживал состояние  переменной окружения 
 * PHP_APPS и создавал бы одноименную констанrу, 
 * если переменная окружения установлена. 
 * В случае если переменная окружения пустая, результатом работы скрипта долж­
 * на быть строка "Режим разработки", если значение переменной имеет в своем 
 * составе подстроку "test" - "Режим тестирования",  если значение ENVIRONМENT 
 * принимает значение "productio11" - "Режим эксплуатации".
 */
echo '<pre>';
//print_r($_ENV);
if(isset($_ENV['PHP_APPS']) && $_ENV['PHP_APPS'] == 'develop') {
    define('ENVIROMENT', 'development');
} else {
    define('ENVIROMENT', 'production');
}

echo ENVIROMENT;