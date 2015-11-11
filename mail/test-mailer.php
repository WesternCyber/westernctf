<html>
<head></head>
<body>
start
<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 11/11/15
 * Time: 12:23 AM
 */
require '../vendor/autoload.php';

$sendTo = "iamnobodyrandom@yahoo.com";
$sendFrom = "info@westerncyber.club";
$sendFromName = "Western Cyber Security Club";
$sendGridUsr = "app43353028@heroku.com";
$sendGridPassword = "khpoaec44366";

$emailBody = "Test message";
$emailSubject = "Test email";
$sendGridTemplateId = "daf01737-4403-4218-92cc-0b888254d80c";

$sendgrid = new SendGrid($sendGridUsr, $sendGridPassword);

$message = new SendGrid\Email();
$message
    ->addTo($sendTo)
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

echo "done\n";
?>
end
</body>
</html>
