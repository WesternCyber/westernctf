<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/11/15
 * Time: 12:23 AM
 */
//$getPost = (array) json_decode(file_get_contents('php://input'));
require '../../vendor/autoload.php';

$sendTo = "iamnobodyrandom@yahoo.com";
$sendToName = "Harrison Chow";
//$sendTo = $getPost["email"];
//$sendToName = $getPost["fullName"];
$sendFrom = "info@westerncyber.club";
$sendFromName = "Western Cyber Security Club";
$sendGridUsr = "app43353028@heroku.com";
$sendGridPassword = "khpoaec44366";
$sendGridApi = "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";

$emailBody = "Test message";
$emailSubject = "Test email";
$sendGridTemplateId = "658b13d5-b11e-4e86-b274-39a9b829ea87";

//$sendgrid = new SendGrid($sendGridUsr, $sendGridPassword);
$sendgrid = new SendGrid($sendGridApi);

$message = new SendGrid\Email();
$message
    ->addTo($sendTo, $sendToName)
    ->setFrom($sendFrom)
    ->setFromName($sendFromName)
    ->setSubject($emailSubject)
    ->setCategory("Subscription")
    ->setHtml($emailBody)
    ->setTemplateId($sendGridTemplateId)
;

try {
    $sendgrid->send($message);
} catch(SendGrid\Exception $e) {
    echo $e->getCode();
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}

// Add user to contacts
$url = "https://api.sendgrid.com/v3/contactdb/recipients";
$data = json_encode(["email" => $sendTo, "first_name" => $sendToName, "last_name" => ""]);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer " . $sendGridApi . "\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// Add user to subscription list
if ($response != "") {
    echo $response;
    print_r($response);
    echo "\n";
    $response = json_decode($response);
}

echo json_encode(["result" => "success"]);
?>