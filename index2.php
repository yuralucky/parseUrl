<?php
$url='http://football.ua';

$content=file_get_contents($url,false);
preg_match_all('/<img[^>]+>/i',$content,$result);
foreach ($result[0] as $img_tag) {
    preg_match_all('/(src)=("[^"]*")/i', $img_tag, $img, PREG_SET_ORDER);
    print_r( $img);
}








//$opt=getopt("f",['all']);var_dump($opt);
///**
// * Created by PhpStorm.
// * User: yura
// * Date: 12.12.18
// * Time: 10:04
// */
//
//$url = 'https://www.bing.com/images/search?q=nature&FORM=HDRSC2';
//$ch = curl_init($url);
//curl_setopt_array($ch, array(
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => TRUE,
//));
//$content = curl_exec($ch);
//
//curl_close($ch);
//dd($content);

//$document = new DOMDocument();
//if ($content) {
//    libxml_use_internal_errors(true);
//    $document->loadHTML($response);
//    libxml_clear_errors();
//}
//
//$images = array();
//
//foreach ($document->getElementsByTagName('img') as $image) {
//    // Extract what we want
//    $image = array
//    (
//        'src' => self::make_absolute($img->getAttribute('src'), $base),
//    );
//
//    // Skip images without src
//    if (!$image['src'])
//        continue;
//
//    // Add to collection. Use src as key to prevent duplicates.
//    $images[$image['src']] = $image;
//
//    $images = array_values($images);
//}
//
//print_r($images);