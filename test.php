<?php
require "config/functions.php";


require "config/TVApi.php";


$API = new TVApi();

echo "No. of Channels: " . $API->getChannelCount() . "<br>";

echo "Channel " . $API->getChannel($API->getChannelID("FOX"))->getName();


echo "<br>Today: " . $today . "+00:00:00";
echo "<br>Tomorrow: " . $tomorrow . "+00:00:00";

$API->getChannel(4)->getPrograms($API->getChannel($API->getChannelID("FOX"))->getSigla() . "&startDate=" . $today . "&endDate=" . $tomorrow);

$API->getChannel(4)->getProgramListing();


/*

require "config/NewsApi.php";

$cm = new NewsFeed("http://www.cmjornal.xl.pt/rss.aspx");
$cm->getOutput();


*/
?>