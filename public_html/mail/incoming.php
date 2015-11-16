<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/15/15
 * Time: 11:35 PM
 */

$getPost = (array) json_decode(file_get_contents('php://input'));
require '../../vendor/autoload.php';

fwrite(STDERR, $getPost);

echo "OK";
?>