<meta http-equiv="content-type" content="text/html; charset=utf-8">
<h2>Richtar live:</h2>
<?php
$day = date('w');
if ($day == 0)
{
	echo "<img src='http://myfirstchat.com/storiescity/covers/48448.JPEG'>";
	echo "<h3 style='color: red'>Closed. Very sad, Many tears, So no beer </h3>";
}

$doc = new DomDocument();
$content = file_get_contents("http://www.richtarjakub.sk/hostinec/piva-na-vycape/");
$doc->loadHtml($content);
$xpath = new DomXpath($doc);

$entries = $xpath->query("//div[@class='beerItem']/a");
$output = "";
foreach($entries as $entry)
{
	$output .= $entry->nodeValue."<br>";
}

echo "<p style='float: left'>".$output."</p>";
?>
<img src="https://i.giphy.com/media/11oNXSmmBzNLA4/giphy.webp" style="float: right"/>
<br clear="both">
<p style="width: 100%; text-align: center">Made with <span style="color: #cb4154">♥</span> by nosko.</p>