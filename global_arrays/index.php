<h4>Корневой каталог сервера</h4>
<p>
<?= $_SERVER['DOCUMENT_ROOT']?>
</p>

<h4>Предпочтения клиента относительно типа документа</h4>
<p>
<?= $_SERVER['HTTP_ACCEPT']?>
</p>

<h4>Предпочтения клиента относительно языка</h4>
<p>
<?= $_SERVER['HTTP_ACCEPT_LANGUAGE']?>
</p>

<h4>Имя сервера</h4>
<p>
<?= $_SERVER['HTTP_HOST']?>
</p>

<h4>Откуда перешли на сервер</h4>
<p>
<?= $_SERVER['HTTP_REFERER'] ?? 'no referer'?>
</p>

<h4>Юзер агент</h4>
<p>
<?= $_SERVER['HTTP_USER_AGENT']?>
</p>

<h4>IP клиента</h4>
<p>
<?= $_SERVER['REMOTE_ADDR']?>
</p>

<h4>Абсолютный путь к скрипту</h4>
<p>
<?= $_SERVER['SCRIPT_FILENAME']?>
</p>

<h4>Инфо о хосте</h4>
<p>
<?= $_SERVER['SERVER_NAME'] . '<br/>'?>
<?= $_SERVER['SERVER_PORT'] . '<br/>'?>
<?= $_SERVER['SERVER_SOFТWARE'] ?? 'no data' . '<br/>'?>
<?= $_SERVER['SERVER_PROTOCOL'] . '<br/>'?>
</p>

<h4>метод запроса</h4>
<p>
<?= $_SERVER['REQUEST_METHOD']?>
</p>

<h4>строка запроса</h4>
<p>
<?= $_SERVER['QUERY_STRING']?>
</p>

<h4>Имя скрипта начиная от хоста</h4>
<p>
<?= $_SERVER['PHP_SELF']?>
</p>

<h4>URL запроса</h4>
<p>
<?= $_SERVER['REQUEST_URI']?>
</p>

<h4>$_SERVER</h4>
<pre>
<?php print_r($_SERVER)?>
</pre>