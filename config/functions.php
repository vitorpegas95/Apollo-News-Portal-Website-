<?php
function Debug($s, $identifier = 0)
{
    echo "<h4>Debug [$identifier]:</h4><pre>";
	print_r($s);
	echo "</pre>";   
}
?>