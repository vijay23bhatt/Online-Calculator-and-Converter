<!DOCTYPE html>
<html>
<head>



</head>
<body>
<ul>
  <li><a href="index.php">Calculator</a></li>
  <li><a href="bmi.php">Body Mass Index Calculator</a></li>
  <li><a href="currency.php">Currency Converter</a></li>
  <li><a href="temperature.php">Temperature Converter</a></li>
  <li><a href="mortgage_calculator.php">Mortgage Converter</a></li>
  <li><a href="compound_calculator.php">Compound Converter</a></li>
 <li><a href="weather.php">Live Weather</a></li>
</ul>


<?php
include('weather_process.php');
function between($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
$data = file_get_html("http://www.ipaddresslocation.org/ip-address-locator.php?lookup=".$_SERVER['REMOTE_ADDR']);
$city = strip_tags(between($data,'IP City: <b>','<i>IP Latitude:'));
$city = str_replace('%ED','i',urlencode(rtrim($city)));
$country = strip_tags(between($data,'<i>IP Country:</i> <b>','</b>'));
$result1 = file_get_contents("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20geo.places%20where%20text%3D%22$city%22&format=xml");
$xml1 = simplexml_load_string($result1);
$woeid=$xml1->results->place->woeid;
if($woeid!=""){
	$fetchData = file_get_contents("http://weather.yahooapis.com/forecastrss?w=$woeid&u=c");
	$xmlData = simplexml_load_string($fetchData);
	$location = $xmlData->channel->xpath('yweather:location');
	if(!empty($location)){
		foreach($xmlData->channel->item as $data)
		{
			$current_condition = $data->xpath('yweather:condition');
			$forecast = $data->xpath('yweather:forecast');
			$current_condition = $current_condition[0];
	
			echo "<table width='360px' border='0px' align='center'>
			<tr>
			<td align='center'>
			<h2>{$location[0]['city']}, {$location[0]['country']}</h2>
			<img src=\"http://l.yimg.com/a/i/us/we/52/{$current_condition['code']}.gif\" style=\"vertical-align: middle;\"/>
			<span style=\"font-size:32px; font-weight:bold;\">{$current_condition['temp']}&deg;C</span>
			<br/>{$current_condition['text']}
			<table width='360px' border='0px' style='text-align: center;'><tr>";
			for($i=0;$i<=4;$i++){
				echo"<td><b>{$forecast[$i]['day']}</b><br/><img src=\"http://l.yimg.com/a/i/us/we/52/{$forecast[$i]['code']}.gif\" style=\"vertical-align: middle;\"/><br/>{$forecast[$i]['low']}-{$forecast[$i]['high']} &deg;C</td>";
			}
			echo "</tr></table></td></tr></table>";
		}
	
	}
}
?>

</body>
</html>