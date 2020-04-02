<?php
/**
 * По документации с  сайта  http://pbp.net  изучите  возможности специальных 
 * методов  sleep ()  и _  wakeup (),  предназначенных для управления процессом 
 * сериализации объекта. Модифицируйте класс Accessor из листинга 17 .11  таким 
 * образом, чтобы его объекты можно было сериализовать при помощи функции 
 * serialize ()  и восстановить при помощи функции unserialize (). 
 * По возможно­сти организуйте сериализацию таким образом,
 * чтобы объект сохранялся в JSОN­ формате. 
 */

class Accessor implements Serializable
{
    private $arr =  [
        'test'  => 'test12',
        'test2' => 13,
    ]; 

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

    public function serialize() {
        return serialize(json_encode($this->arr));
    }
    public function unserialize($data) {
        $unser = unserialize($data);
        $this->arr = json_decode($unser, true);
        
    }

}
echo "<pre>";
$obj = new Accessor;

$ser = serialize($obj);
print_r($ser);

$unser = unserialize($ser);
print_r($unser);

echo '<br>' . $unser->test;
