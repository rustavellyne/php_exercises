<?php

/**
 * Создайте трейт Auth,  который при наличии переменных класса $email и $password 
 * добавлял бы в класс метод auth(),  принимающий в качестве аргумента 
 * электрон­ный адрес и пароль. В случае успешного сопоставления метод должен помещать 
 * в сессию информацию о том, что пользователь аутентифицирован.  Другой метод 
 * is _ auth ()  при этом должен возвращать true или false в зависимости от того, 
 * прой­дена аутентификация или нет. Если переменных $email  и $password в классе нет, 
 * методы не должны появляться, даже если трейт Auth подмешан в класс. 
 */

trait Auth 
{
    public function __call($name, $arguments )
    {
        if(property_exists($this, 'email') && property_exists($this, 'password')){
            if($name == 'auth') {
                $email    = $arguments[0];
                $password = $arguments[1];

                $_SESSION['isAuth'] = ($email === $this->email && $this->password === $password);
            }
            if($name == 'is_auth') {
                return $_SESSION['isAuth'];
            }
        }
    }
}

class User 
{
    use Auth;

    public $info = 'i am user';
    public function __construct()
    {

    }
}

class UserAuth extends User
{
    protected $email;
    protected $password;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email    = $email;
        $this->password = $password;
    }
}

$user1 = new User();

$user2 = new UserAuth('email', 'password');

$user1->auth('email', 'password');
$user2->auth('email', 'password');

print_r($user1->is_auth());
print_r($user2->is_auth());