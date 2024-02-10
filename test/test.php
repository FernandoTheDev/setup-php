<?php

use Fernando\Setup\Parser;

require_once(__DIR__ . '/../vendor/autoload.php');

/* Load all files .setup existing in folders above and within this */
$setup = new Parser();
$setup->run(__DIR__);

/* STRING */
var_dump($_SETUP['DEV']);

/* INT */
var_dump($_SETUP['AGE']);

/* BOOL */
var_dump($_SETUP['VIRGIN']);