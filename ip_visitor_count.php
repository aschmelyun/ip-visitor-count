#!/usr/bin/php
<?php

// foreach line in the log
// only continue with ones that contain the string we're looking for
// determine the ip of that access
// if an index exists in the array for that ip, add to the visit count
// else create an index for that ip, add a visit count of one
// display the array of ip addresses with corresponding visits

// ex: ipvc access.log '/wp-login.php'

if( empty($argv[1]) || empty($argv[2]) ) {
    echo 'Error: Proper usage is ipvc access.log login.php' . PHP_EOL;
    exit();
}

$filename = $argv[1];
$filepath = getcwd() . '/' . $filename;
$search = $argv[2];
$visits = array();
$visits_total = 0;

$handle = fopen( $filepath, "r" );
if ($handle) {
    while ( ($line = fgets($handle)) !== false ) {
        if ( strpos($line, $search) !== false ) {
            $ip = explode(" - - ", $line)[0];
            if( !empty($visits[$ip]) ) {
                $visits[$ip]++;
            } else {
                $visits[$ip] = 1;
            }

            $visits_total++;
        }
    }

    fclose($handle);
} else {
    echo 'Error: Could not process the file given' . PHP_EOL;
}

arsort($visits);
echo print_r($visits, true) . "\r\n" . 'Total: ' . $visits_total . PHP_EOL;

?>