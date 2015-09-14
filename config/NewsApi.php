<?php
class NewsFeed
{
    private $xml;
    public $articles;
	
    function __construct($url)
    {
        $this->xml = file_get_contents($url);
        $this->xml = simplexml_load_string($this->xml, null, LIBXML_NOCDATA );
		$this->articles = array();
		$this->getNews();
    }
	
	function getNews()
	{
		foreach($this->xml->channel->item as $item)
		{
			$newsArticle = new NewsArticle(	(string)$item->title, 
											(string)$item->link, 
											(string)$item->description, 
											(string)$item->author, 
											(string)$item->category, 
											(string)$item->pubDate);
			array_push($this->articles, $newsArticle);
		}
	}
    
    function getOutput()
    {
		/*
		foreach($this->xml->channel->item as $item)
		{
			Debug($item);
		}
		*/
		for($i = 0; $i < sizeof($this->articles); $i++)
		{
			Debug($this->articles[$i], $i);
		}
    }
    
	function getJSON()
	{
		return json_encode($this->articles);
	}
}

class NewsArticle
{
	public $title;
	public $url;
	public $desc;
	public $author;
	public $category;
	public $data;
	
	function __construct($t, $l, $d, $a, $c, $d)
	{
		$this->title = $t;
		$this->url = $l;
		$this->desc = $d;
		$this->author = $a;
		$this->category = $c;
		$this->data = $d;
	}
}
?>