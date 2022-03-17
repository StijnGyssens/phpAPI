<?php

require_once "lib/autoload.php";
$container = new Container($configuration);


$log = $container->getLogger()->ShowLog();
$log = str_replace('\r\n',"<br>",$log);

print $log;
