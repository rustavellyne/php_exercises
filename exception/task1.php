<?php
/**
 * 
 */


try { 
    $code  = mt_rand(0, 1); 
    if (!$code) {
        throw new Exception('Первая точка входа', $code); 
    } else {
        throw new Exception('Bтopaя точка входа', $code); 
    }
} catch(Exception $exp) {
    $msg = date('Y-m-d H:i:s') . "\r\n";
    $msg .= "Исключение {$exp->getCode()} : {$exp->getMessage()} \r\n";
    $msg .= "в файле {$exp->getFile()} \r\n"; 
    $msg .= "в строке  {$exp->getLine()} \r\n \r\n \r\n"; 

    file_put_contents('./logs.txt', $msg, FILE_APPEND | LOCK_EX);
} 


