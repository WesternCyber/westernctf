<?php
echo "FORM DATA START\n";
$email = $_POST["email"];
$name = $_POST["name"];
$number = $_POST["number"];
$resume = $_POST["fileToUpload"];
$schoolyear = $_POST["school-year"];
$program = $_POST["program"];
$linkedin = $_POST["linkedin"];
$github = $_POST["github"];
echo $email . "\n" . $name . "\n" . $number. "\n" . $resume. "\n" . $schoolyear . "\n" . $program. "\n" . $linkedin. "\n" . $github;
echo "FORM DATA END\n";

require 'vendor/autoload.php';
use Parse\ParseClient;
ParseClient::initialize('1YK2gxEAAxFHBHR4DjQ6yQOJocIrtZNYjYwnxFGN', 'Ceoe5j4JTYsxR5EvQaX1vdmGNWKXSRfQWx4GLLso', 'RYf7WRp7HGEvyDX6geKVe3HPjpslqGGR6SbkEBDf');

$application = new ParseObject("application");

$application->set("name", $name);
$application->set("email", $email);
$application->set("number", $number);
$application->set("resume", $resume);
$application->set("schoolyear", $schoolyear);
$application->set("program", $program);
$application->set("linkedin", $linkedin);
$application->set("github", $github);

?>