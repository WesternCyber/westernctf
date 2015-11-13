<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/11/15
 * Time: 12:23 AM
 */
//$getPost = (array) json_decode(file_get_contents('php://input'));
require '../../vendor/autoload.php';

//$sendTo = "abcabc@test.com";
//$sendToName = "Harrison Chow";
$sendTo = $getPost["email"];
$sendToName = $getPost["fullName"];
if ($sendTo == "") {
    echo json_encode(["result" => "failed", "message" => $sendTo."email is invalid"]);
    exit;
}
if ($sendToName == "") $sendToName = "none";

$sendFrom = "info@westerncyber.club";
$sendFromName = "Western Cyber Security Club";
$sendGridUsr = "app43353028@heroku.com";
$sendGridPassword = "khpoaec44366";
$sendGridApi = "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";

// Add user to contacts
$url = "https://api.sendgrid.com/v3/contactdb/recipients";
$data = new stdClass();
$data->email = $sendTo;
$data->first_name = $sendToName;
$data->last_name = '';

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer " . $sendGridApi . "\r\n",
        'method' => 'POST',
        'content' => "[" . json_encode($data) . "]",
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// Add user to subscription list
if ($response != "") {
    print_r($response);
    $response = json_decode($response);
    if ($response->error_count == 1) {
        echo json_encode(["result" => "failed", "message" => "email is invalid 1"]);
        exit;
    }
    $usrId = $response->persisted_recipients;
    $usrId = $usrId[0];
    print_r($usrId);
    $listId = "17788";
    $url = "https://api.sendgrid.com/v3/contactdb/lists/" . $listId . "/recipients/" . $usrId;

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\nAuthorization: Bearer " . $sendGridApi . "\r\n",
            'method' => 'POST'
        ),
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
} else {
    echo json_encode(["result" => "failed", "message" => "server has encountered an error"]);
    exit;
}

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
    ->setTemplateId($sendGridTemplateId);

try {
    $sendgrid->send($message);
} catch (SendGrid\Exception $e) {
    echo json_encode(["result" => "failed", "message" => "email failed to send", "exception" => $e]);
    exit;
}
echo json_encode(["result" => "success", "message" => "email has been sent"]);
?>