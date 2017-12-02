<?php
include "simple_html_dom.php";

$BASE_URL = "http://www.richtarjakub.sk";

$content = file_get_contents("http://www.richtarjakub.sk/hostinec/piva-na-vycape/");
$html = new simple_html_dom();
$html->load($content);

$entries = $html->find('div[class=beerItem]');
$output = array();

foreach($entries as $entry)
{
	$beer = array(
			'name' 		=> $entry->first_child()->first_child()->getAttribute('alt'),
			'image' 	=> $BASE_URL.$entry->first_child()->first_child()->getAttribute('src'),
			'detail' 	=> $BASE_URL.$entry->first_child()->getAttribute('href')
	);

	$output[] = $beer;
}

echo json_encode(array('beers' => $output));
?>