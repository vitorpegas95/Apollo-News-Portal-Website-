<?php
require "weatherAPI.php";


//Get Current Weather for Lisboa
/*
$w = new Weather(false);
$w->getWeather("Lisboa, PT");

Debug($w->getCurrent());        //Get Current State
Debug($w->getCity());           //Get City
Debug($w->getTemp());           //Get Current Temp
Debug($w->getTempInterval());   //Get Temp Interval for the day
Debug($w->getCountry());        //Get Country
*/


echo "<hr>";
$city = "Lisboa,PT";
$w = new Weather($city);

$w->getWeather();
echo "<br>";
echo $w->getCurrent();
echo "<br>";
$w->getWeatherForecast();
echo "<br>";
echo "<br>";


?>