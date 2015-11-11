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

$sendTo = "iamnobodyrandom@yahoo.com";
$sendFrom = "info@westerncyber.club";
$sendGridUsr = "app43353028@heroku.com";
$sendGridPassword = "khpoaec44366";

$emailBody = "Test message";
$emailSubject = "Test email";

require 'vendor/autoload.php';
try {
    $sendgrid = new SendGrid($sendGridUsr, $sendGridPassword);
} catch (Exception $e) {
    echo $e;
}

$message = new SendGrid\Email();
$message->addTo($sendTo)->
setFrom($sendFrom)->
setSubject($emailSubject)->
setHtml($emailBody);

try {
    $sendgrid->send($email);
} catch(Exception $e) {
    echo $e->getCode();
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}

echo "done";
?>
end
</body>
</html>
