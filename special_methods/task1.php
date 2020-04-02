<?php
/**
 *  По документации с сайта http://pbp.net изучите возможности 
 * специального ме­тода _unset (), предназначенного для управления
 *  процессом уничтожения свой­ства объекта при помощи конструкции unset () . 
 * Модифицируйте класс Accessor из  листинга 17.11  таким  образом,  
 * чтобы он  поддерживал удаление свойств класса.
 */

class Accessor 
{
    private  $arr =  []; 

    public function __get($key) 
    { 
        if(array_key_exists($key,  $this->arr)) {
            return $this->arr[$key]; 
        } 
        return null; 
    }

    public function __set($key,  $value) 
    { 
        $this->arr[$key]  = $value; 
    }

    public function __unset($key)
    {
        if(array_key_exists($key,  $this->arr)) {
            unset($this->arr[$key]);
        }
        return false;
    }
}

$obj = new Accessor;

$obj->a = 12;
$obj->b = 13;
$obj->c = 14;
echo '<pre>';
print_r($obj);
unset($obj->b);
print_r($obj);