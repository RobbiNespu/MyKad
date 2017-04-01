<?php

require dirname(__FILE__).'/Mykad.php';

$myic = new Mykad();

$result = $myic->output('000312115231'); // insert as string value 

print "<pre>";
print_r($result);
print "</pre>";

$json1 = json_encode($result);

print "<pre>";
print_r($json1);
print "</pre>";
