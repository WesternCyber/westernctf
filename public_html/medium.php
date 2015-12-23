<?php
/**
 * Created by PhpStorm.
 * User: harrisonchow
 * Date: 12/23/15
 * Time: 12:01 AM
 */

//echo "<div class=\"widget\">";

$url = "https://medium.com/feed/@WesternCyberSecurity";
$options = array(
    'http' => array(
        'header' => "Content-type: text/plain\r\n",
        'method' => 'GET'
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

$xml=simplexml_load_string($response) or die("Error: Cannot create object");

foreach ($xml->channel->item as $item) {
    $date = $item->pubDate;
    $date = strtotime($date);
    $month = time('F', $date);
    $day = time('j', $date);
    $year = time('Y', $date);

    echo "<li>\n";
    echo "<a href=\"" . $item->link . "\"> " . $item->title . " </a>\n";
    echo "<span class=\"date\"> " . $month . "<span class=\"number\"> " . $day . ", " . $year . " </span></span>\n";
    echo "</li>\n";
}

//echo "</div>";
/*<div class="widget">
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
</div>*/
?>