<?php

chdir('C:/xampp/htdocs/jnksms');
echo 'CWD: '.getcwd()."\n";
echo 'File exists: '.(file_exists('vendor/autoload.php') ? 'YES' : 'NO')."\n";
