<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/11/15
 * Time: 12:23 AM
 */

$sendTo = "iamnobodyrandom@yahoo.com";
$sendFrom = "info@westerncyber.club";
$sendGridUsr = "app43353028@heroku.com";
$sendGridPassword = "khpoaec44366";

$emailBody = "Test message";
$emailSubject = "Test email";

require 'vendor/autoload.php';
$sendgrid = new SendGrid($sendGridUsr, $sendGridPassword);

$message = new SendGrid\Email();
$message->addTo($sendTo)->
setFrom($sendFrom)->
setSubject($emailSubject)->
//setText($emailBody)->
setHtml($emailBody);
$response = $sendgrid->send($message);

echo $response;
echo "done";
?>