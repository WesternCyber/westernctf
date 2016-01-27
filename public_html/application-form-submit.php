<?php
echo "FORM DATA START<br>";
$position = $_POST["position"];
$email = $_POST["email"];
$name = $_POST["name"];
$number = $_POST["number"];
//$resume = $_POST["fileToUpload"];
$schoolyear = $_POST["school-year"];
$program = $_POST["program"];
$linkedin = $_POST["linkedin"];
$github = $_POST["github"];
echo $position . "<br>" . $email . "<br>" . $name . "<br>" . $number. "<br>" . "<br>" . $schoolyear . "<br>" . $program. "<br>" . $linkedin. "<br>" . $github;
echo "<br>FORM DATA END<br>";

require '../vendor/autoload.php';
use Parse\ParseClient;
use Parse\ParseObject;
ParseClient::initialize('SeHk9pU9MA4vuoCGc5knx0VKsy8PoOPJu5ZrxLna', 'ln8Pq8b9VD47rvXE80C5UIyE5btckohZN6RDzTad', 's2who59fnh6PYBmlcJrC9W1ND8aj71fPqvITey4p');

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

echo "<br>PARSE DONE";

echo "<br>START PROCESS FILE<br>";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
echo $target_file;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    /*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<br>DONE PROCESSING FILE";
?>