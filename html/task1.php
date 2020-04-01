<?php

class Point
{
    protected $x;
    protected $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public static function distance(Point $pointA, Point $pointB)
    {
        $x = pow($pointB->x - $pointA->x, 2);
        $y = pow($pointB->y - $pointA->y, 2);
        $result = sqrt($x + $y);
        return $result;
    } 
}


/**
 * Создайте скрипт, который через НТМL-форму принимал бы координаты 
 * двух точек в декартовой системе координат, 
 * а после нажатия на кнопку типа suЬmit выводил бы расстояние между двумя точками.
 */
    

    
    $error = '';
    if(is_null($_GET['pointA_x']) || is_null($_GET['pointA_y']) || is_null($_GET['pointB_x']) || is_null($_GET['pointB_y'])) {
        $error = 'заполните все поля';
    } else if(!is_numeric($_GET['pointA_x']) || !is_numeric($_GET['pointA_y']) || !is_numeric($_GET['pointB_x']) || !is_numeric($_GET['pointB_y'])) {
        $error = 'Должны быть цифры';
    } else {
        $aX = $_GET['pointA_x'];
        $aY = $_GET['pointA_y'];
        $bX = $_GET['pointB_x'];
        $bY = $_GET['pointB_y'];
        $a = new Point($aX, $aY);
        $b = new Point($bX, $bY);
        $result = Point::distance($a, $b);
    }

 ?>
<h3>Создайте скрипт, который через НТМL-форму принимал бы координаты 
 двух точек в декартовой системе координат, 
 а после нажатия на кнопку типа Submit выводил бы расстояние между двумя точками.</h3>
<form>
    <div>
        <h4>Точка А</h4>
        <div>
            <label for="pointA_x">координата X</label>
            <input type="number" name="pointA_x" id="pointA_x">
        </div>
        <div>
            <label for="pointA_y">координата Y</label>
            <input type="number" name="pointA_y" id="pointA_y">
        </div>
    </div>
    <div>
        <h4>Точка B</h4>
        <div>
            <label for="pointB_x">координата X</label>
            <input type="number" name="pointB_x" id="pointB_x">
        </div>
        <div>
            <label for="pointB_y">координата Y</label>
            <input type="number" name="pointB_y" id="pointB_y">
        </div>
    </div>
    <input type="submit" value="Вычислить растояние">
</form>

<p>
    <?php
        if(empty($result)) {
            echo 'нет данных' . $error;
        } else {
            echo $result;
        }
    ?>
</p>