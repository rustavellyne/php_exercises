<style>
   table { 
    width: 100%; /* Ширина таблицы */
    border: 4px double black; /* Рамка вокруг таблицы */
    border-collapse: collapse; /* Отображать только одинарные линии */
   }
   th { 
    text-align: left; /* Выравнивание по левому краю */
    background: #ccc; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
  </style>
<?php

/*
Создайте скриm, который выводил бы календарь на текущий месяц в  виде 
таблицы. Столбцы таблицы должны представлять дни недели от понедельника 
до воскресенья, а в ячейках таблицы выводиться числа месяца. 
*/
$locale = setlocale (LC_TIME, 'ru_RU.UTF-8', 'Rus');
$year         = date('Y');
$month_name   = strftime('%B');
$month_number = date('m'); 
$last_day        = date('t');
$today        = date('j');
$style = '';

function getDayNumber($day, $month_number, $year) {
    return date('N', mktime(0, 0, 0, $month_number, $day, $year));
}


$table = '<table>'
                .'<thead>'
                    .'<tr>'
                        .'<th>Понедельник</th>'
                        .'<th>Вторник</th>'
                        .'<th>Среда</th>'
                        .'<th>Четверг</th>'
                        .'<th>Пятница</th>'
                        .'<th>Суббота</th>'
                        .'<th>Воскресенье</th>'
                    .'</tr>'
                .'</thead>'
                .'<tbody>';
    $tr = '<tr>';
for ($day = 1; $day <= $last_day; $day++ ) {
    if($day == 1) {
        $dayNumber = getDayNumber($day, $month_number, $year) - $day;
        $tr .= str_repeat('<td>-</td>', $dayNumber);
    }
    if($today == $day) {
        $style = 'bgColor="green"';
    } else {
        $style = '';
    }
    $tr .= "<td $style>$day</td>";
    if(getDayNumber($day, $month_number, $year) == 7) {
        $tr .= '</tr>';
        $table .= $tr;
        $tr = '<tr>';
    } 
}
$table .= '</tbody>';
$table .= '</table>'; 
getDayNumber($day, $month_number, $year);
echo "<h2>Календар за $month_name - $year";
echo $table;

echo $today;