<?php
	$doc = new DomDocument();
	$content = file_get_contents("http://www.richtarjakub.sk/hostinec/piva-na-vycape/");
	$doc->loadHtml($content);
	$xpath = new DomXpath($doc);

	$entries = $xpath->query("//div[@class='beerItem']/a");

	if (isset($_GET['api']))
	{
		$output = array();
		foreach($entries as $entry)
		{
			if (empty($entry->nodeValue)) continue;
			$output[] = $entry->nodeValue;
		}

		echo json_encode($output);

		exit;
	}
?>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:image" content="http://www.richtarjakub.sk/images/logo-richtar-jakub.png">
<h2>Richtar Jakup live:</h2>
<?php
	$day = date('w');
	if ($day == 0)
	{
		echo "<img src='http://myfirstchat.com/storiescity/covers/48448.JPEG'>";
		echo "<h3 style='color: red'>Closed. Very sad, Many tears, So no beer </h3>";
	}

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
<p style="width: 100%; text-align: center">Made with <span style="color: #cb4154">♥</span> by nosko. Fork me on <a href="https://github.com/nosko/richtar"><img width="17px" height="17px" src="https://image.flaticon.com/icons/png/128/25/25231.png"></a></p>