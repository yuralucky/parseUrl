<?php

//$url='https://www.w3schools.com/php/php_xml_dom.asp';
//$dom=new DOMDocument();
//
//$dom->loadHTML($url);
//print '<pre>';
//print_r($dom);
////$dom->getElementsByTagName('div');
//print '</pre>';
$url = 'https://www.bing.com/images/search?q=nature&FORM=HDRSC2';
//https://s.ill.in.ua/i/news/630x373/379/379046.jpg
function get_url($url)
{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

    return $data;
}
 $output=get_url($url);
//echo $output;

preg_match_all('/<img[^>]+>/i',$output,$url_matches);
//print_r($url_matches);

foreach ($url_matches as $url_match){
    preg_match_all('/(src)=("[^"]*")/i', $output, $img, PREG_SET_ORDER);
    print_r (array_values($img));
}

