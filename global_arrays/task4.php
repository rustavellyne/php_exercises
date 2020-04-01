<?php
/**
 * Создайте скрипт, который бы складировал в файл ips.txt 
 * уникальные IР-адреса посетителей. Для каждого из IР-адресов следует сохранять
 * количество посеще­ний. Таким образом, при первом посещении в файле ips.txt 
 * появляется новая запись, а при последующих посещениях увеличивается 
 * счетчик этой записи. 
 */
$user_ip = $_SERVER['REMOTE_ADDR'];

$ips = file('./ipx.txt');
echo '<pre>';
print_r($ips);
$visit = 0;
$find = false;
foreach($ips as $index => $ipInfo) {
    $ip = explode('/', $ipInfo)[0];
    if($ip == $user_ip) {
        $visit = (int)explode('/', $ipInfo)[1] + 1;
        $ips[$index] = "$user_ip/$visit \r\n";
        $find = true;
        break;
    }
}
if(!$find) {
    echo 'new connection' . $user_ip . '<br>';
    $ips[] = "$user_ip/$visit \r\n";
}
print_r($ips);
file_put_contents('./ipx.txt', $ips);

