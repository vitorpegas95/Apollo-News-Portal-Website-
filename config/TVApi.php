<?php
$today = new DateTime("today");
$today = $today->format("Y-m-d");

$tomorrow = new DateTime("tomorrow");
$tomorrow = $tomorrow->format("Y-m-d");

$today = "" . $today . "+00:00:00";
$tomorrow = "" . $tomorrow . "+00:00:00";


class Program
{
    public $id;
    public $title;
    public $desc;
    public $shortDesc;
    public $startTime;
    public $endTime;
    public $duration;
    public $channelName;
    public $episode;
    
    function __construct($i, $t, $d, $sd, $st, $et, $d, $c, $e)
    {
        $this->id = $i;
        $this->title = $t;
        $this->desc = $d;
        $this->shortDesc = $sd;
        $this->startTime = $st;
        $this->endTime = $et;
        $this->duration = $d;
        $this->channelName = $c;
        $this->episode = $e;
    }
    
    function getID()
    {
        return $this->id;
    }
    
    function getTitle()
    {
        return $this->title;
    }
    
    function getDesc()
    {
        return $this->desc;
    }
    
    function getShortDesc()
    {
        return $this->shortDesc;
    }
    
    function getStartTime()
    {
        return $this->startTime;
    }
    
    function getEndTime()
    {
        return $this->endTime;
    }
    
    function getDuration()
    {
        return $this->duration;
    }
    
    function getChannelName()
    {
        return $this->channelName;
    }
    
    function getEpisode()
    {
        return $this->episode;
    }
}

class Channel
{
    private $name;
    private $sigla;
    private $programs;
    
    function __construct($n, $s)
    {
        $this->name = $n;
        $this->sigla = $s;
        $this->programs = array();
        global $today, $tomorrow;
        
        //$this->getPrograms($this->sigla . "&startDate=" . $this->today . "&endDate=" . $this->tomorrow);
    }
    
    function getPrograms($settings)
    {
	    $url = "http://services.sapo.pt/EPG/GetChannelByDateInterval?channelSigla=" . $settings;
        $xml = simplexml_load_string(file_get_contents($url)); 
        
        $programs = $xml->GetChannelByDateIntervalResult->Programs;

        $i = 0;
        
        
        
        foreach($programs->Program as $p)
        {    
        $st = (string)$p->StartTime;
        $st = explode(" ", $st);
        $st = $st[1];
        
        $et = (string)$p->EndTime;
        $et = explode(" ", $et);
        $et = $et[1];
        
            $this->programs[$i] = new Program(
                (string)$p->Id, 
                (string)$p->Title, 
                (string)$p->Descriptio, 
                (string)$p->ShortDescription, 
                $st, 
                $et, 
                (string)$p->Duration, 
                (string)$p->ChannelSigla, 
                0);
            /*$p->Values->Value[2]->ValueOf*/
            $i++;
        }

    }
    
    function getName()
    {
        return $this->name;   
    }
    
    function getSigla()
    {
        return $this->sigla;
    }
    
    function getProgramListing()
    {
        for($i=0;$i<sizeof($this->programs);$i++)
        {
            echo "<br>" . $this->programs[$i]->getStartTime() . " > " . $this->programs[$i]->getEndTime() . " <b>" . $this->programs[$i]->getTitle() . "</b>";
        }
    }
    
    function getJSON()
    {
	    return json_encode($this->programs);
    }
}

class TVApi
{       
    private $xml;
    private $channels;
    
    function __construct()
    {
        $this->xml = simplexml_load_string(file_get_contents("http://services.sapo.pt/EPG/GetChannelList"));   
        $this->channels = array();
        $this->getAllChannels();
    }
    
    function output()
    {
        echo "<pre>" . print_r($xml) . "</pre>";   
    }
    
    function getResponse()
    {
        return $this->xml;      
    }
    
    function getAllChannels()
    {
        $i = 0;
        foreach($this->getResponse()->GetChannelListResult->Channel as $ch)
        {
            $this->channels[$i] = new Channel($ch->Name, $ch->Sigla);
            $i++;
        }
    }
    
    function getChannelCount()
    {
        return sizeof($this->channels);   
    }
    
    function getChannel($id)
    {
        return $this->channels[$id];   
    }
    
    function getChannelList()
    {
	    return $this->channels;
    }
    
    function getChannelID($sigla)
    {
        for($i=0;$i<sizeof($this->channels);$i++)
        {
            if($this->channels[$i]->getSigla() == $sigla)
            {
                return $i;   
            }
        }
    }
}
?>