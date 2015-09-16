<?php
class Weather
{
	private $json;
	private $json_forecast;
	private $url_cur;
	private $url_forecast;
	private $city;
	
	private $forecast;
    
    function __construct($city)
    {
	    $city = str_replace(' ', '', $city);
	   $this->city = $city;
            $this->url_forecast = "http://api.openweathermap.org/data/2.5/forecast?q="; 
            $this->url_cur = "http://api.openweathermap.org/data/2.5/weather?q="; 
    }
    
    function getWeather()
    {
	$this->json = json_decode(file_get_contents($this->url_cur . $this->city));   
    }
    
    function getWeatherForecast()
    {
	$this->json_forecast = json_decode(file_get_contents($this->url_forecast . $this->city));   
	    
		$this->forecast = array();
        foreach($this->json_forecast->list as $f)
        {
	        
			$date = (string)$f->dt_txt;
			$temp = $this->KtC((string)$f->main->temp);
			$temp_min = $this->Ktc((string)$f->main->temp_min);
			$temp_max = $this->Ktc((string)$f->main->temp_max);
			$condition = (string)$f->weather[0]->main;
			
			$date2 = explode(" ", $date);
			$date2 = $date2[1];
			$date2 = explode(":", $date2);
			$date2 = $date2[0];
				
			if($date2 > 10 && $date2 < 15)
			{
				$day = array();
				array_push($day, 
									$date, 
									$temp, 
									$temp_min,
									$temp_max,
									$condition);
				array_push($this->forecast, $day);
			}
        }   
    }

    function Debug($s)
    {
        echo "<br><pre>";
				print_r($s);
				echo "</pre>";
    }
    
    function getOutput()
    {
        echo "<pre>";
		print_r(($this->json));
		echo "</pre>";
    }
    
    function getCity()
    {
        return $this->city;   
    }
    
    //Convert Kelvin to Celsius
    function KtC($k)
    {
        return $k - 273.15;   
    }
    
    function getCurrent()
    {
        return $this->json->weather[0]->main;   
    }
    
    function getTemp()
    {
        return $this->KtC($this->json->main->temp);   
    }
    
    function getTempInterval()
    {
        return round($this->KtC($this->json->main->temp_min), 0) . "&ordm;C &nbsp;/ &nbsp;" . round($this->KtC($this->json->main->temp_max),0) . "&ordm;C";    
    }
    
    function getCountry()
    {
        return $this->json->sys->country;
    }
    
    function getForecastJSON()
    {
	    return $this->forecast;
    }
}       
?>