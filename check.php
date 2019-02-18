<?php

require __DIR__ . '/vendor/autoload.php';

use patrickmaynard\changedetection\Checker;
use patrickmaynard\changedetection\Mailer;

$checker = new Checker;
$mailer = new Mailer;
$alerts = $checker->checkAll();
if (count($alerts) > 0) {
    $mailer->send($alerts);
} else {
    echo "\nNo alerts generated.\n";
}

?>
