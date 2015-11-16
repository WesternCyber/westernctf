<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/15/15
 * Time: 11:35 PM
 */

$getPost = (array) json_decode(file_get_contents('php://input'));
//require '../../vendor/autoload.php';

$forwardTo = "iamnobodyrandom@yahoo.com";

$STDERR = fopen('php://stderr', 'w+');
fwrite($STDERR, $getPost['subject']."\n");

echo "OK";
?>