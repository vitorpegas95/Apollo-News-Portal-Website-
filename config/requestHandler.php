<?php

/*
Request Handler PHP Script
Author: Vitor Pêgas
Date: 04/09/2015

Description: This script will handle all the requests made to the server, and will use the backend API's
*/

require "functions.php";
require "NewsApi.php";
require "TVApi.php";
require "weatherAPI.php";

if(isset($_REQUEST["ajaxGetNews"]))
{
	$request = $_REQUEST["ajaxGetNews"];
	
	if($request == "CM")
	{
		$news = new NewsFeed("http://www.cmjornal.xl.pt/rss.aspx");
		$json = $news->getJSON();
		print $json;
	}
	else
	{
		exit;
	}
}
else if(isset($_REQUEST["ajaxGetTVGuide"]))
{
	$channel = $_REQUEST["ajaxGetTVGuide"];
	
	$API = new TVApi();
	
	$API->getChannel(0)->getPrograms($API->getChannel($API->getChannelID($channel))->getSigla() . "&startDate=" . $today . "&endDate=" . $tomorrow);
	
	print $API->getChannel(0)->getJSON();
}
else if(isset($_REQUEST["ajaxGetWeather"]))
{
	$city = $_REQUEST["ajaxGetWeather"];
		
	$w = new Weather($city);
	
	$w->getWeather();
	$w->getWeatherForecast();
	
	$json_forecast = $w->getForecastJSON();
	$curWeather = $w->getCurrent();
	$curTempInterval = $w->getTempInterval();
	$curTemp = $w->getTemp();
	
	$cur = array();
	array_push($cur, $curWeather, $curTemp, $curTempInterval);
	
	$rtn = array();
	array_push( $rtn, $cur, $json_forecast);
	
	print json_encode($rtn);
}
else
{
	exit;
}

?>