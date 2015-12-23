<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 12/23/15
 * Time: 12:01 AM
 */

echo "<div class=\"widget\">";

$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
print_r($xml);

echo "</div>";
?>
<!--<div class="widget">
    <h6 class="title"> Recent Posts </h6>
    <hr>
    <ul class="link-list recent-posts">
        <li>
            <a href="https://medium.com/@WesternCyberSecurity/who-we-are-167eb8e56b4a#.ve7qgw9ac"> Who
                we are </a>
            <span class="date"> November
                <span class="number"> 18, 2015 </span>
            </span>
        </li>
    </ul>
</div>-->