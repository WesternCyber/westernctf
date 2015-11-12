<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/11/15
 * Time: 12:23 AM
 */
$getPost = (array) json_decode(file_get_contents('php://input'));
require '../../vendor/autoload.php';

$sendTo = $getPost["email"];
$sendToName = $getPost["fullName"];
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


echo json_encode(["result" => "success"]);
?>