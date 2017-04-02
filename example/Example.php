<?php
require_once '../src/ExtractMykad.php';

use ExtractMykad\MyKad;

$ic = new MyKad;

print "<pre>";
print_r($ic->output('991121097431'));
print "</pre>\n";
echo json_encode($ic->output('991121097431', JSON_PRETTY_PRINT));
