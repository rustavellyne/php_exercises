<?php
/**
 * Организуйте клонирование объектов класса user  таким образом, 
 * чтобы пароль пользователя password в клонированном объекте отличался от оригинала. 
 */

interface Clonable
{
    public function __clone();
}

class User implements Clonable
{
    protected $email;

    protected $password;

    protected $name;

    public function __construct($email, $password, $name)
    {
        $this->email    = $email;
        $this->password = $password;
        $this->name     = $name;
    }

    public function __toString()
    {
        return "email = $this->email, password = $this->password, name = $this->name <br />";
    }

    public function __clone()
    {
        $this->password = bin2hex(random_bytes(mt_rand(6, 20)));
    }
}

$user1 = new User('andrew@gmail.com', 'secret', 'Andrew Chernyakov');

echo $user1;

$user2 = clone $user1;

echo $user2;