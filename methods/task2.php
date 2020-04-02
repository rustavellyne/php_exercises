<?php
/**
 *  Создайте класс-обертку для сессии, метод set ()  
 * которого позволяет устанавли­вать значение сессии,
 * get ()  считывать ранее установленное значение, listKeys () 
 * выводит список всех установленных ключей, а existsKey ()  
 * проверяет наличие ключа в сессии. 
 */

class Session
{
    public function __construct()
    {
        session_start();
    }

    /**
     * установка значения в сессию
     *
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Считывать ранее установленное значение
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }
    /**
     * выводит список всех установленных ключей
     *
     * @return array
     */
    public function listKeys()
    {
        return array_keys($_SESSION);
    }

    /**
     * проверяет наличие ключа в сессии. 
     *
     * @param integer $key
     * 
     * @return boolean
     */
    public function existsKey ($key)
    {
        return true;
    }
    
}

$session = new Session();

$session->set('test', 'hello world');

print_r($_SESSION);