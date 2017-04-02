<?php
require_once '../src/Mykad.php';

$myic = new Mykad\Mykad(); 
 
$result = $myic->output('991121097431'); // insert as string value  
 
print "<pre>"; 
print_r($result); 
print "</pre>"; 
 
$json1 = json_encode($result); 
 
print "<pre>"; 
print_r($json1); 
print "</pre>"; 