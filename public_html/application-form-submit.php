<?php
require '../vendor/autoload.php';
use Parse\ParseClient;
ParseClient::initialize('1YK2gxEAAxFHBHR4DjQ6yQOJocIrtZNYjYwnxFGN', 'Ceoe5j4JTYsxR5EvQaX1vdmGNWKXSRfQWx4GLLso', 'RYf7WRp7HGEvyDX6geKVe3HPjpslqGGR6SbkEBDf');

echo "FORM DATA START<br>";
$position = $_POST["position"];
$email = $_POST["email"];
$name = $_POST["name"];
$number = $_POST["number"];
$resume = $_POST["fileToUpload"];
$schoolyear = $_POST["school-year"];
$program = $_POST["program"];
$linkedin = $_POST["linkedin"];
$github = $_POST["github"];
echo $position . "<br>" . $email . "<br>" . $name . "<br>" . $number. "<br>" . $resume . "<br>" . $schoolyear . "<br>" . $program. "<br>" . $linkedin. "<br>" . $github;
echo "FORM DATA END<br>";

$application = new ParseObject("applications");

$application->set("name", $name);
$application->set("email", $email);
$application->set("number", $number);
//$application->set("resume", $resume);
$application->set("schoolyear", $schoolyear);
$application->set("program", $program);
$application->set("linkedin", $linkedin);
$application->set("github", $github);

try {
  $application->save();
  echo 'New object created with objectId: ' . $application->getObjectId();
} catch (ParseException $ex) {  
  // Execute any logic that should take place if the save fails.
  // error is a ParseException object with an error code and message.
  echo 'Failed to create new object, with error message: ' . $ex->getMessage();
}

?>