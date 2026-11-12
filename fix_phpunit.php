<?php

$content = file_get_contents('phpunit.xml');
$content = str_replace(
    'bootstrap="vendor/autoload.php"',
    'bootstrap="C:/xampp/htdocs/jnksms/vendor/autoload.php"',
    $content
);
file_put_contents('phpunit.xml', $content);
echo 'Done: '.(strpos($content, 'C:/xampp') !== false ? 'path updated' : 'NOT updated');
