<?php
/**
 *  Создайте класс  с  методом  find () ,  
 * принимающий единственный аргумент­ строку с названием функции РНР. 
 * В качестве результата метод должен возвра­щать текст с сайта http://php.net с описанием функции.
 */

class FunctionDescription
{
    protected static $site = 'https://www.php.net/manual/ru/function.';

    public static function find($function_name)
    {
        $site = self::$site . $function_name;
        
        $info = file_get_contents($site);

        //$reg_exp = "/<div.* id=\"function.$function_name\"+.*?<\/div>/s";
        //$reg_exp = "/<div id=\"function.$function_name\"(.*)<\/div>/s";
        $reg_exp = "/<div class=\"refnamediv\">(.*)<\/div>/s";
        
        $matches = [];
        preg_match( $reg_exp, $info, $matches);
        echo '<pre>';
        print_r($matches[0]);
    }
}

FunctionDescription::find('array-merge');
